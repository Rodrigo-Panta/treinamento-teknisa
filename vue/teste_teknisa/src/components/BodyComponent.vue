<template>
    <div class="body">
      <div>
        <h4 v-text="devs.length + ' Resultados'"/>
      </div>
      <div class="list">
        <div v-for="dev in devs" :key="dev.key" @click="openModal(dev)" class="card">
          <div>
            <img class="userImage" :src="dev.picture" alt="">
          </div>
          <div class="cardInfo">
            <div>
              <img  class="imgLanguage" v-for="lang in dev.programmingLanguages" :key="lang.key" :src="imgLang[lang.id]" alt="">
            </div>
            <span v-text="dev.name"></span>        
            <span v-text="dev.age + ' anos'"/>       
            <span v-text="dev.email"/>     
          </div>  

        </div>    
      </div>
    </div>
</template>

<script>
export default {
  name: 'BodyComponent',
  props: ['devs'],
  data () {
      return {
        imgLang: {
            'JavaScript': 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/640px-Unofficial_JavaScript_logo_2.svg.png',
            'Java':'https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera-course-photos.s3.amazonaws.com/0a/8cd7f1b14344618b75142593bc7af8/JavaCupLogo800x800.png?auto=format%2Ccompress&dpr=1',
            'Python':'data:image/jpeg;base64,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',
            'Php':'data:image/png;base64,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',
        }
      }
  },
  methods: {
    openModal : function(dev) {
      let devLength = dev.programmingLanguages.length;
      let devLangs = '';
      for(let i=0; i<devLength; i++) {
        devLangs += '<div><div><img style="width:30px;" src="'+ this.imgLang[dev.programmingLanguages[i].id]+ '" /></div></div>' 
      }
      this.$modal.show(
        {
          template: `
            <div class="modal">
              <div class="modalImageContainer">
                <img src="${dev.picture}" />
              </div>
              <div class="modalTextContainer">
                <h4> ${dev.name}</h4>
                <p> ${dev.age} anos</p>
                <h5>Contatos</h5>
                <span> ${dev.email}</span>
                <h5> Linguagens</h5>
                ${devLangs}
              </div>
              <button @click="$emit('close')" >X</button>
            </div>
          `,
          props: ['text']
        },
        { text: 'This text is passed as a property' },
        { height: 'auto' },
        { 'before-close': event => {} }
      
      );
    }
  },
}
</script>

<style scoped>

.body {
  margin-top: 2%;
  background: #F0F0F0;
  padding: 5px 2% 0% 2%;
}

.list {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  flex-wrap: wrap;
}

.card {
  display: flex;
  flex-direction: row;
  width: 339.25px;
  height: 114px;
  left: 0px;
  top: 0px;
  margin-bottom: 2%;

  background: #FFFFFF;

  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);
  border-radius: 8px;

  font-size: small;

  cursor:pointer;
  }

.userImage {
  height: 114px;
  border-top-left-radius: 8px;
  border-bottom-left-radius: 8px;
}

.cardInfo {
  padding-left: 10px;
}

.imgLanguage {
  padding:  10px 5px;
  height: 25px;
  width: 25px;
}



</style>