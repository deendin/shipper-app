<template>
    <header class="masthead clear">
        <div class="centered">
            <div class="site-branding">
                <h1 class="site-title" style="position: center;">
                {{ title }}
                </h1>
            </div>
        </div>
    </header>
</template>

<script setup>
const props = defineProps({
    title : {
        type: String,
        required: true,
    }
})
</script>