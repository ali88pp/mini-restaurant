export default {
    methods: {       
        close() {
            this.resetModel()
            this.$v.model.$reset()
            this.opened_form_new = false
        },

        validate() {
            this.$v.model.$touch()
            if(this.$v.model.$error)
            {
                throw 'Validation failed'
            }
        },

        resetModel() {
            for(let prop in this.model){
                this.model[prop] = null;
            }
        }
    }
}