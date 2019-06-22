<template>
    <v-app id="inspire">
        <v-content>
            <v-container >
                <v-layout align-center justify-center>
                    <v-flex xs12 sm12 md12 lg6>
                        <v-card>
                            <v-card-title>
                                <h3>Amadeus Panel Install Helper</h3>
                            </v-card-title>
                            <v-stepper v-model="e6" vertical>
                                <v-stepper-step :complete="e6 > 1" step="1">
                                    添加服务器到 Amadeus Network
                                    <small> Amadeus Daemon 的配置信息</small>
                                </v-stepper-step>

                                <v-stepper-content step="1">
                                    <v-text-field
                                            v-model="ip"
                                            label="IP地址"
                                            required
                                    ></v-text-field>

                                    <v-text-field
                                            v-model="port"
                                            label="端口"
                                            required
                                    ></v-text-field>

                                    <v-text-field
                                            v-model="password"
                                            label="密码"
                                            required
                                    ></v-text-field>
                                    <v-btn color="primary" @click="e6 = 2">Continue</v-btn>
                                </v-stepper-content>

                                <v-stepper-step :complete="e6 > 2" step="2">核对信息</v-stepper-step>

                                <v-stepper-content step="2">
                                    <p>已成功与 资讯统合思念体对有机生命体接触用接口界面 取得通信。请核对服务器配置信息。</p>

                                    balabalabalabalabalabalabalabala
                                    <br>
                                    <v-btn color="primary" @click="e6 = 3">Continue</v-btn>
                                    <v-btn flat>Cancel</v-btn>
                                </v-stepper-content>

                                <v-stepper-step :complete="e6 > 3" step="3">请选择服务器优先级别</v-stepper-step>

                                <v-stepper-content step="3">
                                    <v-radio-group v-model="daemonlevel">
                                        <v-radio
                                                label="主服务器"
                                                value="main"
                                        ></v-radio>
                                        <v-radio
                                                label="从服务器"
                                                value="submain"
                                        ></v-radio>
                                        <v-radio
                                                label="命运石之门"
                                                value="gate"
                                        ></v-radio>
                                    </v-radio-group>
                                    <v-btn color="primary" @click="e6 = 4">Continue</v-btn>
                                    <v-btn flat>Cancel</v-btn>
                                </v-stepper-content>
                            </v-stepper>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </v-app>

</template>

<script>
    export default {
        name: "Install",
        data () {
            return {
                e6: 1,
                daemonlevel: 1
            }
        }
    }
</script>

<style scoped>
    #inspire{
        background: #b8e5f8 url("../assets/dhdjweida-install.png") no-repeat center;
        background-size: cover;
        width: 100%;
        height: 100vh;
        overflow: auto;
    }
</style>