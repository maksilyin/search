<template>
    <div>
        <div v-if="data && data.length">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Bedrooms</th>
                        <th scope="col">Bathrooms</th>
                        <th scope="col">Storeys</th>
                        <th scope="col">Garages</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="arDataItem in data" :key="arDataItem.id">
                        <td>{{ arDataItem.id }}</td>
                        <td>{{ arDataItem.name }}</td>
                        <td>{{ arDataItem.price }}</td>
                        <td>{{ arDataItem.bedrooms }}</td>
                        <td>{{ arDataItem.bathrooms }}</td>
                        <td>{{ arDataItem.storeys }}</td>
                        <td>{{ arDataItem.garages }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div v-else-if="data != null">
            <p>По вашему запросу ничего не найдено</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        data: Array
    },
    name: "houses"
}
</script>

<style scoped>

</style>
