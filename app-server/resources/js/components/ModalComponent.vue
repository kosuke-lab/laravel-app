<template>



     
    
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
