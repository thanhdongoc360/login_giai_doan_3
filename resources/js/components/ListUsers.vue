<template>
  <div class="container mt-4">
    <h2>Danh sách người dùng</h2>
    <c-table :items="users" :fields="fields" bordered striped />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const users = ref([])
const fields = [
  { key: 'id', label: 'ID' },
  { key: 'name', label: 'Tên' },
  { key: 'email', label: 'Email' },
]

onMounted(async () => {
  try {
    const res = await axios.get('http://127.0.0.1:8000/api/users')
    users.value = res.data
  } catch (e) {
    console.error('Lỗi lấy danh sách:', e)
  }
})
</script>
