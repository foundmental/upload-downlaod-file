<template>
    <div class="home">
      <img class="phoceis-logo" src="../../images/phoceislogo.png">

      <form id="get-file" @submit="checkForm" action="http://gt.phoceis.cc/getfile" method="post" novalidate="true">
            <input type="hidden" name="_token" :value="csrf"> 
          <p v-if="errors.length">
            <b>Please correct the following error(s):</b>
            <ul>
              <li v-for="(error,index) in errors" :key="index">{{ error }}</li>
            </ul>
          </p>

          <p>
            <label for="name">Name</label>
            <input id="name" v-model="name" type="text" name="name">
        </p>

          <p>
            <label for="email">Email</label>
            <input id="email" v-model="email" type="email" name="email" >
          </p>

          <p><input type="submit" value="Submit" > </p>

    </form>
    </div>
</template>
<script>
import Router from '../router/router'
import Vue from 'vue'
import VueCsrf from 'vue-csrf'
Vue.use(VueCsrf)

// import VueResource from 'vue-resource'
// Vue.use(VueResource) 
export default {
    name: 'home',
    data: function () {
       return {
            errors: [],
            name: null,
            email: null,
            movie: null,
            csrf:Vue.csrfToken,
       }
  },
  methods:{
    checkForm: function (e) {
      this.errors = [];

      if (!this.name) {
        this.errors.push("Name required.");
      }
      if (!this.email) {
        this.errors.push('Email required.');
      } else if (!this.validEmail(this.email)) {
        this.errors.push('Valid email required.');
      }

      if (!this.errors.length) {
        return true;
      }

      e.preventDefault();
    },
    validEmail: function (email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
  
  }

}
</script>

<style scoped>
    .home{
      text-align: center;
    }
    .phoceis-logo{
      margin-top: 20px;
      height: 100px;
    }
    #get-file{
      margin-top: 50px;
    }

</style>
