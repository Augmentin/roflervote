<template>
  <div class="row">
    <!-- you-tube music-id="yS3PbjhOi6I"></you-tube -->
    <!-- you-tube music-id="TWroQ-lp2Fc"></you-tube -->
    <you-tube-j music-id="TWroQ-lp2Fc"></you-tube-j>
    <you-tube-j music-id="yS3PbjhOi6I"></you-tube-j>
  </div>
</template>

<script>


import YouTube from "./YouTube";
import YouTubeJ from "./YouTubeJ";
export default {
  components:{
    "you-tube":YouTube,
    "you-tube-j":YouTubeJ
  },
  name: "SelectMusic",
  methods:{

  },
  mounted(){

    console.log(window.YT)
    console.log(YT)
  }
}
</script>

<style scoped>

</style>