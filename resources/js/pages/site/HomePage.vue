<template>
    <base-header-text>Главная</base-header-text>
    <router-link :to="{ name : 'adminGames' }">Админ Игры</router-link>
</template>

<script>
import BaseHeaderText from "@/components/UI/BaseHeaderText.vue";
export default {
    name: "HomePage",
    components: {
        BaseHeaderText,
    }
}
</script>
