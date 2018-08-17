<template>
    <div id="app" class="">
     
       <div class="page">
            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<script>
export default {
       name:'app',
        data:function() {
         return{
            title:'hello'
         }   
        },
        computed:{
         
        }
    }
</script>

<style>
   html{
    width: 100%;
    height: 100%;
   
  
   }
   body{
    width: 100%;
    height: 100%;      
   }

   .container {
       
       padding: 0;
       margin: 0;
       width: 100%;
       height: 100%;
   }

   #app {
       
       top: 0;
       right: 0;
       bottom: 0;
       left: 0;
       width: 100%;
       height: 100%;
   }

   .page {
       width: 100%;
       height: 100%;
       padding: 0;
       margin: 0;
       
       
   }
</style>
