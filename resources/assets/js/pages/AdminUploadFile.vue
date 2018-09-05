<template>
    <div class="upload-file">
        <div class="">
           
      <img class="image" src="../../images/pic1.jpg">
      <img class="image" src="../../images/background.jpg">
        </div>
        <!-- <img class="phoceis-logo" src="../../images/phoceislogo.png">
            <form action="http://gt.phoceis.cc/admin/putfile" method="post" enctype="multipart/form-data" novalidate="true">
                <p><input type="hidden" name="_token" :value="csrf"></p>
                <p><input class="file" type="file" name="uploadfile"></p>    
                <p><input class="btn btn-outline-secondary" type="submit" value="Submit" > </p>
               
        </form> -->
    </div>
</template>
<script>
import Router from '../router/router'
import Vue from 'vue'
// import VueCsrf from 'vue-csrf'
// Vue.use(VueCsrf)
export default {
    name:'Test',
    data:function(){
        return{
            //  csrf:Vue.csrfToken,
        }
    },
    mounted(){
        console.log();
    }
}
</script>


<style scoped>
    .upload-file{
        text-align:center;
         /* background-image: url('../../images/back.jpg') */
    } 
    .file{
        height: 35px;
        border: 1px solid #6c757d;
        border-radius: 0.25rem;
        overflow:hidden;
        margin-top: 20px;
    }
    .phoceis-logo{
        margin-top: 20px;
        height: 100px;
    }
    .image{
        height: 500px;
        width: 100%;
    }
</style>

