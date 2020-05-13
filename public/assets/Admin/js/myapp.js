new Vue({
    // L'option élement 'el' permet de savoir sur quel element on va gréffer vue js
    el:'#app',
    // cette option est un tableau qui va regrouper toutes les variables que l'on va utilisé dans la vue'
    data: {
       success : true
    },
    methods:{
        close: function() {
            this.success = false
        }
    }
})