<template>
  <div style="max-width: 400px; margin: auto;">
    <h2>Đăng nhập</h2>
    
  <CForm>
    <CFormInput label="Email" v-model="email" type="email" />
    <CFormInput label="Password" v-model="password" type="password" />
    <CButton color="primary" @click="login">Đăng nhập</CButton>
  </CForm>

  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const email = ref('')
const password = ref('')
const error = ref('')
const success = ref('')

const login = async () => {
  error.value = ''
  success.value = ''
  try {
    const res = await axios.post('http://127.0.0.1:8000/api/login', {
      email: email.value,
      password: password.value
    })
    success.value = res.data.message
  } catch (e) {
    error.value = e.response?.data?.message || 'Đăng nhập thất bại'
  }
}
</script>
