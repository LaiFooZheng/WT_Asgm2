<template>
  <div class="material-list">
    <h2>Course Materials</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Course</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="material in materials" :key="material.id">
          <td>{{ material.id }}</td>
          <td>{{ material.title }}</td>
          <td>{{ material.description }}</td>
          <td>{{ material.course }}</td>
          <td>
            <button class="btn btn-primary btn-sm" @click="editMaterial(material)">Edit</button>
            <button class="btn btn-danger btn-sm" @click="deleteMaterial(material.id)">
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Edit Material Modal -->
  <div
    class="modal fade"
    id="editMaterialModal"
    tabindex="-1"
    aria-labelledby="editMaterialModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editMaterialModalLabel">Edit Material</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="updateMaterial">
            <div class="mb-3">
              <label for="editTitle" class="form-label">Title</label>
              <input
                type="text"
                class="form-control"
                id="editTitle"
                v-model="editData.title"
                required
              />
            </div>
            <div class="mb-3">
              <label for="editDescription" class="form-label">Description</label>
              <input
                type="text"
                class="form-control"
                id="editDescription"
                v-model="editData.description"
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
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<!-- JSON Server -->
<!-- <script setup>
import { ref, onMounted } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import { Modal } from 'bootstrap'

const materials = ref([])
const editData = ref({ id: null, title: '', description: '', course: '' })

const fetchMaterials = async () => {
  const response = await fetch('http://localhost:3000/materials')
  if (response.ok) {
    materials.value = await response.json()
  } else {
    console.error('Failed to fetch materials', response.statusText)
    alert('Failed to fetch materials')
  }
}

const editMaterial = (material) => {
  editData.value = { ...material }
  const myModalEl = document.getElementById('editMaterialModal')
  const modal = Modal.getInstance(myModalEl) || new Modal(myModalEl)
  modal.show()
}

const updateMaterial = async () => {
  const response = await fetch(`http://localhost:3000/materials/${editData.value.id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(editData.value)
  })
  if (response.ok) {
    const updatedMaterial = await response.json()
    const index = materials.value.findIndex((material) => material.id === updatedMaterial.id)
    materials.value[index] = updatedMaterial
    const myModalEl = document.getElementById('editMaterialModal')
    const modal = Modal.getInstance(myModalEl)
    modal.hide()
  } else {
    console.error('Failed to update material', response.statusText)
    alert('Failed to update material')
  }
}

const deleteMaterial = async (id) => {
  const response = await fetch(`http://localhost:3000/materials/${id}`, {
    method: 'DELETE'
  })
  if (response.ok) {
    materials.value = materials.value.filter((material) => material.id !== id)
  } else {
    console.error('Failed to delete material', response.statusText)
    alert('Failed to delete material')
  }
}

onMounted(() => {
  fetchMaterials()
})
</script> -->

<!-- PHP -->
<script setup>
import { ref, onMounted } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import { Modal } from 'bootstrap'

const materials = ref([])
const editData = ref({ id: null, title: '', description: '', course: '' })

const fetchMaterials = async () => {
  const response = await fetch('http://localhost/WT_Asgm2/public/php/index.php/materials')
  if (response.ok) {
    materials.value = await response.json()
  } else {
    console.error('Failed to fetch materials', response.statusText)
    alert('Failed to fetch materials')
  }
}

const editMaterial = (material) => {
  editData.value = { ...material }
  const myModalEl = document.getElementById('editMaterialModal')
  const modal = Modal.getInstance(myModalEl) || new Modal(myModalEl)
  modal.show()
}

const updateMaterial = async () => {
  const response = await fetch(
    `http://localhost/WT_Asgm2/public/php/index.php/materials/${editData.value.id}`,
    {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(editData.value)
    }
  )
  if (response.ok) {
    const updatedMaterial = await response.json()
    const index = materials.value.findIndex((material) => material.id === updatedMaterial.id)
    materials.value[index] = updatedMaterial
    const myModalEl = document.getElementById('editMaterialModal')
    const modal = Modal.getInstance(myModalEl)
    modal.hide()
  } else {
    console.error('Failed to update material', response.statusText)
    alert('Failed to update material')
  }
}

const deleteMaterial = async (id) => {
  const response = await fetch(`http://localhost/WT_Asgm2/public/php/index.php/materials/${id}`, {
    method: 'DELETE'
  })
  if (response.ok) {
    materials.value = materials.value.filter((material) => material.id !== id)
  } else {
    console.error('Failed to delete material', response.statusText)
    alert('Failed to delete material')
  }
}

onMounted(() => {
  fetchMaterials()
})
</script>

<style scoped>
.material-list {
  width: 1200px;
  margin: auto;
  color: #000;
}

.table {
  margin-top: 20px;
}
</style>
