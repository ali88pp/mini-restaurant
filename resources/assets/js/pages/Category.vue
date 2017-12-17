<template>
    <v-flex>
        <v-card xs12>
            <v-card-title>
                Category             
            </v-card-title>
            <v-card-text>
                <v-layout row wrap>
                    <v-btn color="primary" @click="opened_form = true">New</v-btn>
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
                    <td><v-btn flat color="primary">Edit</v-btn></td>
                </tr>
            </v-data-table>
        </v-card>

        <v-dialog v-model="opened_form" persistent max-width="290">
            <v-card>
                <v-card-title class="headline">New Category</v-card-title>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-text-field label="Name" required></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-select
                                    label="Type"
                                    required
                                    :items="['Food', 'Beverage']"
                                    >
                                </v-select>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary"  @click="opened_form = false">Save</v-btn>
                    <v-btn color="primary" @click="opened_form = false" flat>Close</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-flex>
</template>

<script>
import { mapState , mapActions } from 'vuex'

export default {
    name: 'Food',

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
            opened_form: false,
        }
    },

    computed: {
        ...mapState({
            items: state => state.category.items,
        })
    },

    mounted() {
        this.fetchData()
    },

    methods: {
        ...mapActions({
            fetchData: 'category/fetchData',
        }),

        showAddNewForm() {

        }
    }
}
</script>

