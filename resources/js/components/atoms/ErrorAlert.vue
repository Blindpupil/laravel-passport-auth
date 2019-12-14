<template>
	<v-alert :value="!!error" type="error" dense outlined transition="scale-transition">
		{{ error }}
	</v-alert>
</template>
<script>
export default {
  name: 'ErrorAlert',
  data() {
    return {
      error: false,
    }
  },
  created() {
    eventBus.$on('error', ({ message }) => {
      this.error = message
      setTimeout(() => this.error = '', 5000)
    })
  },
}
</script>
