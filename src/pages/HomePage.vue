<template>
  <q-layout>
    <div style="width: 100vw; height:100vh;" class="q-pa-xl column items-center">
        <div style="width:100%">
          <q-icon
          size="lg"
          color="red"
          name="logout"
          class="cursor-pointer"
          />
        </div>

      <h2 class="q-mb-xl text-center text-weight-bold">{{ name }}'s Todolist</h2>
      <q-btn unelevated round color="primary" size="md" icon ='add' @click="addDialogStatus=true"/>
    </div>

    <addDialog :dialogStatus="addDialogStatus" @onClose="addDialogStatus=false"/>

  </q-layout>
</template>

<script setup>
import { api } from 'src/boot/axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import addDialog from 'components/ComponentDialogAdd.vue'

const name = ref('')
const router = useRouter()
const addDialogStatus = ref(false)

// FETCH DATA
const fetchData = () => {
  api.get('fetchData')
    .then((response) => {
      name.value = response.data
    })
    .catch((err) => {
      console.error(err)
      router.replace('/')
    })
}
fetchData()
// END FETCH DATA

</script>
