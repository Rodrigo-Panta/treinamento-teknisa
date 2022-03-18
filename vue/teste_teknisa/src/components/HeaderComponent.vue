<template>
  <div name="HeaderComponent">
    <h1>Pesquisa de Desenvolvedores</h1>
    <div class="header">
      <div id="nameField">
        <label for="name">Por Nome:</label>
        <input class="search" id="name" type="text" placeholder="Digite aqui...">
      </div>
      <div id="filtersContainer">
        <label>Por Linguagem:</label>
        <div id="filters" >
          <div id="options">
            <input type="radio" name="option" value="e" checked>E
            <input type="radio" name="option" value="ou">OU
          </div>
          <div id="languageOptions">
            <div>
              <input type="checkbox" name="linguagem" value="java">Java
              <input type="checkbox" name="linguagem" value="javascript">JavaScript
            </div>
            <div>
              <input type="checkbox" name="linguagem" value="php">PHP
              <input type="checkbox" name="linguagem" value="python">Python
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HeaderComponent',
  data () {
    
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

label {
  font-weight: bold;
  font-size: small;
}

#app > h1 {
  padding: 0 2%;
}

.header {
  display: flex;
  justify-content: space-between;
  min-height: 20%;
  padding: 0% 2%;
}

#nameField {
  flex: 1;
  display:flex;
  flex-direction: column;
  justify-content: space-around;
  padding-right: 1%;
}

.search {
  padding: 12px 16px;
  border: 1px solid #767676;
  border-radius: 2px;
  margin-top: 6px;
}

#filtersContainer {
  min-width: 25%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

#filters{
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: center;
}

#options {
  display: block;
}

#languageOptions {
  display: inline-block;
}
</style>
