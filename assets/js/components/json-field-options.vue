<template>
    <div>
        <input type="hidden" :name="field_name" v-model="JSON.stringify(field_data)" />
        <ul class="json-field-repeater-options">
            <li class="json-field-repeater-options-item" v-for="field, key in field_data">
                <div class="json-field-repeater-options-item-form-group">
                    <div class="json-field-repeater-options-item-label">
                        Label do campo
                    </div>
                    <input type="text" required
                           class="json-field-repeater-options-item-field"
                           placeholder="Label do campo"
                           v-model="field.label"
                    />
                </div>
                <div class="json-field-repeater-options-item-form-group">
                    <div class="json-field-repeater-options-item-label">
                        Slug do campo
                    </div>
                    <input type="text" required
                           class="json-field-repeater-options-item-field"
                           placeholder="Slug do campo"
                           v-model="field.slug"
                    />
                </div>
                <div class="json-field-repeater-options-item-form-group">
                    <input type="button" value="Remover"
                           class="json-field-repeater-options-item-button json-field-button"
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
        name: "json-field-options",
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
                this.field_data.push({'label': '', 'slug': ''});
            },
            deleteField(key) {
                this.field_data.splice(key, 1);
            },
        },
    }
</script>

<style scoped>
    .json-field-repeater-options,
    .json-field-repeater-options-item,
    .json-field-repeater-options-item-field,
    .json-field-button {
        border-radius: 4px;
    }

    .json-field-repeater-options,
    .json-field-repeater-options-item {
        padding: 10px;
    }

    .json-field-repeater-options-item {
        background-color: rgba(0, 0, 0, .3);
        clear: both;
        margin-bottom: 10px;
        overflow: auto;
    }

    .json-field-repeater-options-item-form-group {
        margin-bottom: 10px;
        overflow: auto;
    }

    .json-field-repeater-options-item-form-group:last-child {
        margin-bottom: 0;
    }

    .json-field-repeater-options-item-label,
    .json-field-repeater-options-item-field {
        display: inline-block;
        float: left;
        margin: 0;
    }

    .json-field-repeater-options-item-label,
    .json-field-repeater-options-item-field,
    .json-field-button {
        font-weight: 500;
        letter-spacing: .04em;
    }

    .json-field-repeater-options-item-label {
        width: 30%;
    }

    .json-field-repeater-options-item-field {
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
