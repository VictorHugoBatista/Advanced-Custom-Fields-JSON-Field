export default class AdminJsonFieldInitializer {
    constructor($) {
        this.$ = $;
    }

    /**
     * Chama a função passada por parâmetro ao carregar
     * um campo do tipo acf_field na administração.
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
}
