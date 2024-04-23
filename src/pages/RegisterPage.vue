<template>
  <q-layout>
    <div style="width: 100vw; height:100vh;" class="q-pa-xl column items-center">
        <h1 class="q-mb-xl text-center">Register</h1>

        <q-form class=" q-gutter-y-md column items-center "  style="width: 50%;">
          <div style="width: 100%;">
            <q-input v-model="name" outlined rounded placeholder="User Name"  class=""  style="width: 100%;"></q-input>
            <p class="q-ml-md q-mt-sm" style="color: red;">{{ nameErr }}</p>
          </div>
          <div style="width: 100%;">
            <q-input v-model="email" outlined rounded placeholder="Email"  class=""  style="width: 100%;"></q-input>
            <p class="q-ml-md q-mt-sm" style="color: red;">{{ emailErr }}</p>
          </div>
          <div style="width: 100%;">
            <q-input v-model="password" outlined rounded placeholder="Password" class="" style="width: 100%;" ></q-input>
            <p class="q-ml-md q-mt-sm" style="color: red;">{{ passwordErr }}</p>
          </div >
          <div style="width: 100%;">
            <q-input v-model="cpassword" outlined rounded placeholder="Confirmation Password" class="" style="width: 100%;" ></q-input>
            <p class="q-ml-md q-mt-sm" style="color: red;">{{ cpasswordErr }}</p>
          </div>

          <div class="q-mt-lg column q-gutter-y-md" style="width: 25%;">
            <q-btn rounded size="md" label="Register" color="primary" @click="btnRegister"/>
            <q-btn rounded outline size="md" label="Log In" color="light-blue-10" @click.prevent="router.replace('/')"/>
          </div>
        </q-form>

    </div>
  </q-layout>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { api } from 'src/boot/axios.js'

const router = useRouter()

const name = ref('')
const nameErr = ref('')

const email = ref('')
const emailErr = ref('')

const password = ref('')
const passwordErr = ref('')

const cpassword = ref('')
const cpasswordErr = ref('')

const btnRegister = () => {
  api.post('registerUser', {
    name: name.value,
    email: email.value,
    password: password.value,
    cpassword: cpassword.value
  }).then((response) => {
    router.push('/')
  }).catch((err) => {
    // console.log(err.response.data.messages)
    nameErr.value = err.response.data.messages.name
    emailErr.value = err.response.data.messages.email
    passwordErr.value = err.response.data.messages.password
    cpasswordErr.value = err.response.data.messages.cpassword
  })
}

</script>
