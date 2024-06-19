<template>
  <div class="user-list">
    <h2>User List</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Course</th>
          <th scope="col">Role</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.course }}</td>
          <td>{{ user.role }}</td>
          <td>
            <button class="btn btn-primary btn-sm" @click="editUser(user)">Edit</button>
            <button class="btn btn-danger btn-sm" @click="deleteUser(user.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Edit User Modal -->
  <div
    class="modal fade"
    id="editUserModal"
    tabindex="-1"
    aria-labelledby="editUserModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="updateUser">
            <div class="mb-3">
              <label for="editName" class="form-label">Name</label>
              <input
                type="text"
                class="form-control"
                id="editName"
                v-model="editData.name"
                required
              />
            </div>
            <div class="mb-3">
              <label for="editEmail" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="editEmail"
                v-model="editData.email"
                required
              />
            </div>
            <div class="mb-3">
              <label for="editCourse" class="form-label">Course</label>
              <input
                type="text"
                class="form-control"
                id="editCourse"
                v-model="editData.course"
                required
              />
            </div>
            <div class="mb-3">
              <label for="editRole" class="form-label">Role</label>
              <input
                type="text"
                class="form-control"
                id="editRole"
                v-model="editData.role"
                required
              />
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import { Modal } from 'bootstrap'

const users = ref([])
const editData = ref({ id: null, name: '', email: '', course: '', role: '' })

const fetchUsers = async () => {
  const response = await fetch('http://localhost:3000/users')
  if (response.ok) {
    users.value = await response.json()
  } else {
    console.error('Failed to fetch users', response.statusText)
    alert('Failed to fetch users')
  }
}

const editUser = (user) => {
  editData.value = { ...user }
  const myModalEl = document.getElementById('editUserModal')
  const modal = Modal.getInstance(myModalEl) || new Modal(myModalEl)
  modal.show()
}

const updateUser = async () => {
  console.log('Updating user:', editData.value)
  const response = await fetch(`http://localhost:3000/users/${editData.value.id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(editData.value)
  })
  if (response.ok) {
    const updatedUser = await response.json()
    const index = users.value.findIndex((user) => user.id === updatedUser.id)
    users.value[index] = updatedUser
    const myModalEl = document.getElementById('editUserModal')
    const modal = Modal.getInstance(myModalEl)
    modal.hide()
  } else {
    console.error('Failed to update user', response.statusText)
    alert('Failed to update user')
  }
}

const deleteUser = async (id) => {
  console.log('Deleting user with id:', id)
  const response = await fetch(`http://localhost:3000/users/${id}`, {
    method: 'DELETE'
  })
  if (response.ok) {
    users.value = users.value.filter((user) => user.id !== id)
  } else {
    console.error('Failed to delete user', response.statusText)
    alert('Failed to delete user')
  }
}

onMounted(() => {
  fetchUsers()
})
</script>

<style scoped>
.user-list {
  width: 1200px;
  margin: auto;
  color: #000;
}

.table {
  margin-top: 20px;
}
</style>
