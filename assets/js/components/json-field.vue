<template>
    <div>
        <input type="hidden" :name="field_name" :value="field_value" />
    </div>
</template>

<script>
    export default {
        name: "json-field",
        props: [
            'field_name',
            'field_value',
        ],
    }
</script>

<style scoped>

</style>
