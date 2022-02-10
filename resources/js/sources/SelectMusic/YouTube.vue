<template>
  <div :id='id'></div>
</template>

<script>
import {getUID} from "../api";
import YouTubePlayer from "youtube-player";

export default {
  name: "YouTube",
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
    this.youtube = YouTubePlayer(this.id , {
      videoId: this.musicId,
      playerVars:{
        rel:0,
        start:1
      }
    });
  },
  created() {
    this.id = getUID();

  },
}
</script>

<style scoped>

</style>