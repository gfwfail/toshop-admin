
Vue.component('modal', {
    template: '#modal-template',
    props: {
        show: {
            type: Boolean,
            required: true,
            twoWay: true
        }
    }
})

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
})