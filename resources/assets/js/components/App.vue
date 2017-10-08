<template>
  <v-app id="inspire">
    <v-navigation-drawer
      persistent
      clipped
      v-model="drawer"
      enable-resize-watcher
      app>
      <v-list dense>
        <v-list-tile @click="">
          <v-list-tile-action><v-icon>home</v-icon></v-list-tile-action>
          <v-list-tile-content><v-list-tile-title>Home</v-list-tile-title></v-list-tile-content>
        </v-list-tile>
        <v-list-tile @click="">
          <v-list-tile-action><v-icon>contact_mail</v-icon></v-list-tile-action>
          <v-list-tile-content><v-list-tile-title>Contact</v-list-tile-title></v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar class="blue lighten-2" dark fixed clipped-left app>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>Application</v-toolbar-title>
    </v-toolbar>
    <main>
      <v-content>
        <v-container> <!--  fluid fill-height -->
          <v-layout>
            <router-view></router-view>
          </v-layout>
        </v-container>
      </v-content>
    </main>
  </v-app>
</template>

<script>
export default {
  name: 'App',

  data () {
    return {
      drawer: true,
    }
  }
}
</script>