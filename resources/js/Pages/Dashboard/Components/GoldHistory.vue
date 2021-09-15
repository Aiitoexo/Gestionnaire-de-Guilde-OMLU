<template>
    <div v-if="gold.reduce !== null" class="grid grid-cols-12 w-full bg-white shadow-lg rounded-md py-2 px-2 my-1 border-2 border-red-500">
        <p class="col-span-9">{{ gold.user.name }} a retirer <span class="text-blue-500">{{ gold.reduce }}</span> Gold (ancien fond {{ gold.quantity }})</p>
        <p class="col-span-3">{{ gold.date }}</p>
    </div>
    <div v-if="gold.add !== null" class="grid grid-cols-12 w-full bg-white shadow-lg rounded-md py-2 px-2 my-1 border-2 border-green-500">
        <p class="col-span-9">{{ gold.user.name }} a ajouter <span class="text-blue-500">{{ gold.add }}</span> Gold (ancien fond {{ gold.quantity }})</p>
        <p class="col-span-3">{{ gold.date }}</p>
    </div>
</template>

<script>
export default {
    props: ['gold'],
    name: "GoldHistory"
}
</script>

<style scoped>

</style>
