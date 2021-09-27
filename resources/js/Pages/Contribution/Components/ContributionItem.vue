<template>
    <div>
        <form @submit.prevent="submitContributionItem">
            <input v-model="startOn" type="datetime-local">
            <input v-model="finishedIt" type="datetime-local">

            <div v-for="i in ItemCount" class="flex">
                <item-card @resource-id="test" :all_categories="all_categories" :id_item_card="i"></item-card>
            </div>

            <button @click="addItemCount" type="button">ADD</button>

            <button>Yolo</button>
        </form>
    </div>
</template>

<script>
import ItemCard from "./ItemCard";

export default {
    components: {
        ItemCard
    },
    props: ['all_resources', 'all_categories'],
    name: "ContributionItem",
    data() {
        return {
            ItemCount: 1,
            array: [],
            startOn: '',
            finishedIt: '',
        }
    },
    methods: {
        addItemCount() {
            this.ItemCount++
        },
        submitContributionItem() {

            let item_id = []
            let item_quantity = []

            for (let i = 0; i < this.array.length; i++) {
                item_id.push(this.array[i]['id_item'])
                item_quantity.push(this.array[i]['item_quantity'])
            }

            let data = {
                start_on: this.startOn,
                finished_it: this.finishedIt,
                item_id: item_id,
                quantity: item_quantity,
            }

            this.$inertia.post(route('add.contribution.item'), data)
        },
        test(data) {

            for (let i = 0; i < this.array.length; i++) {
                if (this.array[i]['id_item_card'] === data['id_item_card']) {
                    this.array.splice(i, 1)
                }
            }

            this.array.push(data)
        }
    }
}
</script>

<style scoped>

</style>
