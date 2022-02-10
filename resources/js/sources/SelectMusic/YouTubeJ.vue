<template>
  <div :id='id'></div>
</template>

<script>
import {getUID} from "../api";

export default {
  name: "YouTubeJ",
  data: function() {
    return {
      id: null,
      youtube:null,
    }
  },
  props:{
    "musicId":{
      type:String,
      required:true,
    }
  },
  mounted() {

    window.YT.ready(() => {
      this.youtube = new window.YT.Player(this.id, {
        height: '360',
        width: '640',
        videoId: this.musicId,
        events: {
          'onReady': ()=>{},
          'onStateChange': ()=>{}
        }
      });
    });
  },
  created() {
    this.id = getUID();
    console.log(this.id)
  }
}
</script>

<style scoped>

</style>