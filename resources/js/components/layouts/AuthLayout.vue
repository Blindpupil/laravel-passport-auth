<template>
	<v-content>
		<v-img src="images/meals-lily-banse.jpeg" max-height="160">
			<v-overlay absolute opacity="0.89">
				<v-row align="center" class="white--text fill-height text-center">
					<v-col>
						<div class="headline">Welcome To Piperade</div>
					</v-col>
				</v-row>
			</v-overlay>
		</v-img>

		<v-container>
			<slot></slot>
		</v-container>
	</v-content>
</template>

<script>
export default {
  name: 'AuthLayout',
}
</script>

<style scoped>

</style>
