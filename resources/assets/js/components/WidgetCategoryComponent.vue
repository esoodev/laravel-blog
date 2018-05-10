<template>
    <div class="widget categories">
        <header>
            <h3 class="h6">Categories</h3>
        </header>
        <div class="item d-flex justify-content-between" v-for="(category, index) in categories" :key="index">
            <a :href="'/magazine/category/' + category.name" >{{ category.name }}</a>
            <span>{{ category.count }}</span>
        </div>
    </div>
</template>

<script>
export default {
  props: ['categories'],
  mounted() {
    console.log("Category widget mounted.");
  }
};
</script>
