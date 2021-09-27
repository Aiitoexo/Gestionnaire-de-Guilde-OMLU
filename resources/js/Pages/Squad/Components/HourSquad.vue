<template>
    <select v-model="start_hour" @change="select_start_hour(squad.id)" class="text-center bg-transparent w-full border-none text-xl rounded font-sans">
        <option :selected="start_hour === '0'" value="0">00H</option>
        <option :selected="start_hour === i" v-for="i in 23" :value="i">{{ i.length === 1 ? '0' + i : i }}H</option>
    </select>

    <select v-model="end_hour" @change="select_end_hour(squad.id)" class="text-center bg-transparent w-full border-none text-xl rounded font-sans">
        <option :selected="end_hour === '0'" value="0">00H</option>
        <option :selected="end_hour === i" v-for="i in 23" :value="i">{{ i.length === 1  ? '0' + i : i }}H</option>
    </select>
</template>

<script>
export default {
    props: ['squad'],
    name: "HourSquad",
    data() {
        return {
            start_hour: null ? 0 : this.squad.start_hour,
            end_hour: null ? 0 : this.squad.end_hour,
        }
    },
    methods: {
        select_start_hour(squad) {
            let data = {
                squad_id: squad,
                start_hour: this.start_hour
            }

            this.$inertia.post(route('squad.start.hour'), data)
        },
        select_end_hour(squad) {
            let data = {
                squad_id: squad,
                end_hour: this.end_hour
            }

            this.$inertia.post(route('squad.end.hour'), data)
        },
    },
    mounted() {
        console.log(this.squad.start_hour)
    }
}
</script>

<style scoped>

</style>
