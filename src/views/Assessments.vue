<template>
  <div class="assessment-list">
    <h2>Assessments</h2>
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
        <tr v-for="assessment in assessments" :key="assessment.id">
          <td>{{ assessment.id }}</td>
          <td>{{ assessment.title }}</td>
          <td>{{ assessment.description }}</td>
          <td>{{ assessment.course }}</td>
          <td>
            <button class="btn btn-primary btn-sm" @click="editAssessment(assessment)">Edit</button>
            <button class="btn btn-danger btn-sm" @click="deleteAssessment(assessment.id)">
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Edit Assessment Modal -->
  <div
    class="modal fade"
    id="editAssessmentModal"
    tabindex="-1"
    aria-labelledby="editAssessmentModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editAssessmentModalLabel">Edit Assessment</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="updateAssessment">
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

const assessments = ref([])
const editData = ref({ id: null, title: '', description: '', course: '' })

const fetchAssessments = async () => {
  const response = await fetch('http://localhost:3000/assessments')
  if (response.ok) {
    assessments.value = await response.json()
  } else {
    console.error('Failed to fetch assessments', response.statusText)
    alert('Failed to fetch assessments')
  }
}

const editAssessment = (assessment) => {
  editData.value = { ...assessment }
  const myModalEl = document.getElementById('editAssessmentModal')
  const modal = Modal.getInstance(myModalEl) || new Modal(myModalEl)
  modal.show()
}

const updateAssessment = async () => {
  const response = await fetch(`http://localhost:3000/assessments/${editData.value.id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(editData.value)
  })
  if (response.ok) {
    const updatedAssessment = await response.json()
    const index = assessments.value.findIndex(
      (assessment) => assessment.id === updatedAssessment.id
    )
    assessments.value[index] = updatedAssessment
    const myModalEl = document.getElementById('editAssessmentModal')
    const modal = Modal.getInstance(myModalEl)
    modal.hide()
  } else {
    console.error('Failed to update assessment', response.statusText)
    alert('Failed to update assessment')
  }
}

const deleteAssessment = async (id) => {
  const response = await fetch(`http://localhost:3000/assessments/${id}`, {
    method: 'DELETE'
  })
  if (response.ok) {
    assessments.value = assessments.value.filter((assessment) => assessment.id !== id)
  } else {
    console.error('Failed to delete assessment', response.statusText)
    alert('Failed to delete assessment')
  }
}

onMounted(() => {
  fetchAssessments()
})
</script> -->

<!-- PHP -->
<!-- <script setup>
import { ref, onMounted } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import { Modal } from 'bootstrap'

const assessments = ref([])
const editData = ref({ id: null, title: '', description: '', course: '' })

const fetchAssessments = async () => {
  const response = await fetch('http://localhost/WT_Asgm2/public/php/index.php/assessments')
  if (response.ok) {
    assessments.value = await response.json()
  } else {
    console.error('Failed to fetch assessments', response.statusText)
    alert('Failed to fetch assessments')
  }
}

const editAssessment = (assessment) => {
  editData.value = { ...assessment }
  const myModalEl = document.getElementById('editAssessmentModal')
  const modal = Modal.getInstance(myModalEl) || new Modal(myModalEl)
  modal.show()
}

const updateAssessment = async () => {
  const response = await fetch(
    `http://localhost/WT_Asgm2/public/php/index.php/assessments/${editData.value.id}`,
    {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(editData.value)
    }
  )
  if (response.ok) {
    const updatedAssessment = await response.json()
    const index = assessments.value.findIndex(
      (assessment) => assessment.id === updatedAssessment.id
    )
    assessments.value[index] = updatedAssessment
    const myModalEl = document.getElementById('editAssessmentModal')
    const modal = Modal.getInstance(myModalEl)
    modal.hide()
  } else {
    console.error('Failed to update assessment', response.statusText)
    alert('Failed to update assessment')
  }
}

const deleteAssessment = async (id) => {
  const response = await fetch(`http://localhost/WT_Asgm2/public/php/index.php/assessments/${id}`, {
    method: 'DELETE'
  })
  if (response.ok) {
    assessments.value = assessments.value.filter((assessment) => assessment.id !== id)
  } else {
    console.error('Failed to delete assessment', response.statusText)
    alert('Failed to delete assessment')
  }
}

