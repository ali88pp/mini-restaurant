<<template>
    <v-flex>
        <v-card xs12>
            <v-card-title>
                User
                <v-spacer></v-spacer>
                <v-text-field
                append-icon="search"
                label="Search"
                single-line
                hide-details
                v-model="search"
                ></v-text-field>
            </v-card-title>
            <v-data-table
                v-bind:headers="headers"
                v-bind:items="items"
                v-bind:search="search">
                <tr slot="items" slot-scope="props">
                    <td>{{ props.item.username }}</td>
                    <td>{{ props.item.email }}</td>
                </tr>
            </v-data-table>
        </v-card>
    </v-flex>
</template>

<script>
import { mapState , mapActions } from 'vuex'

export default {
    name: 'User',

    data() {
        return {
            pagination: {},
            search: '',
            headers: [
                { text: 'Username', value: 'username', align: 'left' },
                { text: 'Email', value: 'email', align: 'left' },
            ],
            // items: []
        }
    },

    computed: {
        ...mapState({
            items: state => state.user.items,
        })
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

