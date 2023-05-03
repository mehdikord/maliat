import "../../../bootstrap";

export default {

    state : {},
    mutations: {},
    actions:{
        UserManagersIndex(){
            return new Promise((resolve,reject) => {
                axios.get('users/managers').then((result) => {
                    resolve(result);
                }).catch(error => {
                    reject();
                })
            } )
        }

    }

}
