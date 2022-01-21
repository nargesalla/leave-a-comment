<template>
    <div>
        <h3 class="text-center">Leave a Comment</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addComment">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="comment.user_name">
                    </div>
                    <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" v-model="comment.text">
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            comment: {}
        }
    },
    methods: {
        addComment() {
            this.axios
                .post('http://localhost:8000/api/post/{postId}/leave-comment', this.comment)
                .then(response => (
                    this.$router.push({ name: 'home' })
                ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>

<script>
export default {
    name: "LeaveAComment"
}
</script>

<style scoped>

</style>
