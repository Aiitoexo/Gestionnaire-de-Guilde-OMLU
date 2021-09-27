<template>
    <div v-if="history.reduce !== null" class="grid grid-cols-12 w-full bg-gray-800 text-purple-300 shadow-lg rounded-md py-2 px-2 my-1 border-2 border-red-500">
        <p class="col-span-9">{{ history.user.name }} a retirer {{ history.reduce }}x <span class="text-blue-500">{{ history.resource.name }}</span></p>
        <p class="col-span-3">{{ history.date }}</p>
    </div>
    <div v-if="history.add !== null" class="grid grid-cols-12 w-full bg-gray-800 text-purple-300 shadow-lg rounded-md py-2 px-2 my-1 border-2 border-green-500">
        <p class="col-span-9">{{ history.user.name }} a ajouter {{ history.add }}x <span class="text-blue-500">{{ history.resource.name }}</span></p>
        <p class="col-span-3">{{ history.date }}</p>
    </div>
</template>

<script>
export default {
    props: ['history'],
    name: "ResourceHistory"
}
</script>

<style scoped>

</style>
