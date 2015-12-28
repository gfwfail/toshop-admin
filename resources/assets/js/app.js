
Vue.component('modal', {
    template: '#modal-template',
    props: {
        show: {
            type: Boolean,
            required: true,
            twoWay: true
        }
    }
});

// start app
new Vue({
    el: 'body',
    data: {
        showModal: false
    },
    methods: {
        signin: function (e) {
            e.preventDefault()
        }
    }
});

var stores = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: '/api/stores',
    remote: {
        url: '/api/stores?keyword=%QUERY',
        wildcard: '%QUERY'
    }
});

$('.typeahead').typeahead(null, {
    name: 'stores',
    display: 'name',
    source: stores,
    templates: {
        empty: [
            '<div class="empty-message">',
            'unable to find any stores that match the current query',
            '</div>'
        ].join('\n'),
        suggestion: function(data) {
            return '<p><strong>' + data.name + '</strong>  <h3 class="text-warning pull-right"> ' + data.cashback + '</h3> </p>';
        }
    }
});