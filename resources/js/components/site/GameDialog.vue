<template>
    <div class = "">
        <div class = "card-body">
            <h5 class = "card-title mb-3">{{ game.name }}</h5>
            <div class = "mb-3" style = "background-color: lightgray; width: 100%; height: 150px;"></div>
            <div class = "d-flex gap-4 mb-3">
                <div>🧑 {{ game.people_count_min }}-{{ game.people_count_max }} игроков</div>
                <div>⏳ {{ game.time_count_min }}-{{ game.time_count_max }} минут</div>
                <div>{{ game.age }} ✚</div>
            </div>
            <p class = "card-text">{{ game.description }}</p>
            <a href = "#" class = "">
                <span>♞</span>
                <span>Правила игры</span>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "GameDialog",
    props: {
        game: {
            type: Object,
            required: true
        }
    }
}
</script>
