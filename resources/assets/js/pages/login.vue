<template>
    <v-app>
        <transition mode="out-in">
                <v-layout justify-center align-center>
                    <v-flex xs4>
                        <v-card>
                            <v-card-title class="blue darken-3 white--text"><h3>Mini Restaurant</h3></v-card-title>                            
                            <v-card-text>
                                <form>
                                    <v-text-field
                                        label="Username"
                                        v-model="model.username"
                                        :error-messages="usernameErrors"
                                        required
                                    ></v-text-field>
                                    <v-text-field
                                        label="Password"
                                        v-model="model.password"
                                        type="password"
                                        :error-messages="passwordErrors"
                                        required
                                    ></v-text-field>
                                    <v-checkbox
                                        label="Remember me"
                                        v-model="model.remember"
                                    ></v-checkbox>
                                    <v-layout justify-end>
                                        <v-btn @click="login" primary>Login</v-btn>
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
  import axios from 'axios'

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
          }
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
    },

    methods: {
        login () {
            this.$v.model.$touch()
            if(this.$v.model.$error){
                throw 'Validation failed';
            }

            axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

            axios.post('/login', this.model)
            .then( response => {
                console.log(response)
            })
        }
    },
  }
</script>
