<template>
  <div class="container text-center">

    <row>
      <v-btn
          class="ma-2"
          outlined
          color="indigo"
      >
        Outlined Button
      </v-btn>
      <v-btn
          class="ma-2"
          outlined
          fab
          color="teal"
      >
        <v-icon>mdi-format-list-bulleted-square</v-icon>
      </v-btn>
      <v-btn
          class="ma-2"
          outlined
          large
          fab
          color="indigo"
      >
        <v-icon>mdi-pencil</v-icon>
      </v-btn>
    </row>


    <row>
      <v-sheet
          :color="`grey ${theme.isDark ? 'darken-2' : 'lighten-4'}`"
          class="pa-3"
      >
        <v-skeleton-loader
            class="mx-auto"
            max-width="300"
            type="card"
        ></v-skeleton-loader>
      </v-sheet>
    </row>


    <row class="text-center d-flex align-center justify-space-around">
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <v-btn
              color="primary"
              dark
              v-bind="attrs"
              v-on="on"
          >
            Button
          </v-btn>
        </template>
        <span>Tooltip</span>
      </v-tooltip>

      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <v-icon
              color="primary"
              dark
              v-bind="attrs"
              v-on="on"
          >
            mdi-home
          </v-icon>
        </template>
        <span>Tooltip</span>
      </v-tooltip>

      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
      <span
          v-bind="attrs"
          v-on="on"
      >This text has a tooltip</span>
        </template>
        <span>Tooltip</span>
      </v-tooltip>
    </row>


    <v-row align="center">
      <v-col
          class="d-flex"
          cols="12"
          sm="6"
      >
        <v-select
            :items="items"
            label="Standard"
        ></v-select>
      </v-col>

      <v-col
          class="d-flex"
          cols="12"
          sm="6"
      >
        <v-select
            :items="items"
            filled
            label="Filled style"
        ></v-select>
      </v-col>

      <v-col
          class="d-flex"
          cols="12"
          sm="6"
      >
        <v-select
            :items="items"
            label="Outlined style"
            outlined
        ></v-select>
      </v-col>

      <v-col
          class="d-flex"
          cols="12"
          sm="6"
      >
        <v-select
            :items="items"
            label="Solo field"
            solo
        ></v-select>
      </v-col>
    </v-row>

  </div>
</template>

<script>
export default {
  name: "code",
  data: () => ({
    items: ['Foo', 'Bar', 'Fizz', 'Buzz'],
  }),
  inject: {
    theme: {
      default: { isDark: false },
    },
  },
}
</script>

<style scoped>

</style>