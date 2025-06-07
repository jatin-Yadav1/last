<script>
    const app = Vue.createApp({
        data() {
            console.log('Vue is running!')
            return {
                loginForm: {
                    login: '',
                    password: '',
                    remember: false
                },
                errors: {},
                loading: false,
                message: '', // For single error/success message
                messageType: '', // 'success' or 'error'
            }
        },
        methods: {
            async submitLogin() {
                this.loading = true
                this.errors = {}
                this.message = ''
                this.messageType = ''

                try {
                    const response = await axios.post("{{ route('login') }}", this.loginForm, {
                        headers: {
                            'Accept': 'application/json',
                        }
                    })
                    console.log("response.data", response.data);
                    if (response.data.status === true) {
                        this.message = response.data.message
                        this.messageType = 'success'

                        // Redirect if needed
                        if (response.data.redirect) {
                            setTimeout(() => {
                                window.location.href = response.data.redirect
                            }, 1000)
                        }
                    } else {


                        this.message = response.data.message || 'Something went wrong.'
                        this.messageType = 'error'
                    }

                } catch (err) {
                    this.messageType = 'error'

                    if (err.response && err.response.status === 422) {
                        this.errors = err.response.data.errors || {}
                        this.message = err.response.data.message || 'Validation failed.'
                    } else if (err.response && err.response.data.message) {
                        this.message = err.response.data.message
                    } else {
                        this.message = 'Unexpected error occurred.'
                    }
                } finally {
                    this.loading = false
                }
            }
        }
    })

    app.mount('#auth-app')
</script>