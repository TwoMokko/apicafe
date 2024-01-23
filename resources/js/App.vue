<template>
    <div class="d-flex flex-column min-vh-100">
        <the-header></the-header>
        <main class = "pt-4 pb-4 wrapper flex-grow-1">
            <div class="container">
                <router-view></router-view>
            </div>
        </main>
        <the-footer></the-footer>
    </div>

</template>

<script>
import TheHeader from "@/components/site/TheHeader.vue";
import TheFooter from "@/components/site/TheFooter.vue";

export default {
    components: {
        TheFooter,
        TheHeader,
    }
}
</script>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    html {
        height: 100%;
    }
    /*body {*/
    /*    overflow: scroll;*/
    /*    overflow-x: hidden;*/
    /*    height: 100%;*/
    /*}*/
    /*.body_admin {*/
    /*    display: flex;*/
    /*    flex-direction: column;*/
    /*}*/
    a {
        text-decoration: none;
    }
    /*main {*/
    /*    margin-top: 6rem;*/
    /*    min-height: calc(100vh - 12rem);*/
    /*}*/
    /**:focus-visible {*/
    /*    outline: none;*/
    /*    background-color: white;*/
    /*    opacity: 0.5;*/
    /*}*/
</style>
