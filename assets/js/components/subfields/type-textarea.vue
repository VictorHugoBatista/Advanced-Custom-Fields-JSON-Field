<template>
    <div>
        <div class="json-field-repeater-item-label">
            {{ label }} ({{ slug }})
        </div>
        <textarea
                class="json-field-repeater-item-field"
                v-on:change="$emit('subfield-changed', {subfieldValue: $event.target.value})"
        >
            {{ value }}
        </textarea>
    </div>
</template>

<script>
    export default {
        name: "type-textarea",
        props: [
            'label',
            'slug',
            'value',
        ],
    }
</script>
