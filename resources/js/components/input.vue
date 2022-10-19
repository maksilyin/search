<template>
    <div class="form-group">
        <label :for="id">{{ label }}</label>
        <input
            class = "form-control"
            :id = "id"
            :type = "type"
            :name = "name"
            :placeholder = "placeholder"
            :value = 'value'
            @input = "$emit('input', $event.target.value)"
        />
    </div>
</template>

<script>
export default {
    props: {
        id: String,
        type: String,
        name: String,
        placeholder: String,
        value: String,
        label: String
    },
    name: "Input"
}
</script>

<style scoped>

</style>
