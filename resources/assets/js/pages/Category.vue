<template>
    <v-flex>
        <v-card xs12>
            <v-card-title>
                Food             
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
                hide-actions>
                <tr slot="items" slot-scope="props">
                    <td>{{ props.item.code }}</td>
                    <td>{{ props.item.name }}</td>
                    <td>{{ props.item.image }}</td>                   
                    <td>{{ props.item.created_at }}</td>
                    <td>{{ props.item.updated_at }}</td>
                    <td><v-btn flat color="primary">Edit</v-btn></td>
                </tr>
            </v-data-table>
        </v-card>
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
                { text: 'Code', value: 'code', align: 'left' },
                { text: 'Name', value: 'name', align: 'left' },
                { text: 'Image', value: 'image_uri', align: 'left' },
                { text: 'Created At', value: 'created_at', align: 'left' },
                { text: 'Updated At', value: 'updated_at', align: 'left' },
            ],
            pagination: {
                page: 1
            }
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
        })
    }
}
</script>

