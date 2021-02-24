<template>
  <div class="home">
    <DataTableStudents/>
  </div>
</template>

<script>
// @ is an alias to /src
import DataTableStudents from '@/components/DataTableStudents.vue'

export default {
  name: 'Home',
  components: {
    DataTableStudents
  }
}
</script>
