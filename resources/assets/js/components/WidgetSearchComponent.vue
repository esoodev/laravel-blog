<template>
    <div class="widget search">
        <header>
            <h3 class="h6">Search the blog</h3>
        </header>
        <form  action="/magazine/search" method="GET" class="search-form">
            <div class="form-group">
                <input type="search" name='query' placeholder="What are you looking for?">
                <button type="submit" class="submit">
                    <i class="icon-search"></i>
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
  mounted() {
    console.log("Search widget mounted.");
  }
};
</script>
