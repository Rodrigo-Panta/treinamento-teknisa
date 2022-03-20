<template>
  <div id="app">
    <HeaderComponent @changeValue="newSearchValue" @changeLanguage="newLanguageValue" @changeMode="newModeValue" />
    <BodyComponent :devs="filteredDevs" />
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
      mode: 'e',
      languages: [ 'Java', 'JavaScript', 'PHP', 'Python'],
      filteredDevs: [],
    };
  },
  created () {
      axios.get('https://bernardosantos.zeedhi.com/workfolder/dev.php').then((response) => {
          this.devs=response.data.devs;
          this.filteredDevs = this.devs;
      });
  },
  methods: {
    newSearchValue: function(value){
      this.search = value;
      this.updateFilteredDevs();
    },
    newModeValue: function(value){
      this.mode = value;
      this.updateFilteredDevs();
    },
    newLanguageValue: function(value){
      this.languages = value;
      this.updateFilteredDevs();
    },
    updateFilteredDevs: function (){
      
      let filteredDevs = this.devs.filter(dev => {

        let nameMatches = this.search == null || 
                          dev.name.toLowerCase().includes(this.search.toLowerCase());
        let languageMatches = this.hasSelectedLanguages(dev.programmingLanguages);
        if(this.mode == 'e'){
          if(nameMatches && languageMatches) return true;
        } else if(this.mode == 'ou'){
          if(nameMatches || languageMatches) return true;
        }
        return false;
    });
      this.filteredDevs = filteredDevs;
    },
    hasSelectedLanguages(languages){
      let result = languages.filter(lang => { 
        return this.languages.indexOf(lang.id)>=0
      }
      );
      return result.length > 0;
    }
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
