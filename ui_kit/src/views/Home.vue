<template>
  <v-container grid-list-md>
    <v-layout row wrap>

      <v-flex xs12>
        <v-data-table
                :headers="headers"
                :items="desserts"
                class="elevation-1"
        >
          <template v-slot:items="props">
            <td>{{ props.item.sid }}</td>
            <td class="text-xs-right">{{ props.item.name }}</td>
          </template>
        </v-data-table>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
  export default {
    data () {
      return {
        headers: [
          { text: 'SID', value: 'sid' },
          { text: 'Name', value: 'name' },
        ],
        desserts: [
          {
            sid: 1,
            name: '阴萎杰的狗窝'
          },
          {
            sid: 2,
            name: '阴萎杰的狗窝'
          },
        ]
      }
    }
  }
</script>
