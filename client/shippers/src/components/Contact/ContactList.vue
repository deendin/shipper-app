<template>
    <div>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Contact Name</th>
                    <th>Contact Number</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="contact in shipper.contacts">
                    <td>{{ contact.name }}</td>
                    <td>{{ contact.contact_number }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
const props = defineProps({
    shipper : {
        type: Object,
        required: true
    }
})
</script>

<style scoped>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin-left: 40%;
}

.styled-table thead tr {
    background-color: #4F46E5;;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #ffffff;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #4F46E5;;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #4F46E5;;
}
</style>