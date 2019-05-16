<template>
  <div class="HackingToTheGate">
    <router-view/>
  </div>
</template>

<script>

import {Amadeus} from "./Amadeus";

export default {
  name: 'App',
  data () {
    return {
      //
    }
  },
  mounted:function () {
    //TODO: 请求后端状态
    Amadeus.ping();
  }
}
</script>
