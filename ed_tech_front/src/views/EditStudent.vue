<template>
  <validation-observer
    ref="observer"
    v-slot="{ invalid }"
  >
    <form @submit.prevent="submit">
      <v-text-field
        v-model="RA"
        label="Registro Academico"
        disabled
      ></v-text-field>
      <validation-provider
        v-slot="{ errors }"
        name="Name"
        rules="required|max:50"
      >
        <v-text-field
          v-model="name"
          :counter="50"
          :error-messages="errors"
          label="Name"
          required
        ></v-text-field>
      </validation-provider>
      <v-text-field
        v-model="cpf"
        label="CPF"
        disabled
      ></v-text-field>
      <validation-provider
        v-slot="{ errors }"
        name="email"
        rules="required|email"
      >
        <v-text-field
          v-model="email"
          :error-messages="errors"
          label="E-mail"
          required
        ></v-text-field>
      </validation-provider>
      <v-btn
        class="mr-4"
        type="submit"
        :disabled="invalid"
      >
        Salvar
      </v-btn>
      <router-link :to="{name: 'Home'}" tag="button">
        <v-btn @click="clear">
          Cancelar
        </v-btn>
      </router-link>
    </form>
  </validation-observer>
</template>

<script>
  import { required, digits, email, max } from 'vee-validate/dist/rules'
  import { extend, ValidationObserver, ValidationProvider, setInteractionMode } from 'vee-validate'
  import student from '@/services/students'

  setInteractionMode('eager')

  extend('digits', {
    ...digits,
    message: '{_field_} precisa ser {length} digitos. ({_value_})',
  })

  extend('required', {
    ...required,
    message: '{_field_} não pode ser vazio',
  })

  extend('max', {
    ...max,
    message: '{_field_} não pode ser maior que {length} caracteres',
  })

  extend('email', {
    ...email,
    message: 'Email precisa ser valido',
  })

  export default {
    activeTitle: "Atualização de Alunos",
    components: {
      ValidationProvider,
      ValidationObserver,
    },
    data: () => ({
      RA: '',
      name: '',
      cpf: '',
      email: '',
    }),
    mounted(){
        student.getStudent(this.$route.params.RA).then(resposta=>{
          this.RA = resposta.data.RA;
          this.name = resposta.data.name;
          this.cpf = resposta.data.cpf;
          this.email = resposta.data.email;
        })
    },

    methods: {
      submit () {
        this.$refs.observer.validate()
        student.updateStudent(this.RA,this.name,this.email)
        .then(resposta=>{
          if(resposta.data.status == "true"){
            this.$router.push({ name: 'Home'})
          }
        })
        .catch()
      },
      clear () {
        this.name = ''
        this.cpf = ''
        this.email = ''
        this.$refs.observer.reset()
      }
    },
  }
</script>
