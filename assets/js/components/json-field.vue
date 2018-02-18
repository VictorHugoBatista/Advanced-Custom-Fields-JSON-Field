<template>
    <div>
        <input type="hidden" :name="field_name" v-model="JSON.stringify(field_data)" />
        <ul class="json-field-repeater">
            <li class="json-field-repeater-item" v-for="field, key in field_data">
                <input class="json-field-repeater-item-field" type="text" v-model="field.title" required />
                <input class="json-field-repeater-item-field" type="text" v-model="field.value" />
                <input class="json-field-repeater-item-button" type="button" value="Remover" v-on:click="deleteField(key)" />
            </li>
            <input type="button" value="Adicionar campo" v-on:click="addField" />
        </ul>
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
        methods: {
            addField() {
                this.field_data.push({'title': '', 'value': ''});
            },
            deleteField(key) {
                this.field_data.splice(key, 1);
            },
        },
    }
</script>

<style scoped>
    .json-field-repeater {
        background-color: rgba(0, 0, 0, .2);
        border-radius: 4px;
        padding: 7px;
    }

    .json-field-repeater-item {
        background-color: rgba(0, 0, 0, .3);
        border-radius: 4px;
        clear: both;
        margin-bottom: 7px;
        overflow: auto;
        padding: 7px;
    }

    .json-field-repeater-item-field,
    .json-field-repeater-item-button {
        border-radius: 4px;
        display: inline-block;
        float: left;
        padding: 6px;
    }

    .json-field-repeater-item-field {
        border: 1px solid black;
        font-weight: 500;
        margin-right: 7px !important;
        padding: 6px 10px !important;
        width: calc(45% - 7px) !important;
    }
</style>
