<template>
  <div id="app">
    <v-app id="inspire">
      <v-app id="inspire">
        <v-navigation-drawer
          v-model="drawer"
          app
        >
          <v-list dense>
            <v-subheader>Modulo Academico</v-subheader>
            <v-list-item link>
              <v-list-item-action>
                <v-icon>mdi-email</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>
                  <router-link :to="{name: 'Home'}">Alunos</router-link>
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-navigation-drawer>
    
        <v-app-bar
          app
          color="indigo"
          dark
        >
          <v-toolbar-title>EdTech</v-toolbar-title>
        </v-app-bar>
        <v-main>
          <v-container
            class="fill-height"
            fluid
          >
            <v-row
              align="center"
              justify="center"
            >
              <v-col class="text-center">
                <router-view/>
              </v-col>
            </v-row>
          </v-container>
        </v-main>
        <v-footer
          color="indigo"
          app
        >
          <span class="white--text">&copy; {{ new Date().getFullYear() }}</span>
        </v-footer>
      </v-app>
    </v-app>
  </div>
</template>

<script>

export default {
  name: 'App',
  data: () => ({
  }),
};
</script>
