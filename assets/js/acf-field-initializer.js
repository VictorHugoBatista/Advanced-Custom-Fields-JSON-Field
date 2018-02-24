/**
 * Chama a função passada por parâmetro ao carregar
 * um campo do tipo acf_field na administração.
 * @param initializeFieldCallback
 */
export const initializeJsonField = (initializeFieldCallback, $) => {
    if( typeof acf.add_action !== 'undefined' ) { // ACF 5
        acf.add_action('ready_field/type=json_field', initializeFieldCallback);
        acf.add_action('append_field/type=json_field', initializeFieldCallback);
    } else { // ACF 4
        $(document).on('acf/setup_fields', (e, postbox) => {
            $(postbox).find('.field[data-field_type="json_field"]').each((_, field) => {
                initializeFieldCallback($(field));
            });
        });
    }
};
