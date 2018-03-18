<template>
    <div>
        <div class="json-field-repeater-item-label">
            {{ label }} ({{ slug }})
        </div>
        <select class="json-field-repeater-item-field" id="">
            <option v-for="label, choiceValue in choices" :value="choiceValue">
                {{ label }}
            </option>
        </select>
        <!--v-on:input="$emit('subfield-changed', {subfieldValue: $event.target.value})"-->
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
