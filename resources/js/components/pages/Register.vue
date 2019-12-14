<template>
	<auth-layout>
		<h4 class="display-1">Register</h4>

		<v-form ref="form" v-model="valid" lazy-validation>
			<v-text-field
					v-model="name"
					label="Name"
					type="text"
					:rules="nameRules"
					required
			/>

			<v-text-field
					v-model="email"
					label="E-mail"
					type="email"
					:rules="emailRules"
					required
			/>

			<v-text-field
					v-model="password"
					label="Confirm password"
					type="password"
					hint="At least 6 characters"
					:append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
					:type="show ? 'text' : 'password'"
					:rules="passwordRules"
					@click:append="show = !show"
					required
					counter
			/>

			<v-text-field
					v-model="passwordConfirm"
					label="Password"
					type="password"
					hint="At least 6 characters"
					:append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
					:type="show ? 'text' : 'password'"
					:rules="passwordConfirmRules"
					@click:append="show = !show"
					required
					counter
			/>

			<v-btn block large :disabled="!valid" color="primary" class="my-6" @click="register">
				Register
			</v-btn>

			<error-alert/>
		</v-form>

		<p class="font-weight-bold text-center">
			Have an account already?
			<router-link to="/login" class="text-link-primary"> Login</router-link>
		</p>
	</auth-layout>
</template>

<script>
export default {
  name: 'Register',
  data() {
    return {
      valid: true,
      name: '',
      email: '',
      show: false,
      nameRules: [
        v => !!v || 'You must have a name, don\'t you?',
      ],
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
      password: '',
      passwordRules: [
        v => !!v || 'Password is required',
        v => v.length >= 6 || 'Password must be least 6 characters',
      ],
      passwordConfirm: '',
      passwordConfirmRules: [
        v => !!v || 'Password is required',
        v => v.length >= 6 || 'Password must be least 6 characters',
        v => v === this.password || 'Password confirmation doesn\'t match',
      ],
    }
  },

  methods: {
    async register() {
      if (this.$refs.form.validate()) {
        this.snackbar = true
        await this.$store.dispatch('register', {
          email: this.email,
          name: this.name,
          password: this.password,
          password_confirmation: this.passwordConfirm,
        })

        const { isLoggedIn } = this.$store.state
        if (isLoggedIn) this.$router.push('/app')
      }
    },
  },
}
</script>

<style scoped>

</style>
