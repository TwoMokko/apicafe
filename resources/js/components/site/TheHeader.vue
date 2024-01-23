<template>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <router-link :to = "{ name: 'home' }" class = "navbar-brand">LOGO</router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link class="nav-link" :to = "{ name: 'home' }">Главная</router-link>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <router-link class="nav-link" :to = "{ name: 'about' }">О нас</router-link>-->
<!--                        </li>-->
                        <li class="nav-item">
                            <router-link class="nav-link" :to = "{ name: 'games' }">Игры</router-link>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <router-link class="nav-link" :to = "{ name: 'events' }">Мероприятия</router-link>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <router-link class="nav-link" :to = "{ name: 'rules' }">Правила</router-link>-->
<!--                        </li>-->
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "TheHeader"
}
</script>
