<template>
  
<NavbarComponent></NavbarComponent>
<div id="main">
    <router-view></router-view>

</div>

</template>

<script>
import NavbarComponent from './components/NavbarComponent.vue'
export default {
    
    components : {
        NavbarComponent
    }

}
</script>

<style scoped>
 #main {
     margin-left:25%;
     padding:1px 16px;
     height:1000px;
 }
</style>