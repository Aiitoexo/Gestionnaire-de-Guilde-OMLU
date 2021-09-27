<template>
    <div>
        <select v-model="selectTypeContribution">
            <option :value="'gold'">Gold</option>
            <option :value="'item'">Item</option>
        </select>

        <contribution-gold
            v-if="selectTypeContribution === 'gold'"
            :start_on="start_on"
            :finished_it="finished_it"
            :contribution_type="contribution_type">
        </contribution-gold>

        <contribution-item
            v-else-if="selectTypeContribution === 'item'"
            :start_on="start_on"
            :finished_it="finished_it"
            :all_resources="all_resources"
            :contribution_type="contribution_type">
        </contribution-item>
    </div>
</template>

<script>
import ContributionGold from "./ContributionGold";
import ContributionItem from "./ContributionItem";

export default {
    components: {
        ContributionGold,
        ContributionItem
    },
    props: ['all_resources', 'contribution_type', 'start_on', 'finished_it'],
    name: "ContributionCustom",
    data() {
        return {
            selectTypeContribution: 'gold'
        }
    }
}
</script>

<style scoped>

</style>
