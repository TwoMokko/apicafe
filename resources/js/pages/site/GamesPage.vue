<template>
    <base-header-text>Наши игры</base-header-text>
    <div class = "row">
        <div class = "col-12 col-sm-6 col-md-4" v-for = "game in games">
            <div class = "card mb-3">
<!--                <router-link :to = "{ name: 'gameUpdate' , params: { gameId: game.id }}" class = "card-body">-->
<!--                    <h5 class = "card-title">{{ game.name }}</h5>-->
<!--                </router-link>-->
                <div class = "card-body">
                    <h5 class = "card-title">{{ game.name }}</h5>
                    <a href = "#" @click = "showGame(game)">Подробнее</a>
<!--                    <a class = "mx-4" href = "#" @click = "deleteGame(game.id)">Удалить</a>-->
                </div>
            </div>
        </div>
    </div>
    <base-dialog v-model:show="dialogVisible">
        <game-dialog :game = "this.game"></game-dialog>
    </base-dialog>
    <base-error v-if = "errored">Ошибка загрузки данных!</base-error>
    <base-loading v-if = "loading"></base-loading>
</template>

<script>
import BaseDialog from "@/components/UI/BaseDialog.vue";
import GameDialog from "@/components/site/GameDialog.vue";
import BaseError from "@/components/UI/BaseError.vue";
import BaseLoading from "@/components/UI/BaseLoading.vue";
import BaseHeaderText from "@/components/UI/BaseHeaderText.vue";

export default {
    name: "GamesPage",
    components: {
        BaseHeaderText,
        BaseLoading,
        BaseError,
        BaseDialog,
        GameDialog
    },

    data() {
        return{
            games: [],
            game: {},
            loading: true,
            errored: false,
            dialogVisible: false
        }
    },
    methods: {
        getAllGames() {
            axios.get('/api/games')
                .then(response => {
                    this.games = response.data.data
                })
                .catch(error => {
                    this.errored = true
                })
                .finally(() => {
                    this.loading = false
                })
        },
        showGame(game) {
            this.game = game;
            this.dialogVisible = true;
        },
    },
    mounted() {
        this.getAllGames()
    },
}
</script>
