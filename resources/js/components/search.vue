<template>
    <div>
        <div class="row gy-4 mb-5">
            <div class="col-12">
                <Input v-model="formData.name" type = "text" label = "Название" />
            </div>
            <div class="col-6">
                <Input v-model="formData.bedrooms" type = "number" label = "Спальни" />
            </div>
            <div class="col-6">
                <Input v-model="formData.bathrooms" type = "number" label = "Ванная" />
            </div>
            <div class="col-6">
                <Input v-model="formData.storeys" type = "number" label = "Этажей" />
            </div>
            <div class="col-6">
                <Input v-model="formData.garages" type = "number" label = "Гаражей" />
            </div>
            <div class="col-6">
                <Input v-model="formData.price_from" type = "number" label = "Цена от" />
            </div>
            <div class="col-6">
                <Input v-model="formData.price_to" type = "number" label = "Цена до" />
            </div>
            <div class="col-12">
                <button @click = "search" class="btn btn-primary" type="submit">Поиск</button>
            </div>
        </div>
        <div v-if = "isLoading" class = "preload">Loading...</div>
    </div>
</template>

<script>
import Input from "./input";

export default {
    name: "Search",

    components: {
        Input
    },
    data() {
        return {
            formData: {
                name: null,
                bedrooms: null,
                bathrooms: null,
                storeys: null,
                garages: null,
                price_from: null,
                price_to: null,
            },
            isLoading: false,
        }
    },
    methods: {
        prepareFormData() {
            const preparedFormData = {};

            for (let key in this.formData) {
                if (this.formData[key]) {
                    preparedFormData[key] = this.formData[key];
                }
            }

            return preparedFormData;
        },

        search() {
            const preparedFormData = this.prepareFormData();

            if (Object.keys(preparedFormData).length === 0) {
                return;
            }

            this.sendRequest(preparedFormData)
        },

        sendRequest(formData) {
            this.isLoading = true;

            axios.get('/api/house/search', {params: formData})
                .then((response) => {
                    console.log(response)
                })
                .finally(() => {
                    this.isLoading = false
                });
        }
    }
}
</script>

<style scoped>
    .preload {
        text-align: center;
    }
</style>
