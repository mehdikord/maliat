<template>

    <q-layout view="hHh lpR fFf">
        <q-header elevated class="bg-primary text-white">
            <q-toolbar>
                <q-btn v-if="this.$route.name !== 'login'" dense flat round icon="mdi-menu" @click="toggleLeftDrawer"></q-btn>

                <q-toolbar-title>
                    <q-avatar>
                        <img src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg"  alt="test">
                    </q-avatar>
                    Control Panel
                </q-toolbar-title>


            </q-toolbar>
        </q-header>

        <q-drawer v-if="this.$route.name !== 'login'" show-if-above v-model="leftDrawerOpen" side="left" bordered>

            <!-- drawer content -->
            <Template_Menu></Template_Menu>


        </q-drawer>

        <q-page-container>
                <div class="q-pa-md">
                    <Template_Content></Template_Content>
                </div>
        </q-page-container>

    </q-layout>



</template>

<script>
import {ref} from 'vue';
import Manage_Template_Menu from "./includes/Manage_Template_Menu.vue";
import Manage_Template_Content from "./includes/Manage_Template_Content.vue";
export default {
    name: "show",
    components: {
        "Template_Menu" : Manage_Template_Menu,
        'Template_Content' : Manage_Template_Content
    },
    setup () {
        const leftDrawerOpen = ref(false)
        const rightDrawerOpen = ref(false)

        return {
            leftDrawerOpen,
            toggleLeftDrawer () {
                leftDrawerOpen.value = !leftDrawerOpen.value
            },

            rightDrawerOpen,
            toggleRightDrawer () {
                rightDrawerOpen.value = !rightDrawerOpen.value
            }
        }
    }
}
</script>

<style scoped>

</style>
