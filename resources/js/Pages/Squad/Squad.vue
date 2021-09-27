<template>
    <default-layout>
        <div class="grid grid-cols-12 w-full main-color text-purple-300 text-2xl py-4 px-14"
             style="mask-size: 100% 100%;mask-image: url('data:image/png;base64,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')">
            <div class="border-r border-red-50 col-span-2 flex items-center justify-center">Pseudo</div>
            <div class="border-r border-red-50 col-span-2 flex items-center justify-center">Arme 1</div>
            <div class="border-r border-red-50 col-span-2 flex items-center justify-center">Arme 2</div>
            <div class="border-r border-red-50 col-span-2 flex items-center justify-center">Classe</div>
            <div class="border-r border-red-50 col-span-2 flex items-center justify-center">Metier 1</div>
            <div class="col-span-2 flex items-center justify-center">Metier 2</div>
        </div>

        <div class="w-full text-purple-300 py-4 px-14">
            <div v-for="squad in all_squad" class="grid grid-cols-1 w-full mb-6 py-3 my-3 gap-x-3 px-3 bg-black bg-opacity-60 rounded-md">
                <div class="col-span-1 grid grid-cols-12 flex items-center justify-center rounded-md bg-gray-900 mb-2 text-4xl py-2">
                    <div class="col-span-6 col-start-4 text-center">
                        {{ squad.name }}
                    </div>
                    <div class="col-span-3 flex gap-x-3 text-xl">
                        <hour-squad :squad="squad">
                        </hour-squad>
                    </div>
                </div>
                <div class="col-span-1 space-y-3">
                    <div v-for="user in squad.user" class="grid grid-cols-12 w-full py-1 rounded-md gap-x-3 text-xl">
                        <user-squad
                            :user="user"
                            :all_weapons="all_weapons"
                            :all_classes="all_classes"
                            :all_job_harvests="all_job_harvests"
                            :all_job_transformation="all_job_transformation">
                        </user-squad>
                    </div>
                </div>
            </div>
        </div>
    </default-layout>
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout";
import UserSquad from "./Components/UserSquad";
import HourSquad from "./Components/HourSquad";

export default {
    components: {
        DefaultLayout,
        UserSquad,
        HourSquad
    },
    props: ['all_squad', 'all_weapons', 'all_job_harvests', 'all_job_transformation', 'all_classes'],
    name: "Squad",
    methods: {
        selectFirstWeapon(user) {

            let data = {
                user_id: user,
                first_weapon_id: this.firstWeapon,
            }

            this.$inertia.post(route('squad.first.weapon'), data)
            this.firstWeapon = null
        },
        selectSecondWeapon(user) {

            let data = {
                user_id: user,
                first_weapon_id: this.firstWeapon,
            }

            this.$inertia.post(route('squad.first.weapon'), data)
            this.firstWeapon = null
        }
    },
    mounted() {
        // this.$inertia.post(route('squad.reload.user'))
    }
}
</script>

<style scoped>

</style>
