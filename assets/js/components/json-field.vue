<template>
    <div>
        <input type="hidden" :name="field_name" v-model="JSON.stringify(field_data)" />
        <ul class="json-field-repeater">
            <li class="json-field-repeater-item" v-for="field, key in field_data">
                <input class="json-field-repeater-item-field" type="text" v-model="field.title" required />
                <input class="json-field-repeater-item-field" type="text" v-model="field.value" />
                <input class="json-field-repeater-item-button json-field-button" type="button" value="Remover" v-on:click="deleteField(key)" />
            </li>
            <input class="json-field-button" type="button" value="Adicionar campo" v-on:click="addField" />
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
    .json-field-repeater,
    .json-field-repeater-item,
    .json-field-repeater-item-field,
    .json-field-button {
        border-radius: 4px;
    }

    .json-field-repeater,
    .json-field-repeater-item {
        padding: 7px;
    }

    .json-field-repeater-item {
        background-color: rgba(0, 0, 0, .3);
        clear: both;
        margin-bottom: 7px;
        overflow: auto;
    }

    .json-field-repeater-item-field,
    .json-field-repeater-item-button {
        display: inline-block;
        float: left;
    }

    .json-field-repeater-item-field,
    .json-field-button {
        font-weight: 500;
        letter-spacing: .04em;
    }

    .json-field-repeater-item-field {
        border: 1px solid #2295cc;
        margin-right: 7px !important;
        padding: 6px 10px !important;
        width: calc(45% - 7px) !important;
    }

    .json-field-button {
        background-color: #2295cc;
        border: 0;
        color: #fff;
        cursor: pointer;
        padding: 7px;
    }
</style>
