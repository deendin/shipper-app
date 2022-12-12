<template>
    <article class="card">
        <router-link :to="`/shipper/${this.shipper.id}/update`">
            <picture class="thumbnail">
                <img src="shipperLogo.jpeg" alt="A banana that looks like a bird">
            </picture>
            <div class="card-content">

                <h2>Shipper: {{ shipper.company_name }}</h2>
                <p class="btm-sm">Address: {{ shipper.address }}</p>

                <ContactCard v-if="shipper.primary_contact" :shipper="shipper" :contactType="'Primary Contact'"/>
                
                <ContactButton :shipper="shipper"/>
            </div>
        </router-link>
    </article>
</template>

<script setup>
import ContactButton from '../Contact/ContactButton.vue';
import ContactCard from '../Contact/ContactCard.vue';

const props = defineProps({
    shipper : {
        type: Object,
        required: true
    }
})

</script>

