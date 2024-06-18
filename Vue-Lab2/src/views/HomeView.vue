<template>
  <main>
    <MainContent v-if="!isLoggedIn" />
    <UserList v-else />
  </main>
</template>

<script setup>
import { inject } from 'vue'
import MainContent from '../components/MainContent.vue'
import UserList from '../components/UserList.vue'

const isLoggedIn = inject('isLoggedIn')
</script>

<style scoped>
/* Add any necessary styles here */
</style>
