<template>
  <nav class="navbar navbar-expand-lg navbar-light p-4">
    <div class="container-fluid">
      <router-link class="navbar-brand logo" to="/">W.Tech.</router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 menu">
          <li class="nav-item">
            <router-link class="nav-link" to="/">HOME</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/about">ABOUT</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/materials">COURSE MATERIALS</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/assessments">ASSESSMENT</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/contact">CONTACT US</router-link>
          </li>
        </ul>
        <form class="d-flex search">
          <input
            class="form-control me-2 srch"
            type="search"
            placeholder="Type To Find"
            aria-label="Search"
          />
          <button class="btn btn-outline-success" type="submit">Find</button>
        </form>
      </div>
    </div>
  </nav>
</template>

<style scoped>
.navbar {
  background-color: transparent;
}

.logo {
  color: #fc8d1e;
  font-size: 20px;
  font-family: Cambria;
  padding-left: 10px;
}

.menu .nav-link {
  font-family: Arial;
  font-weight: bold;
  transition: 0.4s ease-in-out;
  color: #fff; /* Change to white for better contrast */
}

.menu .nav-link:hover {
  color: #ff7200;
}

.search {
  width: auto;
  margin-left: 20px;
}

.srch {
  font-family: 'Times New Roman';
  width: 150px;
  height: 30px;
  background: transparent;
  border: 1px solid #ff7200;
  color: #fff; /* Change to white for better contrast */
  border-right: none;
  font-size: 16px;
  padding: 10px;
  border-bottom-left-radius: 5px;
  border-top-left-radius: 5px;
}

.btn-outline-success {
  width: 80px;
  height: 30px;
  background: #ff7200;
  border: 2px solid #ff7200;
  color: #fff;
  font-size: 15px;
  border-bottom-right-radius: 5px;
  border-top-right-radius: 5px;
  transition: 0.2s ease;
  cursor: pointer;
}

.btn-outline-success:hover {
  background-color: #fff;
  color: #ff7200;
}

.btn-outline-success:focus {
  outline: none;
}

.srch:focus {
  outline: none;
}
</style>
