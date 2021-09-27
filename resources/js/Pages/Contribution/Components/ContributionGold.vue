<template>
    <form @submit.prevent="addContribution">
        <input v-model="startOn" type="datetime-local">
        <input v-model="finishedIt" type="datetime-local">
        <input v-model="quantityGold" type="number" min="1">
        <button>Yolo</button>
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
            quantityGold: 0
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
        }
    }
}
</script>

<style scoped>

</style>
