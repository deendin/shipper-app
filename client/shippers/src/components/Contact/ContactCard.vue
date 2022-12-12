<template>
    <div class="contact-container">
        <div class="primary-contact">
            <h5>{{ contactType }}</h5> 
            <span>Name: {{ shipper.primary_contact.name }}</span><br>
            <span>Contact Number: {{ shipper.primary_contact.contact_number }}</span>
        </div>
    </div>
</template>


<script setup>

const props = defineProps({
    shipper: {
        type: Object,
        required: true
    },
    contactType: {
        type: String,
        default: "Contact"
    }
});
</script>