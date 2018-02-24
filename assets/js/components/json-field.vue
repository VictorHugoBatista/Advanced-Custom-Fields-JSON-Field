<template>
    <div>
        <input type="hidden" :name="field_name" v-model="JSON.stringify(field_data)" />
        <ul class="json-field-repeater">
            <li class="json-field-repeater-item" v-for="field, key in field_data">
                <div class="json-field-repeater-item-form-group" v-for="subfield in structure">
                    <div class="json-field-repeater-item-label">
                        {{ subfield.label }} ({{ subfield.slug }})
                    </div>
                    <input type="text" required
                           class="json-field-repeater-item-field"
                           v-model="field[subfield.slug]"
                    />
                </div>
                <div class="json-field-repeater-item-form-group">
                    <input type="button" value="Remover"
                        class="json-field-repeater-item-button json-field-button"
                        v-on:click="deleteField(key)"
                    />
                </div>
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
            'field_structure',
        ],
        data() {
            return {
                new_line: {},
                structure: [],
                field_data: [],
            };
        },
        mounted() {
            try {
                this.structure = JSON.parse(this.field_structure);
                this.field_data = JSON.parse(this.field_value);
                for (const key in this.structure) {
                    this.new_line[this.structure[key].slug] = '';
                }
            } catch(e) {
                this.structure = [];
                this.field_data = [];
            }
        },
        methods: {
            addField() {
                this.field_data.push(this.new_line);
            },
            deleteField(key) {
                this.field_data.splice(key, 1);
            },
        },
    }
</script>

<style scoped>
    .json-field-repeater-options,
    .json-field-repeater-item,
    .json-field-repeater-item-field,
    .json-field-button {
        border-radius: 4px;
    }

    .json-field-repeater-options,
    .json-field-repeater-item {
        padding: 10px;
    }

    .json-field-repeater-item {
        background-color: rgba(0, 0, 0, .3);
        clear: both;
        margin-bottom: 10px;
        overflow: auto;
    }

    .json-field-repeater-item-form-group {
        margin-bottom: 10px;
        overflow: auto;
    }

    .json-field-repeater-item-form-group:last-child {
        margin-bottom: 0;
    }

    .json-field-repeater-item-label,
    .json-field-repeater-item-field {
        display: inline-block;
        float: left;
        margin: 0;
    }

    .json-field-repeater-item-label,
    .json-field-repeater-item-field,
    .json-field-button {
        font-weight: 500;
        letter-spacing: .04em;
    }

    .json-field-repeater-item-label {
        width: 30%;
    }

    .json-field-repeater-item-field {
        border: 1px solid #2295cc;
        padding: 6px 10px !important;
        width: 70% !important;
    }

    .json-field-button {
        background-color: #2295cc;
        border: 0;
        color: #fff;
        cursor: pointer;
        float: right;
        padding: 7px;
    }
</style>
