<template>
    <section class="h-screen w-screen bg-contain bg-center relative overflow-y-auto" style="background-image: url('/img/texture-bottom.jpg')">
        <nav-bar class="fixed top-0 z-50"></nav-bar>

        <main class="h-full w-full px-12 pt-24 pb-12">
            <slot></slot>
        </main>
    </section>
</template>

<script>
import NavBar from "../Pages/Components/NavBar/NavBar";

export default {
    components: {
        NavBar
    },
    name: "Default"
}
</script>

<style scoped>

</style>
