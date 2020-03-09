define([
    'Magento_Ui/js/form/element/date',
    'jquery'
], function (Date, $) {
    'use strict';
    return Date.extend({
        defaults: {
            options: {
                showsDate: true,
                beforeShowDay: function (date) {
                    var array = ["08","09","10","11","12"];
                    var string = $.datepicker.formatDate('dd', date);
                    return [ array.indexOf(string) != -1 ];
                },
            },

            elementTmpl: 'ui/form/element/date'
        }
    });
});
