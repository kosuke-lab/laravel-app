<template>
    <div>
        <div id="overlay">
            <div id="content">
                <div>
                    <div>
                        <p>カテゴリーを選択してください</p>
                    </div>
                    <div class="container">
                        <div class="radio-tile-group">
                        <div v-for="(category_data, index) in categories" v-bind:key="index" class="radio-tile">
                                    <div class="input-container-modal">
                                           <input type ="radio" :id="'category_' + category_data.id" name = "category_id" :value="category_data.id" class="radio-button">
                                        <div class="radio-tile-modal">
                                  <div class="icon">
                                      <img :src="category_data.image"  :alt="category_data.name"> 
                                  </div>
                                <label :for="'category_' + category_data.id" class="radio-tile-label">{{ category_data.name }}</label>
                                   </div>
                                   </div>
                        </div>
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
</template>


<script>
    export default {
    data() {
        return {
            categories: [
                { name: "グルメ", image: "images/gurume.png", id: 1 },
                { name: "観光", image: "images/sightseeing.png", id: 2 },
            ]
    };
  }
    }
</script>
