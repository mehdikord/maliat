<template>
    <q-card flat bordered>

        <q-card-section class="bg-blue-grey-14 text-white q-pb-lg">
            <q-btn color="deep-orange-7" icon="mdi-plus" push class="float-right" label="Add Item"></q-btn>

            <strong class="font-16">Our Changing Planet</strong>

        </q-card-section>

        <q-card-section>


            <Global_Loading></Global_Loading>

        </q-card-section>


    </q-card>

</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "Manage_Users_Managers",
    created() {
        this.GetItems();


    },
    data(){
        return{
            items:[],
            loading_get:true,
            errors:[]
        }
    },
    methods:{
        ...mapActions([
            "UserManagersIndex"

        ]),
        GetItems(){

            this.UserManagersIndex().then(res => {
                this.items = res.data.result;
                this.loading_get=false;
            }).catch(error => {
                this.NotifyServerError();
            });
        }

    }
}
</script>

<style scoped>

</style>
