<template>
    <v-flex>
        <v-card xs12>
            <v-card-title>
                User             
            </v-card-title>
            <v-card-text>
                <v-layout row wrap>
                    <v-btn color="primary">New</v-btn>
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
                v-bind:pagination.sync="pagination"
                hide-actions>
                <tr slot="items" slot-scope="props">
                    <td>{{ props.item.username }}</td>
                    <td>{{ props.item.email }}</td>
                    <td>{{ props.item.roles.map( role => role.name ).join(', ') }}</td>
                    <td><v-btn flat color="primary">Edit</v-btn></td>
                </tr>
            </v-data-table>
            <div class="text-xs-center pt-2">
                <v-pagination :length="length" v-model="pagination.page"></v-pagination>
            </div>
        </v-card>
    </v-flex>
</template>

<script>
import { mapState , mapActions } from 'vuex'

export default {
    name: 'User',

    data() {
        return {
            search: '',
            headers: [
                { text: 'Username', value: 'username', align: 'left' },
                { text: 'Email', value: 'email', align: 'left' },
                { text: 'Roles', value: 'roles', align: 'left' },
            ],
            pagination: {
                page: 1
            }
        }
    },

    computed: {
        // ...mapState({
        //     items: state => state.user.items,
        // }),

        items() {
            return this.$store.state.user.data !== null ? this.$store.state.user.data.data : []
        },

        length() {
            return this.$store.state.user.data !== null ? this.$store.state.user.data.last_page : 0
        }
    },

    mounted() {
        this.fetchData()
    },

    methods: {
        ...mapActions({
            fetchData: 'user/fetchData',
        })
    }
}
</script>

