<template>
  <q-dialog :model-value="props.dialogStatus" @hide="emits('onClose')">
    <q-card style="width: 80%;">
      <q-form @submit="btnAdd">
        <q-card-section class="text-center">
        <h4>Add Your List</h4>
        </q-card-section>
        <q-card-section class="q-gutter-y-md q-pt-none">
          <q-input dense v-model="title" outlined  placeholder="Title"  class=""  style="width: 100%;"></q-input>
          <q-input dense v-model="description" outlined autogrow placeholder="Description"  class=""  style="width: 100%;"></q-input>
          <q-file
          v-model="file"
          outlined
          label="Attach File">
            <template v-slot:prepend>
            <q-icon name="attach_file"/>
            </template>
          </q-file>
        </q-card-section>

        <q-card-actions align="right">
          <q-btn flat label="Cancel" @click.prevent="emits('onClose')" />
          <q-btn flat label="Add" type="submit"/>
        </q-card-actions>

      </q-form>
    </q-card>
  </q-dialog>
</template>
<script setup>
import { api } from 'src/boot/axios'
import { ref } from 'vue'
const title = ref('')
const description = ref('')
const file = ref(null)

const emits = defineEmits([
  'onClose'
])

const props = defineProps({
  dialogStatus: Boolean
})

const btnAdd = () => {
  api.post('addData', {
    title: title.value,
    description: description.value,
    attachment: file.value
  }).then(emits('onClose')).catch((err) => {
    console.log(err)
  })
}

</script>
