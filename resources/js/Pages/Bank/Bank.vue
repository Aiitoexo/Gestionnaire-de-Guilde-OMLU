<template>
    <default-layout>
        <div class="w-full h-contain flex space-x-5">
            <div class="w-8/12 bg-black bg-opacity-60 shadow-2xl overflow-hidden rounded-md">
                <ul class="flex w-full nav">
                    <resource-button @click="isActive(category.name)" :category="category.name" v-for="category in all_categories" :class="active === category.name ? 'text-gray-900 bg-gray-300' : 'bg-purpleDark-900'"></resource-button>
                </ul>

                <div class="contain w-full overflow-y-auto relative">
                    <div class="p-5 space-x-8 grid grid-cols-12 sticky top-0 bg-white z-10 mb-5 border-b border-gray-300">
                        <div class="col-span-1 h-full"></div>
                        <div class="px-5 col-span-11 grid grid-cols-12 gap-x-2 h-full flex items-center">
                            <p class="col-span-3 text-lg text-gray-800">Nom</p>
                            <p class="text-center col-span-2">Quantité BDG</p>
                            <p class="text-center col-span-2">Rareté</p>
                            <p class="text-center col-span-1">Tier</p>
                            <p class="text-center col-span-1"></p>
                            <div class="col-span-2"></div>
                            <div class="col-span-2"></div>
                        </div>
                    </div>

                    <div v-for="category in all_categories" class="px-5">
                        <div v-if="active === category.name" v-for="resource in category.resource" :key="resource.id" class="border border-purpleDark-700 space-x-8 p-5 shadow-lg bg-gray-900 mb-8 rounded-md flex items-center grid grid-cols-12">
                            <item-card :resource="resource" :idx="resource.id"></item-card>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-4/12 h-full bg-black bg-opacity-60 rounded-lg overflow-hidden">
                <div class="h-1/6 w-full grid grid-cols-1 bg-purpleDark-900 pb-3">
                    <div class="col-span-1 w-full p-4">
                        <div class="flex rounded-md border border-gray-200 overflow-hidden">
                            <p class="w-full h-full bg-white shadow-inner text-xl text-right px-2 py-2">{{ gold.gold }}</p>
                            <div class="px-10 flex items-center justify-center bg-green-500 text-xl text-white">Gold</div>
                        </div>
                    </div>

                    <div class="col-span-1 grid grid-cols-2 px-4 gap-8">
                        <form @submit.prevent="addGold" class="col-span-1 w-full flex">
                            <input class="rounded-l-md border-l border-gray-200 shadow-inner" v-model="formAdd.quantity" type="number" min="1">
                            <button class="flex items-center justify-center bg-green-500 w-full rounded-r-md text-lg text-white">Ajouter</button>
                        </form>

                        <form @submit.prevent="reduceGold" class="col-span-1 w-full flex">
                            <input class="rounded-l-md border-l border-gray-200 shadow-inner" v-model="formReduce.quantity" type="number" min="1">
                            <button class="flex items-center justify-center bg-red-500 w-full rounded-r-md text-lg text-white">Retirer</button>
                        </form>
                    </div>
                </div>

                <div class="w-full h-5/6 relative overflow-y-auto">
                    <div class="w-full">
                        <div class="grid grid-cols-2 sticky top-0">
                            <button :disabled="historyResource" @click="historyResourceActive" class="col-span-1 py-3 text-center mb-3 shadow-lg cursor-pointer" :class="historyResource ? 'bg-gray-300 text-gray-800' : 'bg-gray-800 text-white'">Historique BDG</button>
                            <button :disabled="historyGold" @click="historyGoldActive" class="col-span-1 py-3 text-center mb-3 shadow-lg cursor-pointer" :class="historyGold ? 'bg-gray-300 text-gray-800' : 'bg-gray-800 text-white'">Historique Gold</button>
                        </div>
                        <div v-if="historyResource" v-for="history in all_history_resource" class="flex w-full px-2">
                            <resource-history :history="history"></resource-history>
                        </div>
                        <div v-if="historyGold" v-for="gold in all_history_gold" class="flex w-full px-2">
                            <gold-history :gold="gold"></gold-history>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </default-layout>
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout";
import ResourceButton from "./Components/ResourceButton";
import ResourceHistory from "./Components/ResourceHistory";
import GoldHistory from "./Components/GoldHistory";
import ItemCard from "./Components/ItemCard";

export default {
    components: {
        DefaultLayout,
        ResourceButton,
        ResourceHistory,
        GoldHistory,
        ItemCard,
    },
    name: "Bank",
    props: ['all_resources', 'all_categories', 'all_history_resource', 'all_history_gold', 'gold'],
    data() {
        return {
            active: 'appât',
            removes: [],
            items: [],
            historyResource: true,
            historyGold: false,
            formAdd: {
                quantity: null,
            },
            formReduce: {
                quantity: null,
            },
        }
    },
    methods: {
        isActive(i) {
            this.active = i
        },
        historyResourceActive() {
            this.historyResource = !this.historyResource
            this.historyGold = !this.historyGold
        },
        historyGoldActive() {
            this.historyGold = !this.historyGold
            this.historyResource = !this.historyResource
        },
        addGold() {
            this.$inertia.post(route('bank.add.gold'), this.formAdd)
            this.formAdd.quantity = null
        },
        reduceGold() {
            this.$inertia.post(route('bank.reduce.gold'), this.formReduce)
            this.formReduce.quantity = null
        }
    },
}
</script>

<style scoped>
.h-contain {
    height: 84vh;
}
.nav {
    height: 5%;
}

.contain {
    height: 95%;
}
</style>
