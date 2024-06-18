<script setup>
import { reactive, inject } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import { Modal } from 'bootstrap'

const users = inject('users')
const isLoggedIn = inject('isLoggedIn')
const loggedInUser = inject('loggedInUser')

const loginData = reactive({
  username: '',
  password: ''
})

const login = async () => {
  const response = await fetch('http://localhost:3000/users')
  const allUsers = await response.json()
  const user = allUsers.find(
    (user) => user.username === loginData.username && user.password === loginData.password
  )
  if (user) {
    alert('Login successful!')
    isLoggedIn.value = true
    loggedInUser.value = user
    users.value = allUsers
    var myModalEl = document.getElementById('loginModal')
    var modal = Modal.getInstance(myModalEl) || new Modal(myModalEl)
    modal.hide()
    myModalEl.classList.remove('show')
    myModalEl.style.display = 'none'
    document.body.classList.remove('modal-open')
    document.body.style.overflow = ''
    document.body.style.paddingRight = ''
    var modalBackdrops = document.getElementsByClassName('modal-backdrop')
    while (modalBackdrops[0]) {
      modalBackdrops[0].parentNode.removeChild(modalBackdrops[0])
    }
  } else {
    alert('Invalid username or password')
  }
}
</script>

<template>
  <div
    class="modal fade"
    id="loginModal"
    tabindex="-1"
    aria-labelledby="loginModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="login">
            <div class="mb-3">
              <label for="loginUsername" class="form-label">Username</label>
              <input
                type="text"
                class="form-control"
                id="loginUsername"
                v-model="loginData.username"
                placeholder="Enter username"
                required
              />
            </div>
            <div class="mb-3">
              <label for="loginPassword" class="form-label">Password</label>
              <input
                type="password"
                class="form-control"
                id="loginPassword"
                v-model="loginData.password"
                placeholder="Password"
                required
              />
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
