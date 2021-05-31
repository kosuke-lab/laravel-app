<template>
 <div>
<div id="overlay">
       <div id="content">
           <div>
          <div>
               <p>カテゴリーを選択してください</p>
           </div>
             <div>
                 <li v-for="category_data in category_datas" v-bind:key="category_data.id">{{category_data}}</li>
                 </div>
             <ul>
            
            </ul>
               <button type="button" v-on:click="$emit('close')" class="btn btn-success">閉じる <i class="fas fa-times"></i></button>
           </div>
       </div>
   </div>

 </div>
    
    </template>

<script>
    export default {
        props: {
            category_datas: {
                type: Object
            },
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
