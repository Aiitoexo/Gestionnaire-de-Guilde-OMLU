<template>
    <default-layout>
        <div class="w-full bg-white p-10 h-full">
            <div class="w-full grid grid-cols-12">
                <p class="col-span-2">Contribution n 1</p>
                <select @change="yolo" v-model="selectContribution">
                    <option value="guild">Guilde</option>
                    <option value="custom">Personaliser</option>
                </select>
            </div>

            <div>
                <div v-if="selectContribution === 'guild'" class="h-10 w-10 bg-red-400">
                    <contribution-guild
                        :contribution_type="selectContribution"
                        :all_categories="all_categories"
                        :all_resources="all_resources">
                    </contribution-guild>
                </div>

                <div v-if="selectContribution === 'custom'" class="h-10 w-10 bg-green-500">
                    <contribution-custom
                        :contribution_type="selectContribution"
                        :all_categories="all_categories"
                        :all_resources="all_resources">
                    </contribution-custom>
                </div>
            </div>
        </div>
    </default-layout>
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout";
import ContributionGuild from "./Components/ContributionGuild";
import ContributionCustom from "./Components/ContributionCustom";

export default {
    components: {
        DefaultLayout,
        ContributionGuild,
        ContributionCustom
    },
    props: ['all_squad', 'all_resources', 'all_categories'],
    name: "Contribution",
    data() {
        return {
            selectContribution: 'guild',
            start_on: '',
            finished_it: '',
        }
    },
    methods: {
        yolo() {
            console.log(this.start_on)
        }
    }
}
</script>

<style scoped>

</style>
