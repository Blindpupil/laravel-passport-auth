export default function (error) {
  if (error.response) {
    eventBus.$emit('error', error.response.data)
  } else if (error.request) {
    // The request was made but no response was received
    // `error.request` is an instance of XMLHttpRequest in the browser
    console.log(error.request)
  } else {
    // Something happened in setting up the request that triggered an Error
    console.log('Error', error.message)
  }
  return false
}
