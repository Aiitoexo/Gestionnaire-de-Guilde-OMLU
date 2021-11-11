<template>
    <form @submit.prevent="addContribution" class="col-span-10 grid grid-cols-12 gap-4">
        <input required v-model="startOn" type="date" class="col-span-4 h-12 text-xl rounded flex items-center justify-center bg-gray-900 border-none">
        <input required v-model="finishedIt" type="date" class="col-span-4 h-12 text-xl rounded flex items-center justify-center bg-gray-900 border-none">
        <input required v-model="quantityGold" placeholder="0" type="number" min="1" class="col-span-4 h-12 text-xl rounded flex items-center justify-center bg-gray-900 border-none">
        <button class="col-span-12 bg-purpleDark-900 text-white text-2xl py-2 rounded border border-purple-300">Enregistrer</button>
    </form>
</template>

<script>
export default {
    props: ['contribution_type'],
    name: "ContributionGold",
    data() {
        return {
            typeContribution: this.contribution_type,
            startOn: '',
            finishedIt: '',
            quantityGold: null
        }
    },
    methods: {
        addContribution() {

            console.log(this.start_on)
            let data = {
                type_contribution: this.typeContribution,
                start_on: this.startOn,
                finished_it: this.finishedIt,
                quantity: this.quantityGold,
            }

            this.$inertia.post(route('add.contribution.gold'), data)

            this.quantityGold = 0
            this.startOn = ''
            this.finishedIt = ''
        }
    }
}
</script>

<style scoped>

</style>
