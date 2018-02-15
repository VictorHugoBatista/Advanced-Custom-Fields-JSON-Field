<template>
    <div>
        <input type="hidden" :name="field_name" :value="JSON.stringify(field_data)" />
    </div>
</template>

<script>
    export default {
        name: "json-field",
        props: [
            'field_name',
            'field_value',
        ],
        data() {
            return {
                field_data: {},
            };
        },
        mounted() {
            try {
                const value = JSON.parse(this.field_value);
                this.field_data = value;
            } catch(e) {
                this.field_data = {};
            }
        },
    }
</script>

<style scoped>

</style>
