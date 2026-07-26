<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { useRoute, useRouter } from 'vue-router'
import InputText from 'primevue/inputtext'
import InputNumber from 'primevue/inputnumber';
import Button from 'primevue/button';
import { useConfirm } from "primevue/useconfirm";
import ConfirmDialog from 'primevue/confirmdialog';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';
import { UmoEditor } from '@umoteam/editor';
import Tabs from 'primevue/tabs';
import TabList from 'primevue/tablist';
import Tab from 'primevue/tab';
import TabPanels from 'primevue/tabpanels';
import TabPanel from 'primevue/tabpanel';
import MultiSelect from 'primevue/multiselect'
import FloatLabel from 'primevue/floatlabel'

const route = useRoute()
const router = useRouter()
const confirm = useConfirm();
const toast = useToast();

const post = ref({
  title: {
    ru: '',
    en: ''
  },
  content: {
    ru: '',
    en: ''
  },
  slug: '',
  categories: [],
  category_id: 1
})

const selectedCategories = ref([])
const categories = ref([])
const preview = ref({
  id: null,
  url: ''
})
const isEdit = ref(Boolean(route.params.slug))
const editorRURef = ref(null);
const editorENRef = ref(null);

const editorRUOptions = ref({
  editorKey: 'editor-russian',
  page: {
    layouts: ['web'],
    defaultMargin: {
      left: 2,
      right: 2,
      top: 1,
      bottom: 2,
    },
  },
  toolbar: {
    defaultMode: 'classic',
  },
  locale: 'en-US',
  document: {
    title: '',
    content: post.value.content.ru,
    placeholder: {
      en_US: 'Введите текст',
    }
  },
  async onFileUpload(file) {
    if (!file) throw new Error('File not found')

    const formData = new FormData()
    formData.append("image", file)
    try {
      const { data } = await axios.post(`/manager/posts/${post.value.slug}/upload_content_image`, formData);
      return {
        id: data.id,
        url: data.url,
      }
    } catch (error) {

    }
  },
  onFileDelete(mediaId, url) {
    axios.delete(`/manager/posts/${mediaId}/destroy_content_image`);
  },
});

const editorENOptions = ref({
  editorKey: 'editor-english',
  page: {
    layouts: ['web'],
    defaultMargin: {
      left: 2,
      right: 2,
      top: 1,
      bottom: 2,
    },
  },
  toolbar: {
    defaultMode: 'classic',
  },
  locale: 'en-US',
  document: {
    title: '',
    content: post.value.content.en,
    placeholder: {
      en_US: 'Please enter the document content...',
    }
  },
  async onFileUpload(file) {
    if (!file) throw new Error('File not found')

    const formData = new FormData()
    formData.append("image", file)
    try {
      const { data } = await axios.post(`/manager/posts/${post.value.slug}/upload_content_image`, formData);
      return {
        id: data.id,
        url: data.url,
      }
    } catch (error) {

    }
  },
  onFileDelete(mediaId, url) {
    axios.delete(`/manager/posts/${mediaId}/destroy_content_image`);
  },
});

onMounted(() => {
  if (isEdit.value) {
    getPost()
  }
})

const getPost = async () => {
  try {
    const { data } = await axios.get(`/manager/posts/${route.params.slug}`);
    post.value = data.post
    preview.value.id = data.preview?.id
    preview.value.url = data.preview?.url
    editorRURef.value.setContent(post.value.content.ru);
    editorENRef.value.setContent(post.value.content.en);
    selectedCategories.value = post.value.categories.map(c => {
      return {
        name: c.title.ru,
        code: c.id
      }
    })
    data.categories.forEach(c => {
      categories.value.push({ name: c.title.ru, code: c.id })
    })
  } catch (error) {
    console.log(error)

  }
}

function save() {
  isEdit.value ? update() : create();
}

const create = async () => {
  try {
    const { data } = await axios.post('/manager/posts', post.value);
    post.value = data.post
    isEdit.value = true
    toast.add({ severity: 'success', summary: 'Сохранено', detail: '', life: 3000 });
    router.push({ name: 'post', params: { slug: post.value.slug } })
  } catch (error) {
    console.log(error)
  }
}

const update = async () => {
  try {
    const categoriesIds = selectedCategories.value.map(c => c.code)
    await axios.put(`/manager/posts/${post.value.slug}`, { post: post.value, categoriesIds });
    toast.add({ severity: 'success', summary: 'Сохранено', detail: '', life: 3000 });
  } catch (error) {
    toast.add({ severity: 'error', summary: 'Ошибка', detail: error, life: 3000 });
  }
}

const onEditorSaved = (locale) => {
  if (locale === 'ru') {
    post.value.content.ru = editorRURef.value.getHTML()
  } else {
    post.value.content.en = editorENRef.value.getHTML()
  }
}

const uploadPreview = async (event) => {
  const formData = new FormData()
  formData.append("preview", event.target.files[0])
  try {
    const { data: { id, url } } = await axios.post(`/manager/posts/${post.value.slug}/upload_preview`, formData);
    preview.value.id = id
    preview.value.url = url
  } catch (error) {

  }
}

const deletePreview = async () => {
  try {
    await axios.delete(`/manager/posts/${preview.value.id}/destroy_preview`);
    preview.value.id = null
    preview.value.url = ''
  } catch (error) {
    console.log(error)
  }
}
</script>
<template>
  <div class="w-full max-w-3xl mx-auto my-20">
    <div class="text-xl font-bold">Товар</div>
    <div class="p-6 mt-4 bg-gray-100 border border-gray-200 rounded-xl">
      <FloatLabel class="w-full " variant="on">
        <MultiSelect v-model="selectedCategories" :options="categories" :show-toggle-all="false" optionLabel="name"
          placeholder="Выберите категории" class="w-full mb-4" />
        <label for="on_label">Категории</label>
      </FloatLabel>
      <div v-if="isEdit" class="mb-4">
        <input type="file" @change="uploadPreview">
        <img :src="preview.url" alt="">
        <div @click="deletePreview" class="mt-2 cursor-pointer text-red-500">Удалить</div>
      </div>
      <Tabs value="0">
        <TabList>
          <Tab value="0">Русский</Tab>
          <Tab value="1">Английский</Tab>
        </TabList>
        <TabPanels>
          <TabPanel value="0">
            <div>Название (ru)</div>
            <InputText type="text" v-model="post.title.ru" size="small" class="w-full" />
            <div class="mt-6">
              <umo-editor ref="editorRURef" @changed="onEditorSaved('ru')" v-bind="editorRUOptions" />
            </div>
          </TabPanel>
          <TabPanel value="1">
            <div>Название (en)</div>
            <InputText type="text" v-model="post.title.en" size="small" class="w-full" />
            <div class="mt-6">
              <umo-editor ref="editorENRef" @changed="onEditorSaved('en')" v-bind="editorENOptions" />
            </div>
          </TabPanel>
        </TabPanels>
      </Tabs>
      <div class="mt-4 flex gap-2">
        <Button @click="save" label="Сохранить" size="small" />
        <Button asChild v-slot="slotProps" size="small" severity="secondary">
          <RouterLink :to="{ name: 'posts' }" :class="slotProps.class">Отмена</RouterLink>
        </Button>
      </div>

    </div>
    <Toast />
    <ConfirmDialog></ConfirmDialog>
  </div>
</template>

<style>
.umo-zoomable-container.umo-page-container {
  /* padding: 0; */
}

.umo-toolbar {
  /* display: none; */
}
</style>
