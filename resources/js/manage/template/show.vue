<template>

    <q-layout view="hHh lpr fFf">

        <q-header elevated class="bg-primary text-white">
            <q-toolbar>
                <q-btn dense flat round icon="mdi-menu" @click="toggleLeftDrawer" />

                <q-toolbar-title>
                    <q-avatar>
                        <img src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg"  alt="test">
                    </q-avatar>
                    Control Panel
                </q-toolbar-title>

<!--                <q-btn dense flat round icon="mdi-menu" @click="toggleRightDrawer" />-->
            </q-toolbar>
        </q-header>

        <q-drawer show-if-above v-model="leftDrawerOpen" side="left" bordered>

            <!-- drawer content -->
            <Template_Menu></Template_Menu>


        </q-drawer>

<!--        <q-drawer show-if-above v-model="rightDrawerOpen" side="right" bordered>-->
<!--            &lt;!&ndash; drawer content &ndash;&gt;-->
<!--            -->
<!--        </q-drawer>-->

        <q-page-container>
            <q-page padding>
                <Template_Content></Template_Content>
            </q-page>>

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
