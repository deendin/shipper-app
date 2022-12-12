<template>
    <div class="contacts-button">
        <router-link :to="`/shipper/${this.shipper.id}/contacts`" class="primary-btn">View Contacts</router-link>
    </div>
</template>

<script setup>
const props = defineProps({
    shipper: {
        type: Object,
        required : true
    }
})
</script>