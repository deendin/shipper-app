<template>
    <section class="cards">
        <template v-for="shipper in shippers" :key="shipper.id">
            <ShipperCard :shipper="shipper"/>
        </template>     
    </section>
</template>

<script setup>
import ShipperCard from './ShipperCard.vue';

</script>

<script>
export default {
    name: "ShoppersList",
    
    data() {
        return {
            shippers: [],
            loading: false,
        }
    },
    methods: {
        getShippers(){
            return this.$axios.get('api/shippers/index')
                        .then(response => {
                            this.shippers = response.data.data
                        })
                        .catch(e => {
                            console.log('err', e)
                        })
                        .finally(() => (this.loading = false))
        }
    },
    mounted() {
        this.getShippers();
    }
}
</script>
