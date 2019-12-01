import axios from 'axios'

const user_app_id = 'piperade_id'

function isAuthenticated() {
  const header = axios.defaults.headers.common['Authorization']
  const access_token = localStorage.getItem(user_app_id)

  if (_.isEmpty(header) && !_.isEmpty(access_token)) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${ access_token }`
  }

  return !_.isEmpty(access_token)
}

function remember(access_token) {
  localStorage.setItem(user_app_id, access_token)
  axios.defaults.headers.common['Authorization'] = `Bearer ${ access_token }`
}

function forget() {
  localStorage.removeItem(user_app_id)
}

export {
  isAuthenticated,
  remember,
  forget,
}
