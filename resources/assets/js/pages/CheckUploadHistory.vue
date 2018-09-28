<template>
    <div>
        <div @click="popup">sdfasdf</div>
        sdfadf
        dsdfsadfdsf
        <!-- {{app.params}}sdfsd -->
    </div>
</template>

<script>
export default {
    name:"check-upload-history",
    data(){
        return {
            // uploadHistory:app.params.uploadHistory,
        }
    },
    methods:{
        popup:function(){
            alert(1111)
        }

    },
    mounted(){
    }
    
}
</script>

