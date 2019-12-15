<template>
	<v-bottom-navigation :value="activeBtn" color="primary elevation-0" shift hide-on-scroll absolute>
		<v-btn size="large">
			<span>Recipes</span>
			<v-icon>{{ mdiRoomService }}</v-icon>
		</v-btn>

		<v-btn size="large">
			<span>Pantry</span>
			<v-icon>{{ mdiFridge }}</v-icon>
		</v-btn>

		<v-btn size="large">
			<span>Lists</span>
			<v-icon>{{ mdiClipboardList }}</v-icon>
		</v-btn>

		<v-btn size="large">
			<span>Calendar</span>
			<v-icon>{{ mdiCalendarMonth }}</v-icon>
		</v-btn>
	</v-bottom-navigation>
</template>

<script>
import { mdiCalendarMonth, mdiClipboardList, mdiFridge, mdiRoomService } from '@mdi/js'

export default {
  name: 'BottomNav',
  data: () => ({
    mdiFridge,
    mdiClipboardList,
    mdiCalendarMonth,
    mdiRoomService,
    drawer: null,
    activeBtn: 0,
  }),
}
</script>

<style scoped>

</style>
