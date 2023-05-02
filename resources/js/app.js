import {createApp} from "vue";
import router from "./routes/manage";
import show from "./manage/template/show.vue";
import { Quasar } from 'quasar';
import quasarIconSet from 'quasar/icon-set/mdi-v7';
// Import icon libraries
import '@quasar/extras/roboto-font/roboto-font.css';
import '@quasar/extras/fontawesome-v6/fontawesome-v6.css';
// ..required because of selected iconSet:
import '@quasar/extras/mdi-v7/mdi-v7.css';
// Import Quasar css
import 'quasar/dist/quasar.css';
import './bootstrap';
import Helper from "./helpers/Helper";
import Error_Validation from "./manage/errors/Error_Validation.vue";


const App=createApp(show);

// ++++++++++ Global Components ++++++++++

App.component('Error_Validation',Error_Validation)

// ++++++++++++++++++++

// ++++++++++ App Uses ++++++++++

App.use(Quasar, {
    plugins: {}, // import Quasar plugins and add here
    iconSet: quasarIconSet,
    /*
    config: {
      brand: {
        // primary: '#e46262',
        // ... or all other brand colors
      },
      notify: {...}, // default set of options for Notify Quasar plugin
      loading: {...}, // default set of options for Loading Quasar plugin
      loadingBar: { ... }, // settings for LoadingBar Quasar plugin
      // ..and many more (check Installation card on each Quasar component/directive/plugin)
    }
    */
})
App.use(router)
window.Helper = Helper

// ++++++++++++++++++++

// ++++++++++ Global Functions (Mixin) ++++++++++

App.mixin({

    //Methods
    methods:{
        MixinValidation(errors,field){
            return Helper.HelperValidationErrors(errors,field);
        },
        MixinValidationCheck(errors,field){
            return Helper.HelperValidationCheck(errors,field);
        },
    }


})

// ++++++++++++++++++++



App.mount('#app')
