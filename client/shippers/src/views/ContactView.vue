<template>
    <HeaderVue :title="headerTitle"/>
    <ContactList v-if="shipper" :shipper="shipper"/>
</template>

<script setup>
import ContactList from '../components/Contact/ContactList.vue';
import HeaderVue from '../Header.vue';
</script>

<script>
export default {
    name: "ContactView",
    
    data() {
        return {
            shipper: {},
            loading: false,
        }
    },
    methods: {
        getShipperContacts(shipperId){
            return this.$axios.get(`api/shippers/${shipperId}/show`)
                        .then(response => {
                            this.shipper = response.data.data
                        })
                        .catch(e => {
                        })
                        .finally(() => (this.loading = false))
        }
    },
    computed: {
        headerTitle() {
            return this.shipper.company_name ? `${this.shipper.company_name}' Contacts.` : 'Viewing Shippers Contacts.';
        }
    },
    mounted() {
        const shipperId = this.$route.params.id;
        this.getShipperContacts(shipperId);
    }
}
</script>