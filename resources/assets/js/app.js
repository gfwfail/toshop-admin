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
        showModal: false,
        category:'',
        slug:'',
        stores :[]
    },
    methods: {
        signin: function (e) {
            e.preventDefault()
        },
        fetchData: function (slug) {
            var self = this;
            self.slug=slug;
            $.get( '/api/category/'+slug, function( data ) {
                console.log(data);
                self.stores= data;

            });

            $.get( '/api/b/home-'+slug, function( data ) {

              $('#category-ad').html(data);

            });

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


$(document).ready(function () {
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
            suggestion: function (data) {
                return '<p><strong>' + data.name + '</strong>  <h3 class="text-warning pull-right"> ' + data.cashback + '</h3> </p>';
            }
        }
    });

    $('#searchicon').hide('fast');
    var isSearchBarShown = 1;

    function showSearchBar() {
        $('.searchbar').css({top: '0px', opacity: 1}); //appear
        $('#navbar').css({"box-shadow": 'none'}); //appear
        isSearchBarShown = 1;
    }

    function hideSearchBar() {
        $('.searchbar').css({top: '-70px', opacity: 0}); //disapear
        $('#navbar').css({"box-shadow": '0px 2px 16px #ccc'}); //appear
        isSearchBarShown = 0;
    }

    $(window).bind('scroll', function () {
        if ($(window).scrollTop() < 150) {
            showSearchBar();
            $('#searchicon').hide('fast');
        } else {
            if ($('#categoryPanel').css('display') == 'none') {
                hideSearchBar();
                $('#searchicon').show('fast');
            }

        }
    });

    $('#searchicon').on('click', function (e) {
        e.preventDefault();
        if (isSearchBarShown) {
            hideSearchBar();
        } else {
            showSearchBar();
        }

    });

    $('#categoryBtn').on('mouseover',function (e) {

        $('#categoryPanel').show('fast');
    });
    $('#categoryPanel').mouseleave(function (e){

        $('#categoryPanel').hide('fast');
    });

});