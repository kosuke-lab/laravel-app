<template>
    <div>
        <div id="overlay">
            <div id="content">
                <div>
                    <div>
                        <p>カテゴリーを選択してください</p>
                    </div>
                    <div class="container">
                        <div class="row">
                        <div v-for="(category_data, index) in category_datas" v-bind:key="index" class="col-lg-6">
                            <input type ="radio" name = "category_id" :value="index">{{ category_data }}
                        </div>
                        </div>
                    </div>
                    <div class="text-right">
                <button type="button" v-on:click="$emit('close')" class="btn btn-success">閉じる <i class="fas fa-times"></i></button>
                <button type="submit" class="btn btn-primary">検索</button>
                </div>
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
