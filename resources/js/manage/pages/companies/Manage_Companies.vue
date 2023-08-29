<template>
    <q-card flat bordered>

        <q-card-section class="bg-blue-grey-14 text-white q-pb-lg">
            <q-btn @click="dialog_add=true" color="deep-orange-7" icon="mdi-plus" push class="float-right" label="افزودن آیتم"></q-btn>
            <q-dialog
                v-model="dialog_add"

                transition-show="scale"
                transition-hide="scale"
                position="top"
            >
                <q-card style="max-width: 700px;width: 700px">
                    <q-card-section class="bg-deep-orange-9 text-white">
                        <div class="text-h6">افزودن آیتم جدید</div>
                    </q-card-section>
                    <q-card-section >
                        <q-input v-model="add.name"  lazy-rules type="text" outlined label="نام شرکت / کسب و کار" color="primary" class="q-my-xs" :error="this.MixinValidationCheck(errors,'name')">
                            <template v-slot:error>
                                <Error_Validation :errors="this.MixinValidation(errors,'name')"></Error_Validation>
                            </template>
                        </q-input>

                        <q-input v-model="add.economic_code"  lazy-rules type="text" outlined label="کد اقتصادی" color="primary" class="q-my-xs" :error="this.MixinValidationCheck(errors,'economic_code')">
                            <template v-slot:error>
                                <Error_Validation :errors="this.MixinValidation(errors,'economic_code')"></Error_Validation>
                            </template>
                        </q-input>
                        <q-select
                            class="q-my-xs"
                            outlined
                            transition-show="flip-up"
                            transition-hide="flip-down"
                            v-model="add.type"
                            label="نوع شرکت"
                            :options="comment_options"
                            emit-value
                            map-options
                            behavior="menu"
                        >
                        </q-select>
                        <q-input v-model="add.description"  lazy-rules type="textarea" outlined label="توضیحات" color="primary" class="q-my-xs" :error="this.MixinValidationCheck(errors,'description')">
                            <template v-slot:error>
                                <Error_Validation :errors="this.MixinValidation(errors,'description')"></Error_Validation>
                            </template>
                        </q-input>

                    </q-card-section>

                    <q-card-actions align="right">
                        <q-btn  label="بستن" color="red" v-close-popup />
                        <q-btn @click="AddItem" :loading="loading_add" label="افزودن آیتم" color="green-9"/>
                    </q-card-actions>
                </q-card>
            </q-dialog>

            <strong class="font-16">لیست کسب و کار ها</strong>
        </q-card-section>

        <q-card-section>

            <q-table
                :rows="items"
                row-key="id"
                :columns="item_columns"
                color="indigo"
                table-header-class="text-indigo"
                :loading="loading_get"
            >
                <template v-slot:loading>
                    <Global_Loading></Global_Loading>
                </template>

                <template v-slot:body-cell-tools="props">
                    <q-td :props="props">
                        <q-btn @click="dialog_edit[props.row.id] = true;errors=[]" glossy color="primary" size="sm" icon="mdi-pen" class="q-mx-xs">
                            <q-tooltip class="bg-grey-9">ویرایش آیتم</q-tooltip>
                        </q-btn>
                        <q-btn @click="DeleteItem(props.row.id)" glossy color="red-9" size="sm" icon="mdi-delete" class="q-mx-xs">
                            <q-tooltip class="bg-grey-9">حذف آیتم</q-tooltip>
                        </q-btn>
                    </q-td>
                    <q-dialog
                        v-model="dialog_edit[props.row.id]"
                        transition-show="scale"
                        transition-hide="scale"
                        position="top"
                    >
                        <q-card style="max-width: 700px;width: 700px">
                            <q-card-section class="bg-primary text-white">
                                <div class="text-h6">ویرایش آیتم : {{props.row.name}}</div>
                            </q-card-section>
                            <q-card-section >

                                <q-input v-model="props.row.name"  lazy-rules type="text" outlined label="نام شرکت / کسب و کار" color="primary" class="q-my-xs" :error="this.MixinValidationCheck(errors,'name')">
                                    <template v-slot:error>
                                        <Error_Validation :errors="this.MixinValidation(errors,'name')"></Error_Validation>
                                    </template>
                                </q-input>

                                <q-input v-model="props.row.economic_code"  lazy-rules type="text" outlined label="کد اقتصادی" color="primary" class="q-my-xs" :error="this.MixinValidationCheck(errors,'economic_code')">
                                    <template v-slot:error>
                                        <Error_Validation :errors="this.MixinValidation(errors,'economic_code')"></Error_Validation>
                                    </template>
                                </q-input>
                                <q-select
                                    class="q-my-xs"
                                    outlined
                                    transition-show="flip-up"
                                    transition-hide="flip-down"
                                    v-model="props.row.type"
                                    label="نوع شرکت"
                                    :options="comment_options"
                                    emit-value
                                    map-options
                                    behavior="menu"
                                >
                                </q-select>
                                <q-input v-model="props.row.description"  lazy-rules type="textarea" outlined label="توضیحات" color="primary" class="q-my-xs" :error="this.MixinValidationCheck(errors,'description')">
                                    <template v-slot:error>
                                        <Error_Validation :errors="this.MixinValidation(errors,'description')"></Error_Validation>
                                    </template>
                                </q-input>

                            </q-card-section>

                            <q-card-actions align="right">
                                <q-btn  label="بستن" color="red" v-close-popup />
                                <q-btn @click="EditItem(props.row)" :loading="loading_add" label="ویرایش آیتم" color="indigo"/>
                            </q-card-actions>
                        </q-card>
                    </q-dialog>

                </template>


            </q-table>

        </q-card-section>


    </q-card>

