<template>
	<dashboard-layout>
		<template v-slot:header>
			Recipes
		</template>
		<v-row>
			<v-col cols="12">
				<v-row align-content="center" class="recipe-view-content-height">
					<v-col cols="12" class="text-center">
						<v-icon size="90">{{ mdiPackageVariant }}</v-icon>
					</v-col>
					<v-col cols="12" class="text-center font-weight-medium">
						No recipes saved at the moment
					</v-col>
				</v-row>
			</v-col>

			<v-col cols="12">
				<v-btn block large color="primary" class="my-6 font-weight-bold">
					Add a recipe
				</v-btn>
			</v-col>
		</v-row>
	</dashboard-layout>
</template>

<script>
import { mdiPackageVariant } from '@mdi/js'

export default {
  name: 'Dashboard',
  data: () => ({
    mdiPackageVariant,
  }),
}
</script>

<style scoped>

</style>
