<template>
    <v-flex>
        <v-card xs12>
            <v-card-title>
                Category             
            </v-card-title>
            <v-card-text>
                <v-layout row wrap>
                    <v-btn color="primary" @click="opened_form_new = true">New</v-btn>
                    <v-spacer></v-spacer>
                    <v-text-field
                    append-icon="search"
                    label="Search"
                    single-line
                    hide-details
                    v-model="search"
                    ></v-text-field>
                </v-layout>
            </v-card-text>
            <v-data-table
                v-bind:headers="headers"
                v-bind:items="items"
                v-bind:search="search"
                hide-actions>
                <tr slot="items" slot-scope="props">
                    <td>{{ props.item.name }}</td>
                    <td>{{ props.item.image }}</td>                   
                    <td>{{ props.item.type }}</td>
                    <td>
                        <v-btn flat color="primary">Edit</v-btn>
                        <v-btn flat color="error" @click="destroy(props.item)">Delete</v-btn>
                    </td>
                </tr>
            </v-data-table>
        </v-card>

        <v-dialog v-model="opened_form_new" persistent max-width="290">
            <v-card>
                <v-card-title class="headline">New Category</v-card-title>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-text-field 
                                    label="Name" 
                                    v-model="model.name" 
                                    required
                                    @input="$v.model.name.$touch()"
                                    @blur="$v.model.name.$touch()"
                                    :error-messages="nameErrors">
                                </v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-select
                                    label="Type"
                                    required
                                    :items="types"
                                    item-text="text"
                                    item-value="value"
                                    v-model="model.type"
                                    @change="$v.model.type.$touch()"
                                    @blur="$v.model.type.$touch()"
                                    :error-messages="typeErrors">
                                </v-select>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary"  @click="addNew()">Save</v-btn>
                    <v-btn color="primary" @click="close()" flat>Close</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-snackbar
            :timeout="6000"
            top
            :color="snackbar.color"
            v-model="snackbar.show">
            {{ snackbar.message }}
            <v-btn flat color="pink" @click.native="snackbar.show = false">Close</v-btn>
        </v-snackbar>
    </v-flex>
</template>

<script>
import { mapState , mapActions } from 'vuex'
import { required } from 'vuelidate/lib/validators'
import Form from './../mixins/form'
import Notify from './../mixins/notify'

export default {
    name: 'Food',

    mixins: [ Form, Notify ],

    data() {
        return {
            search: '',
            headers: [
                { text: 'Name', value: 'name', align: 'left' },
                { text: 'Image', value: 'image_uri', align: 'left' },
                { text: 'Type', value: 'type', align: 'left' },
            ],
            pagination: {
                page: 1
            },
            opened_form_new: false,
            types: [
                { text: 'Food', value: 1 },
                { text: 'Beverage', value: 2 },
                { text: 'Other', value: 3 },
            ],
            model: {
                name: null,
                type: null
            },
            snackbar: {
                message: null,
                show: false,
                color: ''
            }
        }
    },

    validations: {
        model: {
            name: { required },
            type: { required },
        }
    },

    computed: {
        ...mapState({
            items: state => state.category.items,
        }),

        nameErrors() {
            const errors = []
            if (!this.$v.model.name.$dirty) return errors
            !this.$v.model.name.required && errors.push('Name is required.')
            return errors
        },

        typeErrors() {
            const errors = []
            if (!this.$v.model.type.$dirty) return errors
            !this.$v.model.type.required && errors.push('Type is required.')
            return errors
        }
    },

    mounted() {
        this.fetchData()
    },

    methods: {
        ...mapActions({
            fetchData: 'category/fetchData',
            create: 'category/create',
            destroy: 'category/destroy',
        }),

        addNew() {
            // this.validate()

            this.create(this.model)
            .then( response => {
                this.opened_form_new = false
                this.resetModel()
            })
            .catch( error => {
                this.notify('Fail to create a new category.', 'error')
            })
        },
    }
}
</script>

