export default class AdminJsonFieldInitializer {
    /**
     * Inicializa a classe armazenando a instância do jQuery executando na administração.
     * @param $
     */
    constructor($) {
        this.$ = $;
    }

    /**
     * Chama a função passada por parâmetro ao carregar um campo
     * do tipo acf_field na tela de eedição de post na administração.
     * @param initializeFieldCallback
     */
    initializeJsonField(initializeFieldCallback) {
        if( typeof acf.add_action !== 'undefined' ) { // ACF 5
            acf.add_action('ready_field/type=json_field', initializeFieldCallback);
            acf.add_action('append_field/type=json_field', initializeFieldCallback);
        } else { // ACF 4
            this.$(document).on('acf/setup_fields', (e, postbox) => {
                this.$(postbox).find('.field[data-field_type="json_field"]').each((_, field) => {
                    initializeFieldCallback(this.$(field));
                });
            });
        }
    }

    /**
     * Chama a função passada por parâmetro ao carregar as opções de um campo json-field.
     * @param initializeFieldCallback
     */
    initializeJsonFieldOptions(initializeFieldCallback) {
        if( typeof acf.add_action !== 'undefined' ) { // ACF 5
            console.log('acf-5');
        } else { // ACF 4
            this.$(document).on('acf/field_form-open', (_, $optionField) => {
                if ($optionField.is('.field_type-json_field')) {
                    initializeFieldCallback($optionField);
                }
            });
        }
    }
}
