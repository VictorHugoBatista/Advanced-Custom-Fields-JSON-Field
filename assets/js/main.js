import {initializeJsonField} from './acf-field-initializer';
import Vue from 'vue';

initializeJsonField($field => {
    new Vue({
        el: '#' + $field.find('.json-field-wrapper').attr('id'),
    });
});
