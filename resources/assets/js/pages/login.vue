<template>
    <v-app>
        <transition mode="out-in">
                <v-layout justify-center align-center>
                    <v-flex xs4>
                        <v-card>
                            <v-card-title class="blue darken-3 white--text"><h3>Mini Restaurant</h3></v-card-title>                            
                            <v-card-text>
                                <v-alert :color="alert_status" 
                                        :icon="icon"  
                                        :value="alert_status !== null" 
                                        transition="slide-y-transition">
                                    {{ message }}
                                </v-alert>
                                <form>
                                    <v-text-field
                                        label="Username"
                                        v-model="model.username"
                                        :error-messages="usernameErrors"
                                        required
                                        @keypress.enter="login()"
                                    ></v-text-field>
                                    <v-text-field
                                        label="Password"
                                        v-model="model.password"
                                        type="password"
                                        :error-messages="passwordErrors"
                                        required
                                        @keypress.enter="login()"
                                    ></v-text-field>
                                    <v-checkbox
                                        label="Remember me"
                                        v-model="model.remember"
                                    ></v-checkbox>
                                    <v-layout justify-end>
                                        <v-btn @click="login()" color="primary">Login</v-btn>
                                    </v-layout>
                                </form>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>
        </transition>
    </v-app>  
</template>

<script>
  import { validationMixin } from 'vuelidate'
  import { required, maxLength } from 'vuelidate/lib/validators'
  import http from './../http'

  export default {
    mixins: [validationMixin],
    validations: {
        model: {
            username: { required },
            password: { required }
        }
    },

    data () {
        return {
            model: {
                username: '',
                password: '',
                remember: false
            },
            alert_status: null,
            message: ''
        }
    },

    computed: {
        usernameErrors () {
            const errors = []

            if (!this.$v.model.username.$dirty) return errors
            !this.$v.model.username.required && errors.push('Field is required')

            return errors
        },

        passwordErrors () {
            const errors = []

            if (!this.$v.model.password.$dirty) return errors
            !this.$v.model.password.required && errors.push('Field is required')

            return errors
        },

        icon() {
            if(this.alert_status === 'success')
                return 'check_circle'

            if(this.alert_status === 'error')
                return 'warning'
            
            return ''
        }
    },

    methods: {
        login () {
            this.$v.model.$touch()
            if(this.$v.model.$error){
                throw 'Validation failed';
            }

            http.post('/login', this.model)
            .then( response => {
                this.message = response.data.message
                this.alert_status = 'success'

                window.location = '/'
            })
            .catch( error => {
                this.message = error.response.data.errors.username[0]
                this.alert_status = 'error'
            })
        }
    },
  }
</script>
