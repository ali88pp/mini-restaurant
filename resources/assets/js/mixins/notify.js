export default {
    methods: {       
        notify(message, color = '') {
            this.snackbar.message = message
            this.snackbar.color = color
            this.snackbar.show = true
        }
    }
}