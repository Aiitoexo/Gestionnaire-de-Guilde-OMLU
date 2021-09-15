<template>
    <div class="col-span-1 h-24">
        <div v-if="resource.rarity.id === 1" class="bg-cover bg-center flex items-center justify-center h-full filter brightness-125 rounded-lg border-2 border-gray-500 overflow-hidden" style="background-image: url('./img/frame-common.png')">
            <img class="object-center object-contain frame transform scale-125" :src="resource.img" alt="">
        </div>

        <div v-if="resource.rarity.id === 2" class="bg-cover bg-center flex items-center justify-center h-full filter brightness-125 rounded-lg border-2 border-green-400 overflow-hidden" style="background-image: url('./img/frame-uncommon.png')">
            <img class="object-center object-contain frame transform scale-125" :src="resource.img" alt="">
        </div>

        <div v-if="resource.rarity.id === 3" class="bg-cover bg-center flex items-center justify-center h-full filter brightness-125 rounded-lg border-2 border-blue-500 overflow-hidden" style="background-image: url('./img/frame-rare.png')">
            <img class="object-center object-contain frame transform scale-125" :src="resource.img" alt="">
        </div>

        <div v-if="resource.rarity.id === 4" class="bg-cover bg-center flex items-center justify-center h-full filter brightness-125 rounded-lg border-2 border-purple-400 overflow-hidden" style="background-image: url('./img/frame-epic.png')">
            <img class="object-center object-contain frame transform scale-125" :src="resource.img" alt="">
        </div>

        <div v-if="resource.rarity.id === 5" class="bg-cover bg-center flex items-center justify-center h-full filter brightness-125 rounded-lg border-2 border-yellow-600 overflow-hidden" style="background-image: url('./img/frame-legendary.png')">
            <img class="object-center object-contain frame transform scale-125" :src="resource.img" alt="">
        </div>
    </div>

    <div class="col-span-11 grid grid-cols-12 flex items-center gap-x-2 text-gray-900">
        <p class="col-span-3 text-lg">{{ resource.name }}</p>
        <p class="text-right col-span-2 py-2 px-4 bg-white rounded-md border border-gray-200 shadow-inner">{{ resource.quantity }}</p>
        <p class="text-center col-span-2 capitalize">{{ resource.rarity.name }}</p>
        <p class="text-center col-span-1" v-if="resource.tier">{{ resource.tier.name }}</p>
        <p class="text-center col-span-1" v-else></p>
        <div class="col-span-2">
            <form @submit.prevent="addItem" class="px-2 grid grid-cols-3">
                <input placeholder="0" v-model="formAdd.quantity" @click="resetReduce" class="w-full py-2 px-3 bg-white rounded-l-md border border-gray-200 shadow-inner col-span-2 overflow-hidden" type="number" min="1" max="99999">
                <button :disabled="this.formAdd.quantity === null" type="submit" class="col-span-1 p-3 bg-green-500 rounded-r-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
            </form>
        </div>
        <div class="col-span-2">
            <form @submit.prevent="reduceItem" class="px-2 grid grid-cols-3">
                <input placeholder="0" v-model="formReduce.quantity" @click="resetAdd" class="w-full py-2 px-3 bg-white rounded-l-md border border-gray-200 shadow-inner col-span-2 overflow-hidden" type="number" min="1" max="99999">
                <button :disabled="this.formReduce.quantity === null" type="submit" class="col-span-1 p-3 bg-red-500 rounded-r-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['resource', 'idx'],
    name: "ItemCard",
    data() {
        return {
            formReduce: {
                id: this.idx,
                quantity: null,
            },
            formAdd: {
                id: this.idx,
                quantity: null,
            }
        }
    },
    methods: {
        resetAdd() {
            this.formAdd.quantity = null
        },
        resetReduce() {
            this.formReduce.quantity = null
        },
        addItem() {
            this.$inertia.post(route('dashboard.add'), this.formAdd)
            this.formAdd.quantity = null
        },
        reduceItem() {
            this.$inertia.post(route('dashboard.remove'), this.formReduce)
            this.formReduce.quantity = null
        }
    }
}
</script>

<style scoped>
.frame {
    filter: drop-shadow(1px 1px 5px white) brightness(1.5);
}
</style>
