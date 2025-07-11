<template>
  <div style="max-width: 400px; margin: auto;">
    <h2>Đăng nhập</h2>
    <form @submit.prevent="login">
      <div>
        <label>Email:</label>
        <input type="email" v-model="email" required />
      </div>
      <div>
        <label>Password:</label>
        <input type="password" v-model="password" required />
      </div>
      <button type="submit">Đăng nhập</button>

      <p v-if="error" style="color:red">{{ error }}</p>
      <p v-if="success" style="color:green">{{ success }}</p>
    </form>
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
