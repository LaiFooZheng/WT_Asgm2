<script setup>
import { inject } from 'vue'

const isLoggedIn = inject('isLoggedIn')
</script>

<template>
  <div class="content">
    <h1>SECJ3483 <br /><span>Web Technology</span> <br />Course</h1>
    <p class="par">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt neque expedita atque eveniet
      <br />
      quis nesciunt. Quos nulla vero consequuntur, fugit nemo ad delectus <br />
      a quae totam ipsa illum minus laudantium?
    </p>
    <button class="cn" data-bs-toggle="modal" data-bs-target="#loginModal">LOGIN</button>
    <button class="cn" data-bs-toggle="modal" data-bs-target="#registerModal">REGISTER</button>
  </div>
</template>

<style scoped>
.content {
  width: 1200px;
  height: auto;
  margin: auto;
  color: #fff;
  position: relative;
}

.content h1 {
  font-family: 'Times New Roman';
  font-size: 55px;
  padding-left: 20px;
  margin-top: 9%;
  letter-spacing: 2px;
}

.content span {
  color: #ff7200;
  font-size: 65px;
}

.content .par {
  padding-left: 20px;
  padding-bottom: 25px;
  font-family: Arial;
  letter-spacing: 1.2px;
  line-height: 30px;
}

.content .cn {
  width: 200px;
  height: 40px;
  background: #ff7200;
  border: none;
  margin-bottom: 10px;
  margin-left: 20px;
  font-size: 18px;
  border-radius: 10px;
  cursor: pointer;
  transition: 0.4s ease;
}

.content .cn a {
  text-decoration: none;
  color: #000;
  transition: 0.3s ease;
}

.cn:hover {
  background-color: #fff;
  transform: scale(0.9) translateX(15px) translateY(15px);
}
</style>
