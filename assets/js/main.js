import {initializeJsonField} from './acf-field-initializer';
import Vue from 'vue';
import JsonField from './components/json-field.vue';

Vue.component('json-field', JsonField);

($ => {
    initializeJsonField($field => {
        new Vue({
            el: '#' + $field.find('.json-field-wrapper').attr('id'),
        });
    }, $);

    $(document).on('acf/field_form-open', () => {
        if ($('.field-json-option').length) {
            new Vue({
                el: '.field-json-option',
            });
        }
    });
})(jQuery);
