<template>
  <div class="main">
    <Navbar />
    <router-view />
    <LoginModal />
    <RegisterModal />
  </div>
</template>

<script setup>
import { provide, ref } from 'vue'
import Navbar from './components/Navbar.vue'
import LoginModal from './components/LoginModal.vue'
import RegisterModal from './components/RegisterModal.vue'

const users = ref([])
const isLoggedIn = ref(false)

provide('users', users)
provide('isLoggedIn', isLoggedIn)
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.main {
  width: 100%;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.5) 50%),
    url('/src/assets/3.jpg');
  background-position: center;
  background-size: cover;
  height: 100vh;
}
</style>
