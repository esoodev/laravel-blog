<template>
    <div class="widget tags">
        <header>
            <h3 class="h6">Tags</h3>
        </header>
        <ul class="list-inline">
            <li class="list-inline-item" v-for="(tag, index) in tags" :key="index">
                <a :href="'/magazine/tag/' + tag" class="tag">#{{ tag }}</a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
  props: ["tags"],
  mounted() {
    console.log("Tag component mounted.");
  }
};
</script>

