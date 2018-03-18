<template>
    <div>
        <div class="json-field-repeater-item-label">
            {{ label }} ({{ slug }})
        </div>
        <select class="json-field-repeater-item-field"
                v-on:change="$emit('subfield-changed', {subfieldValue: $event.target.value})"
        >
            <option v-for="label, choiceValue in choices" :value="choiceValue" :selected="value === choiceValue">
                {{ label }}
            </option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "type-select",
        props: [
            'label',
            'slug',
            'value',
            'choices',
        ],
    }
</script>
