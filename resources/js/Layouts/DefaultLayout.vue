<template>
    <section class="h-screen w-screen bg-cover bg-center relative overflow-y-auto" style="background-image: url('/img/texture-bottom.jpg')">
        <nav-bar class="fixed top-0 z-50"></nav-bar>

        <main class="w-full h-full px-12 pt-24 pb-12 absolute">
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

<style>
.main-color {
    background-color: #0d061b;
}
</style>
