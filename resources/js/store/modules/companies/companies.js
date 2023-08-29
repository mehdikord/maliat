import "../../../bootstrap";

export default {

    state : {},
    mutations: {},
    actions:{
        CompaniesIndex(){

            return new Promise((resolve,reject) => {
                axios.get('companies').then((result) => {
                    resolve(result);
                }).catch(error => {
                    reject(error);
                })
            } )
        },
        CompaniesStore(_,item){
            return new Promise((resolve,reject) => {
                axios.post('companies',item).then((result) => {
                    resolve(result);
                }).catch(error => {
                    reject(error);
                })
            } )
        },
        CompaniesEdit(_,item){
            return new Promise((resolve,reject) => {
                axios.post('companies/'+item.id,item).then((result) => {
                    resolve(result);
                }).catch(error => {
                    reject(error);
                })
            } )
        },
        CompaniesDelete(_,item){
            return new Promise((resolve,reject) => {
                axios.delete('companies/'+item).then((result) => {
                    resolve(result);
                }).catch(error => {
                    reject(error);
                })
            } )
        },

    }

}
