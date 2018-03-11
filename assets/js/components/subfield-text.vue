<template>
    <div>
        <div class="json-field-repeater-item-label">
            {{ label }}
        </div>
        <input type="text"
               class="json-field-repeater-item-field"
               :value="value"
               v-on:input="this.subfieldChange"
        />
    </div>
</template>

<script>
    export default {
        name: "subfield-text",
        props: [
            'label',
            'value',
        ],
        methods: {
            subfieldChange() {
                this.$emit('subfield-changed');
            },
        },
    }
</script>
