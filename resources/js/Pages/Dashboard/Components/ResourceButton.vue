<template>
    <li class="flex-1 flex justify-center items-center text-center h-full text-white capitalize border-r-2 border-gray-600 hover:text-gray-900 hover:bg-gray-300 cursor-pointer">
        {{ category }}
    </li>
</template>

<script>
export default {
    props: ['category'],
    name: "ResourceButton"
}
</script>

<style scoped>

</style>
