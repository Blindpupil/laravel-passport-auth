<template>
	<div>
		Dashboard goes here

		<v-btn @click="logout">Logout</v-btn>
	</div>
</template>

<script>
export default {
  name: 'Dashboard',
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
