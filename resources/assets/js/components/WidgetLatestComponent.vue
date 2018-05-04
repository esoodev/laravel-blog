<template>
    <div class="widget latest-posts">
        <header>
            <h3 class="h6">Latest Posts</h3>
        </header>
        <div class="blog-posts">
            <div v-for="(latest, index) in latests" :key="index">
                <a :href="'/magazine/' + latest.id">
                    <div class="item d-flex align-items-center">
                        <!-- <div class="image">
                            <img src="{{ asset('img/small-thumbnail-1.jpg') }}" alt="..." class="img-fluid">
                        </div> -->
                        <div class="title">
                            <strong>{{ latest.title }}</strong>
                            <div class="d-flex align-items-center">
                                <div class="views">
                                    <i class="icon-eye"></i>{{ latest.views }}</div>
                                <div class="comments">
                                    <i class="icon-comment"></i>{{ latest.comments_count }}</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>            
        </div>            
    </div>
</template>

<script>
export default {
  props: ["latests"],
  mounted() {
    console.log("Category widget component mounted.");
  }
};
</script>
