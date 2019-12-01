<template>
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
            :rules="passwordRules"
            required
        ></v-text-field>

        <v-btn :disabled="!valid" color="success" class="mr-4" @click="login">
            Login
        </v-btn>

        <v-btn color="error" class="mr-4" @click="reset">
            Reset Form
        </v-btn>

        <p class="error" v-if="error" v-text="error"></p>
    </v-form>
</template>

<script>
export default {
  data: () => ({
    valid: true,
    email: '',
    emailRules: [
      v => !!v || 'E-mail is required',
      v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
    ],
    password: '',
    passwordRules: [v => !!v || 'Password is required'],
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
    reset() {
      this.$refs.form.reset()
    },
  },
}
</script>

<style scoped>

</style>
