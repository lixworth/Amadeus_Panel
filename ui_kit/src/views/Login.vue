<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <v-app id="inspire">
        <v-content>
            <v-container  fill-height>
                <v-layout align-center justify-center>
                    <v-flex xs12 sm6 md6 lg3>
                        <v-card class="login-card">
                            <div v-if="loading">
                                <v-progress-linear :indeterminate="true"></v-progress-linear>
                            </div>
                            <div style="padding: 19px;" v-bind:class="{ canot_events: loading }" class="login_card">
                                <div class="title font-weight-regular" style="text-align: center;padding: 19px" v-if="header">
                                    <img src="../assets/minecraft.png" alt="">
                                    <div class="login-card-title">
                                        <!--<span>{{ currentTitle }}</span>-->
                                        <span>Amadeus Server Management System <sup>dev</sup></span>
                                    </div>
                                </div>
                                <v-alert
                                        :value="alert.state"
                                        :type="alert.type"
                                        dismissible
                                >
                                    {{ alert.msg }}
                                </v-alert>
                                <v-window v-model="step">
                                <v-window-item :value="1">
                                    <v-card-text>
                                        <v-combobox
                                                v-model="select"
                                                :items="groups"
                                                chips
                                                label="Group"
                                        >
                                            <template v-slot:selection="data">
                                                <v-chip
                                                        :key="JSON.stringify(data.item)"
                                                        :selected="data.selected"
                                                        :disabled="data.disabled"
                                                        class="v-chip--select-multi"
                                                        @click.stop="data.parent.selectedIndex = data.index"
                                                        @input="data.parent.selectItem(data.item)"
                                                >
                                                    <v-avatar class="accent white--text">
                                                        {{ data.item.slice(0, 1).toUpperCase() }}
                                                    </v-avatar>
                                                    {{ data.item }}
                                                </v-chip>
                                            </template>
                                        </v-combobox>
                                        <v-text-field
                                                v-model="email"
                                                label="Email"
                                        ></v-text-field>
                                    </v-card-text>

                                </v-window-item>

                                <v-window-item :value="2">
                                    <v-card-text>
                                        <div class="pa-3 text-xs-center">
                                            <v-img
                                                    class="mb-3"
                                                    contain
                                                    height="100"
                                                    src="https://q1.qlogo.cn/g?b=qq&s=640&nk=2758417019"
                                            ></v-img>
                                            <h3 class="title font-weight-light mb-2">Hi,admin.</h3>
                                            <h3 class="title font-weight-light mb-2">Welcome to Amadeus</h3>
                                            <span class="caption grey--text">Please enter your password..</span>
                                        </div>
                                        <v-text-field
                                                v-model="password"
                                                label="Password"
                                                type="password"
                                        ></v-text-field>
                                        <v-text-field
                                                v-model="code"
                                                label="Login Code"
                                                type="text"
                                        ></v-text-field>
                                        <span class="caption grey--text text--darken-1">
                Please enter a password for your account
              </span>
                                    </v-card-text>
                                </v-window-item>

                                <v-window-item :value="3">
                                    <div class="pa-3 text-xs-center">
                                        <v-img
                                                class="mb-3"
                                                contain
                                                height="60"
                                                src="https://q1.qlogo.cn/g?b=qq&s=640&nk=2758417019"
                                        ></v-img>
                                        <h3 class="title font-weight-light mb-2">Welcome to Amadeus</h3>
                                        <span class="caption grey--text">Please wait a moment.</span>
                                    </div>
                                </v-window-item>
                            </v-window>

                                <v-divider></v-divider>
                                <v-card-actions>
                                    <v-btn
                                            :disabled="step === 1 || step === 3"
                                            flat
                                            @click="step--"
                                    >
                                        Back
                                    </v-btn>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                            :disabled="step === 3"
                                            color="primary"
                                            depressed
                                            @click="next()"
                                    >
                                        Next
                                    </v-btn>
                                </v-card-actions>
                                <v-card-text style="color:#5f6368">
                                    Not your own computer? Please use Visitor Mode to login without trace.
                                </v-card-text>
                            </div>
                        </v-card>
                        <v-footer class="pa-3 ps-footer" style="background-color:transparent;color: white">
                            <div>&copy; {{ new Date().getFullYear() }} Amadeus.</div>
                            <v-spacer></v-spacer>
                            <div style="color: white"><a href="">Home</a> &nbsp&nbsp <a href="">About</a> &nbsp&nbsp <a href="">Help</a></div>
                        </v-footer>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </v-app>

