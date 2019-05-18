<template>
    <div class="HackingToTheGate">
        <router-view></router-view>
    </div>
</template>

<script>

    import {Amadeus} from "./Amadeus";

    export default {
        name: 'App',
        data () {
            return {
            }
        },
        components: {
        },
        mounted:function () {
            this.axios.get(Amadeus.api('/ping')).then((response)=>{
                if(response.data.success === true) {
                    Amadeus.log("已连接API服务器");
                }else{
                    Amadeus.error("无法连接API服务器");
                }
            }).catch((response)=>{
                console.log(response);
                Amadeus.error("无法连接API服务器\n" + response );
            })
        }
    }
</script>
