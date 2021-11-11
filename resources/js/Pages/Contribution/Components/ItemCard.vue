<template>
    <select required @change="resetCategory" v-model="select_category" class="col-span-3 h-full text-xl rounded flex items-center justify-center bg-gray-900 border-none">
        <option :value="category.id" v-for="category in all_categories">
            {{ category.name }}
        </option>
    </select>

    <div class="col-span-4 h-full">
        <div v-for="category in all_categories">
            <select required @change="displayImg(category)" v-model="resourceId" v-if="category.id === select_category" class="w-full h-14 text-xl rounded flex items-center justify-center bg-gray-900 border-none">
                <option value="0" selected disabled>Select</option>
                <option :value="resource.id" v-for="resource in category.resource" :key="resource.id">
                    {{ resource.name }}
                </option>
            </select>
        </div>
    </div>

    <img v-if="imgValue !== null" :src="imgValue" alt="" class="col-span-2 w-full h-14 object-center object-cover bg-gray-300 rounded shadow-inner">

    <input required :disabled="this.resourceId <= 0" @keyup="addItem" v-model="quantity" placeholder="0" type="number" min="1" class="col-span-3 text-xl rounded flex items-center justify-center bg-gray-900 border-none">
</template>

<script>
export default {
    props: ['all_categories', 'id_item_card'],
    name: "ItemCard",
    data() {
        return {
            select_category: 1,
            resourceId: 0,
            quantity: null,
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
