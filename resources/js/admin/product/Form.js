import AppForm from '../app-components/Form/AppForm';

Vue.component('product-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                assets: '' ,
                brand:  '' ,
                color:  '' ,
                description:  '' ,
                name:  '' ,
                price:  '' ,
                shortName:  '' ,
                sizes: '' ,
                type:  '' ,

            }
        }
    }

});
