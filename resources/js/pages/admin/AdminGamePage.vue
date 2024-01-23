<template>
    <base-error v-if = "errored">Ошибка загрузки данных!</base-error>
    <base-loading v-if = "loading"></base-loading>
    <router-link :to="{ name: 'gameCreate' , params: { gameId: game.id } }" v-if = "!loading">Создать</router-link>
    <table class = "table table-hover text-center" v-if = "!loading">
        <thead>
        <tr>
            <th scope = "col">id</th>
            <th scope = "col">Название</th>
            <th scope = "col">Статус</th>
            <th scope = "col" colspan = "2">Управление</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for = "game in games" :key = "game.id">
                <th scope = "row">{{ game.id }}</th>
                <td>{{ game.name }}</td>
                <td>{{ game.is_published }}</td>
                <td><router-link :to="{ name: 'gameUpdate' , params: { gameId: game.id } }">Редактировать</router-link></td>
                <td><a class = "mx-4" href = "#" @click = "deleteGame(game.id)">Удалить</a></td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import BaseError from "@/components/UI/BaseError.vue";
import BaseLoading from "@/components/UI/BaseLoading.vue";

export default {
    name: "AdminGamePage",
    components: {
        BaseLoading,
        BaseError
    },
    data() {
        return{
            games: [],
            game: {},
            loading: true,
            errored: false,
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
        deleteGame(gameId) {
            if (confirm('Удалить?')) {
                axios.post('/api/games/' + gameId, {
                    _method: 'DELETE',
                })
                    .then(response => {
                        this.games = []
                        this.getAllGames()
                    })
                    .catch(error => {
                        this.errored = true
                    })
                    .finally(() => {
                        this.loading = false
                    })
            }
        }
    },
    mounted() {
        this.getAllGames()
    },
}
</script>
