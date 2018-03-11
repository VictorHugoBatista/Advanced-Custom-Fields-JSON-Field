<template>
    <div>
        <div class="json-field-repeater-item-label">
            {{ label }} ({{ slug }})
        </div>
        <input type="text"
               class="json-field-repeater-item-field"
               :value="value"
               v-on:input="$emit('subfield-changed', {subfieldValue: $event.target.value})"
        />
    </div>
</template>

<script>
    export default {
        name: "type-text",
        props: [
            'label',
            'slug',
            'value',
        ],
    }
</script>
