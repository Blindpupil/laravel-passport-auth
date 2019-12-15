<template>
	<div>
		<v-navigation-drawer v-model="drawer" app right>
			<v-list>
				<v-list-item link>
					<v-list-item-action>
						<v-icon>{{ mdiHome }}</v-icon>
					</v-list-item-action>

					<v-list-item-content>
						<v-list-item-title @click="$router.push('/home')">Home</v-list-item-title>
					</v-list-item-content>
				</v-list-item>

				<v-list-item link>
					<v-list-item-action>
						<v-icon>{{ mdiLogout }}</v-icon>
					</v-list-item-action>

					<v-list-item-content>
						<v-list-item-title @click="logout">Logout</v-list-item-title>
					</v-list-item-content>
				</v-list-item>
			</v-list>
		</v-navigation-drawer>

		<v-app-bar app flat>
			<v-toolbar-title class="font-weight-black">
				<slot name="header"/>
			</v-toolbar-title>

			<v-spacer/>

			<v-btn icon>
				<v-icon color="primary" large>{{ mdiMagnify }}</v-icon>
			</v-btn>
			<v-app-bar-nav-icon @click.stop="drawer = !drawer">
				<v-icon color="primary" large>{{ mdiTune }}</v-icon>
			</v-app-bar-nav-icon>
		</v-app-bar>

		<v-content>
			<v-container class="fill-height" fluid>
				<slot/>
			</v-container>
		</v-content>

		<v-footer app>
			<bottom-nav/>
		</v-footer>
	</div>
</template>

<script>
import { mdiHome, mdiLogout, mdiMagnify, mdiTune } from '@mdi/js'

export default {
  name: 'DashboardLayout',
  data: () => ({
    mdiHome,
    mdiTune,
    mdiLogout,
    mdiMagnify,
    drawer: null,
  }),
  methods: {
    async logout() {
      await this.$store.dispatch('logout')
      this.$router.push('/')
    },
  },
}
</script>

<style scoped>

</style>
