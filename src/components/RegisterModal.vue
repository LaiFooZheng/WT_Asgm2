<!-- JSON Server -->
<!-- <script setup>
import { reactive } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import { Modal } from 'bootstrap'

const registerData = reactive({
  name: '',
  username: '',
  password: '',
  email: '',
  course: '',
  role: 'user'
})

const register = async () => {
  const newUser = {
    name: registerData.name,
    username: registerData.username,
    password: registerData.password,
    email: registerData.email,
    course: registerData.course,
    role: registerData.role
  }
  const response = await fetch('http://localhost:3000/users', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(newUser)
  })

  if (response.ok) {
    alert('Registration successful!')
    var myModalEl = document.getElementById('registerModal')
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
    alert('Registration failed!')
  }
}
</script> -->

<!-- PHP -->
<!-- <script setup>
import { reactive } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import { Modal } from 'bootstrap'

const registerData = reactive({
  name: '',
  username: '',
  password: '',
  email: '',
  course: '',
  role: 'user'
})

const register = async () => {
  const newUser = {
    name: registerData.name,
    username: registerData.username,
    password: registerData.password,
    email: registerData.email,
    course: registerData.course,
    role: registerData.role
  }

  console.log('Registering user:', newUser)

  try {
    const response = await fetch('http://localhost/WT_Asgm2/public/php/index.php/users', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(newUser)
    })

    const data = await response.json()

    if (response.ok) {
      console.log('Registration successful!', data)
      alert('Registration successful!')
      var myModalEl = document.getElementById('registerModal')
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
      console.error('Registration failed:', data)
      alert('Registration failed!')
    }
  } catch (error) {
    console.error('Error during registration:', error)
    alert('An error occurred during registration!')
  }
}
</script> -->

<!-- RESTful PHP -->
<!-- <script setup>
import { reactive } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import { Modal } from 'bootstrap'

const registerData = reactive({
  name: '',
  username: '',
  password: '',
  email: '',
  course: '',
  role: 'user'
})

const register = async () => {
  const newUser = {
    name: registerData.name,
    username: registerData.username,
    password: registerData.password,
    email: registerData.email,
    course: registerData.course,
    role: registerData.role
  }

  console.log('Registering user:', newUser)

  try {
    const response = await fetch('http://localhost/WT_Asgm2/public/php_restful/api/users', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(newUser)
    })

    const data = await response.json()

    if (response.ok) {
      console.log('Registration successful!', data)
      alert('Registration successful!')
      var myModalEl = document.getElementById('registerModal')
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
      console.error('Registration failed:', data)
      alert('Registration failed!')
    }
  } catch (error) {
    console.error('Error during registration:', error)
    alert('An error occurred during registration!')
  }
}
</script> -->

<!-- PHP Slim -->
<script setup>
import { reactive } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import { Modal } from 'bootstrap'

const registerData = reactive({
  name: '',
  username: '',
  password: '',
  email: '',
  course: '',
  role: 'user'
})

const register = async () => {
  const newUser = {
    name: registerData.name,
    username: registerData.username,
    password: registerData.password,
    email: registerData.email,
    course: registerData.course,
    role: registerData.role
  }

  try {
    const response = await fetch('http://localhost:8000/api/register', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(newUser)
    })

    const data = await response.json()

    if (response.ok) {
      alert('Registration successful!')
      var myModalEl = document.getElementById('registerModal')
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
      alert('Registration failed!')
    }
  } catch (error) {
    console.error('Error during registration:', error)
    alert('An error occurred during registration!')
  }
}
</script>

<template>
  <div
    class="modal fade"
    id="registerModal"
    tabindex="-1"
    aria-labelledby="registerModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLabel">Register</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="register">
            <div class="mb-3">
              <label for="registerName" class="form-label">Name</label>
              <input
                type="text"
                class="form-control"
                id="registerName"
                v-model="registerData.name"
                placeholder="Enter name"
                required
              />
            </div>
            <div class="mb-3">
              <label for="registerUsername" class="form-label">Username</label>
              <input
                type="text"
                class="form-control"
                id="registerUsername"
                v-model="registerData.username"
                placeholder="Enter username"
                required
              />
            </div>
            <div class="mb-3">
              <label for="registerPassword" class="form-label">Password</label>
              <input
                type="password"
                class="form-control"
                id="registerPassword"
                v-model="registerData.password"
                placeholder="Password"
                required
              />
            </div>
            <div class="mb-3">
              <label for="registerEmail" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="registerEmail"
                v-model="registerData.email"
                placeholder="Enter email"
                required
              />
            </div>
            <div class="mb-3">
              <label for="registerCourse" class="form-label">Course</label>
              <input
                type="text"
                class="form-control"
                id="registerCourse"
                v-model="registerData.course"
                placeholder="Enter course"
                required
              />
            </div>
            <div class="mb-3">
              <label for="registerRole" class="form-label">Role</label>
              <input
                type="text"
                class="form-control"
                id="registerRole"
                v-model="registerData.role"
                required
                readonly
              />
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.modal-body input {
  margin-bottom: 10px;
}
</style>
