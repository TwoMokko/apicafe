<template>
    <div class = "dialog" v-if="show" @click.stop = "hideDialog">
        <div @click.stop class = "dialog_content">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    import toggleMixin from "@/mixins/toggleMixin";

    export default {
        name: "BaseDialog",
        mixins: [toggleMixin]
    }
</script>

<style scoped>
    .dialog {
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.5);
        position: fixed;
        display: flex;
    }
    .dialog_content {
        margin: auto;
        background-color: white;
        border-radius: 12px;
        min-height: 50px;
        min-width: 300px;
        max-width: 80%;
        padding: 2rem;
    }
</style>