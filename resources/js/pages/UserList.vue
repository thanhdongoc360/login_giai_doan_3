<template>
  <AdminLayout>
    <h4>Danh sách người dùng</h4>

    <CTable striped hover :items="users" :fields="fields" class="mt-4" />
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '../layouts/AdminLayout.vue'

const users = [
  { id: 1, name: 'Test User', email: 'test@example.com' },
  { id: 2, name: 'Nguyễn Văn A', email: 'a@gmail.com' },
]

const fields = [
  { key: 'id', label: 'ID' },
  { key: 'name', label: 'Tên' },
  { key: 'email', label: 'Email' },
]
</script>
