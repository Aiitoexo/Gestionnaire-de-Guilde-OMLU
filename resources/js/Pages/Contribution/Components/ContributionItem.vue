<template>
    <form @submit.prevent="submitContributionItem" class="col-span-10 grid grid-cols-12 gap-4 h-full">
        <input required v-model="startOn" type="date" class="col-span-4 h-12 text-xl rounded flex items-center justify-center bg-gray-900 border-none">
        <input required v-model="finishedIt" type="date" class="col-span-4 h-12 text-xl rounded flex items-center justify-center bg-gray-900 border-none">

        <div v-for="i in ItemCount" class="col-span-12 grid grid-cols-12 h-14 gap-x-4">
            <item-card @resource-id="test" :all_categories="all_categories" :id_item_card="i"></item-card>
        </div>

        <div class="col-span-12 grid grid-cols-2">
            <div class="col-span-1 h-full">
                <button @click="addItemCount" type="button" class="px-6 bg-purpleDark-900 text-white py-2 rounded border border-purple-300 h-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>

            <button class="col-span-1 bg-purpleDark-900 text-white text-2xl py-2 rounded border border-purple-300">Enregistrer</button>
        </div>
    </form>
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
            this.ItemCount = 1
            this.array = []
            this.startOn = ''
            this.finishedIt = ''
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
