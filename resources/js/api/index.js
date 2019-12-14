import axios from 'axios'
import errorHandler from './errorHandler'
import { forget, remember } from '../auth'

export default {
  async login(credentials) {
    try {
      const result = await axios.post('/api/login', credentials)
      const { access_token } = result.data
      remember(access_token)

      const response = await axios.get('/api/user')
      return response.data
    } catch(e) {
      return errorHandler(e)
    }
  },
  async logout() {
    const response = await axios.get('/api/logout')
    forget()

    return response.data
  },
  async fetchUser() {
    const response = await axios.get('/api/user')
    return response.data
  },
  async register(userInputs) {
    try {
      const response = await axios.post('/api/register', userInputs)
      return response.data
    } catch(e) {
      return errorHandler(e)
    }
  },
}
