<template>
    <div class="page">
        <div class="left"  @click="click">hello I am coming </div> 
        <div class="right"  @click="click">me!</div>
        <kiko-confirm :visible="true"></kiko-confirm>
       <!-- <div class="loading"><kiko-loading></kiko-loading></div> -->
        </div>
</template>

<script>
    import Kiko from "kiko-rascalhao"
    import Vue  from "vue"
    Vue.use(Kiko)
    export default {
        name:"",
        data(){
            return {

            }
        },
        methods:{
            // click(){
            //     //  var event = new Event('click', {"bubbles":true, "cancelable":false})
            //     //   event.target = "div"
            //     // this.$kiko_message("this is a message")
            //     this.$kiko_tooltip(this.$refs.showTip)
            // }
            click: function(event){
                // this.$kiko_tooltip(event) 
                var options = {'color':"blue","direction":"right"}
                // var rect = {};
                // ['top', 'left'].forEach(function(property) {
                // var scroll = property === 'top' ? 'scrollTop' : 'scrollLeft'
                // rect[property] = event.target.getBoundingClientRect()[property] +
                //     document.body[scroll] +
                //     document.documentElement[scroll]
                // });
                // ['height', 'width'].forEach(function(property) {
                // rect[property] = event.target.getBoundingClientRect()[property]
                // });
                // options.rect = rect
                this.$kiko_tooltip(event,options) 
                // alert('sdf')
                // alert(event.target.getBoundingClientRect()['bottom'])
                // alert(options.right)
                // Vue.component(KikoConfirm.name, KikoConfirm)
            }
        }
    }
</script>

<style lang="scss" scoped>

    @import "../../sass/variables";
    .page{
        display: flex;
        width: 100vw;
    }
    .left{
        height: 20vh;
        width: 20vw;
        animation: myfirst 5s;
        background: blue;
        transform: translate(0, -50%);

-webkit-animation: myfirst 5s; /* Safari 与 Chrome */
    }
    .loading{
        height: 20vh;
        width: 20vw;
    }
    @keyframes myfirst
    {
        from {background: red;}
        to {background: yellow;}
    }

</style>
