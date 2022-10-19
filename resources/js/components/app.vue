<template>
    <div class="container">
        <Search @search = "setSearchData" />
        <Houses :data = "arSearch" />
    </div>
</template>

<script>
    import Search from "./search";
    import Houses from "./houses";

    export default {
        components: {
            Search,
            Houses
        },
        data() {
            return {
                arSearch: null,
            }
        },
        methods: {
            setSearchData(searchData) {
                this.arSearch = searchData;
            }
        }
    }
</script>
