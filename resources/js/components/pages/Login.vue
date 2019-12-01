<template>
	<auth-layout>
		<h4 class="display-1">Login</h4>

		<v-form ref="form" v-model="valid" lazy-validation>
			<v-text-field v-model="email"
										label="E-mail"
										type="email"
										:rules="emailRules"
										required
			></v-text-field>

			<v-text-field
							v-model="password"
							label="Password"
							type="password"
							hint="At least 6 characters"
							:append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
							:type="show ? 'text' : 'password'"
							:rules="passwordRules"
							@click:append="show = !show"
							required
							counter
			></v-text-field>

			<v-btn block large :disabled="!valid" color="primary" class="my-6" @click="login">
				Login
			</v-btn>

			<p class="font-weight-bold text-center">
				You don't have an account yet?
				<router-link to="/register" class="text-link-primary"> Register</router-link>
			</p>

			<p class="error" v-if="error" v-text="error"></p>
		</v-form>
	</auth-layout>
</template>

<script>


export default {
  data: () => ({
    valid: true,
    email: '',
    show: false,
    emailRules: [
      v => !!v || 'E-mail is required',
      v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
    ],
    password: '',
    passwordRules: [
      v => !!v || 'Password is required',
      v => v.length >= 6 || 'Password must be least 6 characters',
    ],
    error: null,
  }),

  created() {
    eventBus.$on('error', ({ message }) => this.error = message)
  },

  methods: {
    async login() {
      if (this.$refs.form.validate()) {
        this.snackbar = true
        await this.$store.dispatch('login', {
          email: this.email,
          password: this.password,
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
