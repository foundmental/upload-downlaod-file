<template>
    <div class="home">
      <img class="phoceis-logo" src="../../images/phoceislogo.png">
      <div class="user-info-error">
        <p v-if="errors.length">
            <b>Please correct the following error(s):</b>
            <ul><li v-for="(error,index) in errors" :key="index">{{ error }}</li></ul>
        </p>
      </div>
      <div class="user-info">
            <label for="name">Name</label>
            <input id="name" v-model="name" type="text" name="name">
      </div>
      <div class="user-info">
            <label for="email">Email</label>
            <input id="email" v-model="email" type="email" name="email" >
      </div>
      <div class="user-info"><button class="btn btn-primary" type="submit" @click="sendUserInfo" value="Submit" >Submit</button></div>
      <div> this is a message{{isShow}}</div>
      <div v-if="is_weixin"> this is a message</div>
    </div>
</template>
<script>
 import Router from '../router/router'
 import Vue from 'vue'
 import API from '../util/api'
 import VueCsrf from 'vue-csrf'
 Vue.use(VueCsrf)
 import VueResource from 'vue-resource'
 Vue.use(VueResource) 
 export default {
    name: 'home',
    data: function () {
       return {
            errors: [],
            name: null,
            email: null,
            movie: null,
            csrf:Vue.csrfToken,
            isShow:null,
            time:1000,
       }
  },
  created: function () {
    setInterval(this.timer, 500);
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
    },

    is_weixin : function (){
        var ua = navigator.userAgent.toLowerCase();
        if(ua.match(/MicroMessenger/i)=="micromessenger") {
            return true
        } else {
            return false
        }
     },

   sendUserInfo: function(e) {
      this.checkForm(e)
    API.sendUserInfo(this.name,this.email)
   },
  
    close: function(){
       window.setTimeout(function(){
         this.isShow=false;
       },this.time);
    },

    timer: function () {
        console.log("time");
    }
  },
  
   mounted(){
      this.close(); 
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
    .user-info{
      margin-top: 10px
    }
    .user-info-error{
      height: 70px;
    }
</style>
