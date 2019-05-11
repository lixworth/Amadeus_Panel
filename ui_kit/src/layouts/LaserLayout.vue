<template>
    <v-app id="inspire">
        <v-navigation-drawer
                v-model="drawerRight"
                fixed
                right
                app
                clipped="true"

        >
            <v-list dense>
                <v-list-tile @click.stop="right = !right">
                    <v-list-tile-action>
                        <v-icon>exit_to_app</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Open Temporary Drawer</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <v-toolbar
                color="indigo"
                dark
                fixed
                app
                clipped-left="true"
        >
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title>Title</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-side-icon @click.stop="drawerRight = !drawerRight"></v-toolbar-side-icon>
        </v-toolbar>
        <v-navigation-drawer
                v-model="drawer"
                fixed
                app
                clipped="true"

        >
            <v-list dense>
                <v-list-tile @click.stop="left = !left">
                    <v-list-tile-action>
                        <v-icon>dashboard</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Dashboard</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <v-navigation-drawer
                v-model="left"
                temporary
                fixed
        ></v-navigation-drawer>
        <v-content>
            <router-view/>
        </v-content>
        <v-navigation-drawer
                v-model="right"
                right
                temporary
                fixed
        ></v-navigation-drawer>
        <v-footer color="blue-grey" class="white--text footer" app>
            <span>Amadeus</span>
            <v-spacer></v-spacer>
            <span>&copy; 2018</span>
        </v-footer>
    </v-app>
</template>
<script>
    export default {
        name: "LaserLayout",
        data: () => ({
            drawer: null,
            drawerRight: false,
            right: false,
            left: false
        }),
        props: {
            source: String
        }
    }
</script>

<style scoped>
    .footer{
        padding-left: 10px;
        padding-right: 10px;
    }
</style>