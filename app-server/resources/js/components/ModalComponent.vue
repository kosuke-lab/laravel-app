<template>
 <div>
<div id="overlay">
       <div id="content">
           <div>
          <div>
               <p>カテゴリーを選択してください</p>
           </div>
               <button type="button" v-on:click="$emit('close')" class="btn btn-success">閉じる <i class="fas fa-times"></i></button>
           </div>
       </div>
   </div>

 </div>
    
    </template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods :{
    clickEvent: function(){
      this.$emit('from-child')
     }
  },
  stopEvent: function(){
      event.stopPropagation()
    }
    }
</script>
