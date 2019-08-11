<template>
    <v-layout>
        <v-flex sm12 md7>
            
                <v-tabs v-model="active">
                    <v-tabs-bar>
                        <v-tabs-item
                            v-for="tab in tabs"
                            :key="tab"
                            :href="'#' + tab"
                            ripple
                            >
                                {{ tab }}
                                </v-tabs-item>
                                <v-tabs-slider color="yellow"></v-tabs-slider>
                            </v-tabs-bar>
                        <v-tabs-items>
                        <v-tabs-content
                        v-for="tab in tabs"
                        :key="tab"
                        :id="tab"
                        >
                            <v-container fluid v-bind="{ ['grid-list-md']: true }">
                                <v-layout row wrap>
                                    <v-flex
                                        xs4 sm2
                                        v-for="n in 20"
                                        :key="n"
                                        >
                                        <a @click.prevent="">
                                            <v-card>
                                                <v-card-media
                                                    :src="`https://unsplash.it/300/300?image=${Math.floor(Math.random() * 100) + 1}`"
                                                    height="70px"
                                                    >
                                                </v-card-media>
                                            </v-card>
                                        </a>
                                        <span>Item</span>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-tabs-content>
                    </v-tabs-items>
                </v-tabs>
            
        </v-flex>
    </v-layout>
</template>

<script>
export default {
    name: 'OrderNew',

    data() {
        return {
            tabs: ['Food', 'Beverage', 'Other'],
            active: null,
            text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
        }
    }
}
</script>