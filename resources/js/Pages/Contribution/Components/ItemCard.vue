<template>
    <select @change="resetCategory" v-model="select_category">
        <option :value="category.id" v-for="category in all_categories">
            {{ category.name }}
        </option>
    </select>

    <div v-for="category in all_categories">
        <select @change="displayImg(category)" v-model="resourceId" v-if="category.id === select_category">
            <option value="0" selected disabled>Select</option>
            <option :value="resource.id" v-for="resource in category.resource" :key="resource.id">
                {{ resource.name }}
            </option>
        </select>
    </div>

    <img :src="imgValue" alt="">

    <input :disabled="this.resourceId <= 0" @keyup="addItem" v-model="quantity" type="number" min="1">
</template>

<script>
export default {
    props: ['all_categories', 'id_item_card'],
    name: "ItemCard",
    data() {
        return {
            select_category: 1,
            resourceId: 0,
            quantity: 0,
            imgValue: null
        }
    },
    methods: {
        resetCategory() {
            this.resourceValue = 0
            this.imgValue = null
        },
        displayImg(category) {
            category.resource.forEach(resource => {
                if (this.resourceId === resource.id) {
                    this.imgValue = resource.img
                }
            })

        },
        addItem() {
            if (this.timer) {
                clearTimeout(this.timer);
                this.timer = null;
            }
            this.timer = setTimeout(() => {
                let data = {
                    'id_item_card': this.id_item_card,
                    'id_item': this.resourceId,
                    'item_quantity': this.quantity
                }

                if (data['item_quantity'] !== '' && data['id_item'] > 0) {
                    this.$emit('resource-id', data)
                }

            }, 800);
        }
    }
}
</script>

<style scoped>

</style>
