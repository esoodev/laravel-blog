<template>
    <div class="post-comments">
        <header>
            <h3 class="h6">Post Comments
                <span class="no-of-comments">{{ comments.length }}</span>
            </h3>
        </header>
        <div class="comment" v-for="(comment, index) in comments" :key="index">
            <div class="comment-header d-flex justify-content-between">
                <div class="user d-flex align-items-center">
                    <!-- <div class="image">
                        <img src="{{ asset('img/user.svg') }}" alt="..." class="img-fluid rounded-circle">
                    </div> -->
                    <div class="title">
                        <strong>{{ comment.name }}</strong>
                        <span class="date">{{ comment.created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="comment-body">
                <p>{{ comment.comment }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  props: ["comments"],
  mounted() {
    console.log("Comments show component mounted.");
  }
};
</script>