</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                step: 1,
                loading: false,
                select: 'Amadeus Administrator',
                groups: [
                    'Amadeus Administrator',
                ],
                alert: {
                    'state': false,
                    'msg': 'Error! dhdj ',
                    'type': 'error'
                },
                dhdj: { //临时数据
                    'group_id': "-1",
                },
                email: null,
                password: null,
                code: null,
            }
        },
        computed: {
            header () {
                switch (this.step) {
                    case 1: return true
                    case 2: return false
                    default: return true
                }
            }
        },
        methods: {
            next: function () {
                this.loading = true;
                this.alert.state = false
                if (this.step === 1) {
                    if (this.groups.indexOf(this.select) === -1) {
                        this.alert.msg = "Can not find this Group.Please contact administrator."
                        this.alert.type = "error"
                        this.alert.state = true
                        this.loading = false;
                    } else {
                        this.dhdj.group_id = this.groups.indexOf(this.select);
                        this.alert.state = false

                        if(this.email == null){
                            this.alert.msg = "Email can not be empty."
                            this.alert.type = "error"
                            this.alert.state = true
                            this.loading = false;
                        }else{
                            this.alert.state = false
                            //模拟数据
                            if(this.email === "admin@mcpe.ink"){
                                this.step = 2;
                                this.loading = false;
                            }else{
                                this.alert.msg = "User does not exist."
                                this.alert.type = "error"
                                this.alert.state = true
                                this.loading = false;
                            }
                        }
                    }
                }else if(this.step === 2){
                    if(this.password === "admin"){
                        this.$cookie.set('token','admin')
                        this.alert.msg = "Login successfully."
                        this.alert.type = "success"
                        this.alert.state = true

                        this.step = 3;
                        if(this.$route.query.redirect){
                            var redirect = this.$route.query.redirect;
                        }else{
                            var redirect = "/";
                        }
                        setTimeout(() => {
                            this.$router.push(redirect);
                        }, 3000)
                    }else{
                        this.alert.msg = "Password error."
                        this.alert.type = "error"
                        this.alert.state = true
                        this.loading = false;
                    }
                }
            },
        }

    }
</script>

<style scoped>
    #inspire{
        background: #b8e5f8 url("../assets/wolaopo-youdao.jpg") no-repeat center;
        background-size: cover;
        width: 100%;
        height: 100vh;
        overflow: auto;
    }
    .login-card{
        border-radius:9px;
        box-sizing: inherit;
    }
    .canot_events{
        opacity: 0.5;
        pointer-events:none;
        user-focus-pointer: none;
        -webkit-touch-callout: none;
        -moz-user-select: none; /*火狐*/
        -webkit-user-select: none;  /*webkit浏览器*/
        -ms-user-select: none;   /*IE10*/
        user-select: none;
    }
    .login-card-title{
        color: #202124;
        padding-top: 16px;
        font-family: 'Google Sans','Noto Sans Myanmar UI',arial,sans-serif;
        line-height: 1.3333;
        margin-bottom: 0;
        margin-top: 0;
        font-size: 16px;
        padding-bottom: 5px;
    }
    .v-divider{
        display: none;
    }
    .ps-footer a{
        -webkit-border-radius: 2px;
        border-radius: 2px;
        color: white;
        padding: 5px;
        -webkit-transition: background .2s;
        transition: background .2s;
        text-decoration:none;
    }
    .v-progress-linear{
        border-radius:10000px; /* 苟盒子：盘他 !*/
    }
</style>