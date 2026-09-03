<script setup>
    import DM_Intro from './Sections/DM_Intro.vue';

    const topic = "Introduction to Discrete Math";

</script>

<template>
    <DM_Intro v-if="topic === 'Introduction to Discrete Math'"></DM_Intro>
</template>