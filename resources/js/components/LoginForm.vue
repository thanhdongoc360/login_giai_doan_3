<template>
  <div style="max-width: 400px; margin: auto;">
    <h2>Đăng nhập</h2>

    <!-- Thông báo lỗi -->
    <p v-if="error" style="color: red">{{ error }}</p>

    <!-- Thông báo thành công -->
    <p v-if="success" style="color: green">{{ success }}</p>

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
    success.value = res.data.message || 'Đăng nhập thành công'
  } catch (e) {
    // Gán thông báo lỗi đơn giản
    error.value = 'Tài khoản hoặc mật khẩu không chính xác'
  }
}
</script>
