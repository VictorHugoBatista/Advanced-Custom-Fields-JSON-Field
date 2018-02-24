import AdminJsonFieldInitializer from './acf-field-initializer';
import Vue from 'vue';
import JsonField from './components/json-field.vue';

Vue.component('json-field', JsonField);

let initializer = new AdminJsonFieldInitializer(jQuery);

initializer.initializeJsonField($field => {
    new Vue({el: '#' + $field.find('.json-field-wrapper').attr('id')});
});
initializer.initializeJsonFieldOptions($field => {
    new Vue({el: '[data-id="' + $field.attr('data-id') + '"]'});
});
