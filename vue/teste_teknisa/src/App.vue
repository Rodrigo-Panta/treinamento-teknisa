<template>
  <div id="app">
    <HeaderComponent />
    <BodyComponent :devs="devs" />
  </div>
</template>

<script>
import axios from 'axios';
import HeaderComponent from './components/HeaderComponent.vue'
import BodyComponent from './components/BodyComponent.vue'


export default {
  name: 'App',
  components: {
    HeaderComponent,
    BodyComponent,
  },
  data () {
    return {
      devs: [],
      search: null,
      modo: 'e',
      languages: [],
      filteredDevs: []
    };
  },
  created () {
      axios.get('https://bernardosantos.zeedhi.com/workfolder/dev.php').then((response) => {
          this.devs=response.data.devs;
      });
  },
  methods: {
  },
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  margin-top: 50px;
}




</style>
