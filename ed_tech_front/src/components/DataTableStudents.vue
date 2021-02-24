<template>
  <v-container>
      <v-card>
        <v-card-title>
          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Pesquisar"
            single-line
            hide-details
          ></v-text-field>

        <v-spacer></v-spacer>
          <router-link :to="{name: 'CreateStudent'}" tag="button">
            <v-btn >Cadastrar Aluno</v-btn>
          </router-link>
        </v-card-title>
        <v-data-table
          :headers="headers"
          :items="students"
          :search="search"
        >
        
        <template v-slot:item.actions="{ item }">
          <v-btn small
            color='teal lighten-4'
            @click="editItem(item)"
          >
            Editar
          </v-btn>
          |
          <v-btn small
            color='red lighten-2'
            @click="deleteItem(item)"
          >
            Excluir
          </v-btn>
        </template>
      </v-data-table>
    </v-card>
  </v-container>
</template>

<script>

import student from '@/services/students'

export default {
    data () {
      return {
        search: '',
        headers: [
          {
            text: 'RA',
            align: 'start',
            value: 'RA',
          },
          { text: 'Name', value: 'name' },
          { text: 'CPF', value: 'cpf' },
          { text: 'Email', value: 'email' },
          { text: 'Actions', value: 'actions', filterable: false },
        ],
        students: [],
        dialog: false,
      }
    },
    mounted(){
      student.listAllStudents().then(resposta => {
        this.students = resposta.data;
      })
    },
    methods:{
      editItem(item){
        this.$router.push({ name: 'EditStudent', params: {RA: item.RA}})
      },
      async deleteItem(item) {
        const res = await this.$confirm(
          "Deseja excluir este este registro?",
          { color: "warning", title: "Aviso de exclusão", buttonTrueText: "Excluir", buttonFalseText: "Cancelar" }
        );
        if (res) {
          student.deleteStudent(item.RA).then(resposta=>{
            if(resposta.data.status == "true"){
              student.listAllStudents().then(respLista => {
              this.students = respLista.data;
              })
            }
          }
          ).catch()
        }
      },
    }
  }
</script>


