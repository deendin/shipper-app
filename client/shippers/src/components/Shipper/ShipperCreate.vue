<template>
    <HeaderVue :title="headerTitle"/><br><br>
    <div class="shipper-create-form">
        <label> Company Name: </label> <br>

        <input type="text" placeholder="" v-model="formData.company_name" /> <br>
        <div v-if="errorFlags.company_name" class="error-message">Company Name is required.</div> <br><br>

        <label> Address Name: </label> <br>

        <input type="text" placeholder="" v-model="formData.address"/><br>
        <div v-if="errorFlags.address" class="error-message">Company address is field.</div> <br> <br>

        <label> Contact Name: </label> <br>

        <input type="text" placeholder="" v-model="formData.contact.name"/>
        <br>
        <div v-if="errorFlags.contact_name" class="error-message">Contact's name is required field.</div> <br> <br>

        <label> Contact Number: </label> <br>

        <input type="text" placeholder="" v-model="formData.contact.contact_number"/>
        <br>
        <div v-if="errorFlags.contact_number" class="error-message">Contact number is required field.</div> <br> <br>


        <button @click="createShipper"> Submit </button> <br>
        <div class="error-message">{{ this.submit_error }}</div>
    </div>
</template>

<script setup>
import HeaderVue from '../../Header.vue';
const headerTitle = 'Add Shipper';
</script>

<script>

export default {
    name: "ShipperCreate",
    
    data() {
        return {
            formData: {
                company_name: ``,
                address: ``,
                contact: {
                    name: ``,
                    contact_number: ``,
                },
            },
            errorFlags: {
				company_name: false,
				address: false,
                contact_name: false,
                contact_number: false,
			},
            submit_error: ``,
        }
    },
    methods: {

        clearErrors: function() {
            for(var key in this.errorFlags) {
                if(this.errorFlags.hasOwnProperty(key)) {
                    this.errorFlags[key] = false;
                }
            }
            this.submit_error = '';
        },

        validateData: function() {
            this.clearErrors();
            var isError = false;
            if(!this.formData.company_name) {
                this.errorFlags.company_name = true;
                isError = true;
            }
            if(!this.formData.address) {
                this.errorFlags.address = true;
                isError = true;
            }
            if(!this.formData.contact.name) {
                this.errorFlags.contact_name = true;
                isError = true;
            }
            if(!this.formData.contact.contact_number) {
                this.errorFlags.contact_number = true;
                isError = true;
            }
            return !isError;
        },

        createShipper(){
            if(!this.validateData()) {
                this.submit_error = 'Please correct all errors to proceed.';
                return;
            }

            return this.$axios.post('api/shippers/create', this.formData)
                        .then(response => {
                            if(response.data.data){
                                this.$router.push({name: 'home'})
                            }
                        })
                        .catch(e => {
                        })
                        .finally(() => (this.loading = false))
        }
    },
}
</script>

<style scoped>
    .error-message {
        color: #cc0033;
        display: inline-block;
        font-size: 12px;
        line-height: 15px;
        margin: 5px 0 0;
    }
    .shipper-create-form{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        padding: 100px;
    }

    label{
        font-family: sans-serif;
        letter-spacing: 6px;
        text-transform: uppercase;
        font-size: .8em;
    }

    input[type=text]{
        display: inline-block;
        text-align: left;
        padding: 10px;
        width: 350px;
        margin: 10px 0;
    }

    button{
        font-family: sans-serif;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin: 20px 0;
        padding: 10px 30px;
        border: 2px solid #FFF;
    }
</style>
