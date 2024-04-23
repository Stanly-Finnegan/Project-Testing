<template>
  <q-layout>
    <div style="width: 100vw; height:100vh;" class="q-pa-xl column items-center">
        <h1 class="q-mb-xl text-center">Login</h1>

        <q-form class=" q-gutter-y-md column items-center "  style="width: 50%;">
          <q-input v-model="email" outlined rounded placeholder="Email"  class=""  style="width: 100%;"></q-input>
          <q-input v-model="password" outlined rounded placeholder="Password" class="" style="width: 100%;" ></q-input>

          <div class="q-mt-lg column q-gutter-y-md" style="width: 25%;">
            <q-btn rounded size="md" label="Log In" color="primary" @click="btnLogin"/>
            <q-btn rounded outline size="md" label="Register" color="light-blue-10" @click.prevent="router.replace('register')"/>
          </div>
        </q-form>

        <!-- Dialog -->

        <q-dialog v-model="alertDialog" class="q-px-sm">
          <q-card style="width:60%;">
            <q-card-section class="text-center">
              <h5 style="font-weight: bold;">Wrong Email or Password</h5>
            </q-card-section>

            <q-card-actions align="right">
              <q-btn flat label="OK" @click="alertDialog = false" color="light-blue-10"/>
            </q-card-actions>
          </q-card>
        </q-dialog>

    </div>
  </q-layout>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { api } from 'src/boot/axios.js'

const router = useRouter()

const alertDialog = ref(false)

const email = ref('')
const password = ref('')

const btnLogin = () => {
  api.post('loginUser', {
    email: email.value,
    password: password.value
  }).then((response) => {
    router.push('home')
  }).catch((err) => {
    console.log(err)
    alertDialog.value = true
  })
}

</script>
