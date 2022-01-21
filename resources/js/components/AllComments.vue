<template>
    <div>
        <h2 class="text-center">Comments List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Text</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="comment in comments" :key="comment.id">
                <td>{{ comment.id }}</td>
                <td>{{ comment.user_name }}</td>
                <td>{{ comment.text }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            comments: []
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/post/{postId}/comments/')
            .then(response => {
                this.comments = response.data;
            });
    }
}
</script>

<script>
export default {
    name: "AllComments"
}
</script>

<style scoped>

</style>
