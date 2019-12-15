<template>
	<v-bottom-navigation :value="activeBtn" color="primary elevation-0" shift hide-on-scroll absolute>
		<v-btn size="small" min-width="20%" max-width="20%">
			<span>Recipes</span>
			<v-icon>{{ mdiRoomService }}</v-icon>
		</v-btn>

		<v-btn size="small" min-width="20%" max-width="20%">
			<span>Pantry</span>
			<v-icon>{{ mdiFridge }}</v-icon>
		</v-btn>

		<v-btn size="small" min-width="20%" max-width="20%">
			<span>Menus</span>
			<v-icon>{{ mdiFormatListBulleted }}</v-icon>
		</v-btn>

		<v-btn size="small" min-width="20%" max-width="20%">
			<span>Lists</span>
			<v-icon>{{ mdiClipboardList }}</v-icon>
		</v-btn>

		<v-btn size="small" min-width="20%" max-width="20%">
			<span>Calendar</span>
			<v-icon>{{ mdiCalendarMonth }}</v-icon>
		</v-btn>
	</v-bottom-navigation>
</template>

<script>
import { mdiCalendarMonth, mdiClipboardList, mdiFormatListBulleted, mdiFridge, mdiRoomService } from '@mdi/js'

export default {
  name: 'BottomNav',
  data: () => ({
    mdiFridge,
    mdiClipboardList,
    mdiCalendarMonth,
    mdiRoomService,
    mdiFormatListBulleted,
    drawer: null,
    activeBtn: 0,
  }),
}
</script>

<style scoped>

</style>