onMounted(() => {
  fetchAssessments()
})
</script> -->

<!-- Restful PHP -->
<!-- <script setup>
import { ref, onMounted } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import { Modal } from 'bootstrap'

const assessments = ref([])
const editData = ref({ id: null, title: '', description: '', course: '' })

const fetchAssessments = async () => {
  const response = await fetch('http://localhost/WT_Asgm2/public/php_restful/api/assessments')
  if (response.ok) {
    assessments.value = await response.json()
  } else {
    console.error('Failed to fetch assessments', response.statusText)
    alert('Failed to fetch assessments')
  }
}

const editAssessment = (assessment) => {
  editData.value = { ...assessment }
  const myModalEl = document.getElementById('editAssessmentModal')
  const modal = Modal.getInstance(myModalEl) || new Modal(myModalEl)
  modal.show()
}

const updateAssessment = async () => {
  const response = await fetch(
    `http://localhost/WT_Asgm2/public/php_restful/api/assessments/${editData.value.id}`,
    {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(editData.value)
    }
  )
  if (response.ok) {
    const updatedAssessment = await response.json()
    const index = assessments.value.findIndex(
      (assessment) => assessment.id === updatedAssessment.id
    )
    assessments.value[index] = updatedAssessment
    const myModalEl = document.getElementById('editAssessmentModal')
    const modal = Modal.getInstance(myModalEl)
    modal.hide()
  } else {
    console.error('Failed to update assessment', response.statusText)
    alert('Failed to update assessment')
  }
}

const deleteAssessment = async (id) => {
  const response = await fetch(
    `http://localhost/WT_Asgm2/public/php_restful/api/assessments/${id}`,
    {
      method: 'DELETE'
    }
  )
  if (response.ok) {
    assessments.value = assessments.value.filter((assessment) => assessment.id !== id)
  } else {
    console.error('Failed to delete assessment', response.statusText)
    alert('Failed to delete assessment')
  }
}

onMounted(() => {
  fetchAssessments()
})
</script> -->

<!-- PHP Slim -->
<script setup>
import { ref, onMounted } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import { Modal } from 'bootstrap'

const assessments = ref([])
const editData = ref({ id: null, title: '', description: '', course: '' })

const fetchAssessments = async () => {
  const response = await fetch('http://localhost:8000/api/assessments')
  if (response.ok) {
    assessments.value = await response.json()
  } else {
    console.error('Failed to fetch assessments', response.statusText)
    alert('Failed to fetch assessments')
  }
}

const editAssessment = (assessment) => {
  editData.value = { ...assessment }
  const myModalEl = document.getElementById('editAssessmentModal')
  const modal = Modal.getInstance(myModalEl) || new Modal(myModalEl)
  modal.show()
}

const updateAssessment = async () => {
  const response = await fetch(`http://localhost:8000/api/assessments/${editData.value.id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(editData.value)
  })
  if (response.ok) {
    const updatedAssessment = await response.json()
    const index = assessments.value.findIndex(
      (assessment) => assessment.id === updatedAssessment.id
    )
    assessments.value[index] = updatedAssessment
    const myModalEl = document.getElementById('editAssessmentModal')
    const modal = Modal.getInstance(myModalEl)
    modal.hide()
  } else {
    console.error('Failed to update assessment', response.statusText)
    alert('Failed to update assessment')
  }
}

const deleteAssessment = async (id) => {
  const response = await fetch(`http://localhost:8000/api/assessments/${id}`, {
    method: 'DELETE'
  })
  if (response.ok) {
    assessments.value = assessments.value.filter((assessment) => assessment.id !== id)
  } else {
    console.error('Failed to delete assessment', response.statusText)
    alert('Failed to delete assessment')
  }
}

onMounted(() => {
  fetchAssessments()
})
</script>

<style scoped>
.assessment-list {
  width: 1200px;
  margin: auto;
  color: #000;
}

.table {
  margin-top: 20px;
}
</style>
