<template>
  <div>
    <pre>
      {{collections}}
    </pre>
  </div>
</template>

<script>
export default {
  name: "Main",
  props:{
    "collections":{
      type:Array,
      required:true,
    }

  }
}
</script>

<style scoped>

</style>