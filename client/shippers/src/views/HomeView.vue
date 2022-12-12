<template>
  <Header :title="headerTitle"/>
  
  <main class="main-area">
      <div class="centered">
        <ShippersList/>

      </div>
  </main>
</template>

<script setup>
import Header from '../Header.vue';
import ShippersList from '../components/Shipper/ShippersList.vue';
const headerTitle = 'Shippers List';

</script>