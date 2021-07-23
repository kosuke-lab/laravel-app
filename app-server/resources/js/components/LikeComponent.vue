<template>
   <div>
       <button v-if="!liked" type="button" class="btn btn-primary detail-btn like-after" @click="like(postId)">お気に入り登録 </button>
        <button v-else type="button" class="btn btn-primary detail-btn liked-after"  @click="unlike(postId)">お気に入り登録済み</button>
   </div>
</template>

<script>
        export default {
        props: ['postId', 'userId', 'defaultLiked'],
        data() {
            return {
                liked: false,
            };
        },
        created () {
            this.liked = this.defaultLiked
        },
        methods: {
            like(postId) {
                let url = `/api/posts/${postId}/like`
                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                  this.liked = true
                })
                .catch(error => {
                  alert(error)
                });
            },
            unlike(postId) {
                let url = `/api/posts/${postId}/unlike`
                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                  this.liked = false
                })
                .catch(error => {
                  alert(error)
                });
            }
        }
    }

</script>