</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "Manage_Companies",
    created() {
        this.GetItems();

    },
    data(){
        return{
            items:[],
            loading_get:true,
            loading_add:false,
            errors:[],
            dialog_add:false,
            dialog_edit:[],
            comment_options : [
                {
                    label:"حقیقی",
                    value :1,
                },
                {
                    label:"حقوقی",
                    value :0,
                }
            ],
            add:{
                name:null,
                economic_code:null,
                type:1,
                description:null,


            },
            item_columns:[
                {
                    name:'id',
                    required: true,
                    label: 'ID',
                    align: 'left',
                    field: row => row.id,
                    sortable: true
                },
                {
                    name:'title',
                    required: true,
                    label: 'نام کسب و کار',
                    align: 'left',
                    field: row => row.name,
                    sortable: true
                },
                {
                    name:'type',
                    required: true,
                    label: 'نوع شرکت',
                    align: 'left',
                    field: row => row.type,
                    sortable: true
                },
                {
                    name:'economic_code',
                    required: true,
                    label: 'کد اقتصادی',
                    align: 'left',
                    field: row => row.economic_code,
                    sortable: true
                },
                {
                    name:'code',
                    required: true,
                    label: 'کد سیستمی',
                    align: 'left',
                    field: row => row.code,
                    sortable: true
                },
                {
                    name:'tools',
                    required: true,
                    label: 'ابزار',
                    align: 'left',

                },
            ]
        }
    },
    methods:{
        ...mapActions([
            "CompaniesIndex",
            "CompaniesStore",
            "CompaniesDelete",
            "CompaniesEdit"

        ]),
        GetItems(){

            this.CompaniesIndex().then(res => {
                this.items = res.data.result;
                this.loading_get=false;
            }).catch(error => {
                this.NotifyServerError();
            });
        },
        AddItem(){
            this.loading_add=true;
            this.CompaniesStore(this.add).then(res => {
                this.items.unshift(res.data.result);
                this.loading_add=false;
                this.dialog_add=false;
                this.add=[];
                return this.NotifyCreate();
            }).catch(error => {
                this.loading_add=false;
                if (error.response.status === 422) {
                    return this.errors = error.response.data
                }
                return  this.NotifyServerError();

            })
        },
        EditItem(item){
            this.loading_add=true;
            this.CompaniesEdit(item).then(res => {
                this.loading_add=false;
                this.items = this.items.filter(item_get =>{
                    if (item_get.id === item.id){
                        item_get=res.data.result
                    }
                    return item_get;
                })
                this.dialog_edit[item.id]=false;
                return this.NotifyUpdate();
            }).catch(error => {
                this.loading_add=false;
                if (error.response.status === 422) {
                    return this.errors = error.response.data
                }
                return  this.NotifyServerError();

            })
        },
        DeleteItem (id) {
            this.$q.dialog({
                title: 'هشدار !',
                message: 'آیا مطمئن هستید آیتم مورد نظر حذف شود ؟',
                ok: {
                    push: true,
                    color:'green-9',
                },
                cancel: {
                    push: true,
                    color: 'negative'
                },
                persistent: true
            }).onOk(() => {
                this.CompaniesDelete(id).then(res => {
                    this.items = this.items.filter(item =>{
                        return item.id !== id;
                    })
                    return this.NotifyDelete();
                }).catch(error => {
                    return  this.NotifyServerError();
                })

            }).onCancel(() => {
                // console.log('>>>> Cancel')
            }).onDismiss(() => {
                // console.log('I am triggered on both OK and Cancel')
            })
        }

    }
}
</script>

<style scoped>

</style>
