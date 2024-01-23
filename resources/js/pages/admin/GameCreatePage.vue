<template>
    <div class = "container">
        <div class = "form-group">
            <div class = "mb-3 d-flex align-items-baseline gap-4">
                <h6 style = "flex: 20%">Название:</h6>
                <div style = "flex: 80%">
                    <input type = "text" v-model = "name" class = "form-control is-invalid">
                    <div class = "invalid-feedback">Обязательное поле</div>
                    <div class = "invalid-feedback">Максимальное количество символов: </div>
                    <div class = "invalid-feedback">Такая игра уже добавлена</div>
                </div>
            </div>
            <div class = "mb-3 d-flex align-items-baseline gap-4">
                <h6 style = "flex: 20%">Описание:</h6>
                <div style = "flex: 80%">
                    <textarea type = "text" v-model = "description" class = "form-control mb-3"></textarea>
                    <div class = "invalid-feedback">Обязательное поле</div>
                    <div class = "invalid-feedback">Максимальное количество символов: </div>
                </div>
            </div>
            <div class = "mb-3 d-flex align-items-baseline gap-4">
                <h6 style = "flex: 20%">Фото:</h6>
                <div style = "flex: 80%">
                    <input type = "text" v-model = "photo" class = "form-control mb-3">
                    <div class = "invalid-feedback">Обязательное поле</div>
                    <div class = "invalid-feedback">Максимальное количество символов: </div>
                </div>
            </div>
            <div class = "mb-3 d-flex align-items-baseline gap-4">
                <h6 style = "flex: 20%">Минимальное кол-во человек:</h6>
                <div style = "flex: 80%">
                    <input type = "text" v-model = "people_count_min" class = "form-control mb-3">
                    <div class = "invalid-feedback">Обязательное поле</div>
                    <div class = "invalid-feedback">Максимальное количество символов: </div>
                </div>
            </div>
            <div class = "mb-3 d-flex align-items-baseline gap-4">
                <h6 style = "flex: 20%">Максимальное кол-во человек:</h6>
                <div style = "flex: 80%">
                    <input type = "text" v-model = "people_count_max" class = "form-control mb-3">
                    <div class = "invalid-feedback">Обязательное поле</div>
                    <div class = "invalid-feedback">Максимальное количество символов: </div>
                </div>
            </div>
            <div class = "mb-3 d-flex align-items-baseline gap-4">
                <h6 style = "flex: 20%">Минимальное кол-во времени:</h6>
                <div style = "flex: 80%">
                    <input type = "text" v-model = "time_count_min" class = "form-control mb-3">
                    <div class = "invalid-feedback">Обязательное поле</div>
                    <div class = "invalid-feedback">Максимальное количество символов: </div>
                </div>
            </div>
            <div class = "mb-3 d-flex align-items-baseline gap-4">
                <h6 style = "flex: 20%">Максимальное кол-во времени:</h6>
                <div style = "flex: 80%">
                    <input type = "text" v-model = "time_count_max" class = "form-control mb-3">
                    <div class = "invalid-feedback">Обязательное поле</div>
                    <div class = "invalid-feedback">Максимальное количество символов: </div>
                </div>
            </div>
            <div class = "mb-3 d-flex align-items-baseline gap-4">
                <h6 style = "flex: 20%">От скольки лет:</h6>
                <div style = "flex: 80%">
                    <input type = "text" v-model = "age" class = "form-control mb-3">
                    <div class = "invalid-feedback">Обязательное поле</div>
                    <div class = "invalid-feedback">Максимальное количество символов: </div>
                </div>
            </div>
            <div class = "mb-3 d-flex align-items-baseline gap-4">
                <h6 style = "flex: 20%">Правила ссылка:</h6>
                <div style = "flex: 80%">
                    <input type = "text" v-model = "rules" class = "form-control mb-3">
                    <div class = "invalid-feedback">Обязательное поле</div>
                    <div class = "invalid-feedback">Максимальное количество символов: </div>
                </div>
            </div>
            <div class = "mb-3 d-flex align-items-baseline gap-4">
                <h6 style = "flex: 20%">Статус:</h6>
                <div style = "flex: 80%">
                    <input type = "text" v-model = "is_published" class = "form-control mb-3">
                    <div class = "invalid-feedback">Обязательное поле</div>
                    <div class = "invalid-feedback">Максимальное количество символов: </div>
                </div>
            </div>
            <button @click = "addNewGame" type="button" class="btn btn-outline-secondary mb-3">Сохранить</button>
            <div class="spinner-border text-secondary ms-4" role="status" v-if="sendLoading"></div>
        </div>
    </div>
    <base-error v-if = "errored">
        Ошибка загрузки данных!
        <br>{{ errors[0] }}
    </base-error>
    <base-dialog v-model:show="dialogVisible">
        <div class = "text-center">Создано</div>
    </base-dialog>
</template>

<script>
import BaseError from "@/components/UI/BaseError.vue";
import BaseDialog from "@/components/UI/BaseDialog.vue";

// import { useVuelidate } from '@vuelidate/core';
// import { required, maxLength } from '@vuelidate/validators';

export default {
    name: "GameCreatePage",
    components: {
        BaseDialog,
        BaseError
    },
    // props: [
    //     'gameId'
    // ],
    // setup () {
    //     return { v$: useVuelidate() }
    // },
    data() {
        return {
            dialogVisible: false,
            name: null,
            description: null,
            photo: null,
            people_count_min: null,
            people_count_max: null,
            time_count_min: null,
            time_count_max: null,
            age: null,
            rules: null,
            is_published: null,
            errored: false,
            sendLoading: false,
            errors: [],
        }
    },
    methods: {
        // getAllGames() {
        //     axios.get('/api/games')
        //         .then(response => {
        //             this.games = response.data.data
        //         })
        //         .catch(error => {
        //             this.errored = true
        //         })
        //         .finally(() => {
        //             this.loading = false
        //         })
        // },
        addNewGame() {
            // this.v$.$touch()
            // if (this.v$.$anyError) {
            //     return;
            // }
            this.sendLoading = true
            axios.post('/api/games', {
                name: this.name,
                description: this.description,
                photo: this.photo,
                people_count_min: this.people_count_min,
                people_count_max: this.people_count_max,
                time_count_min: this.time_count_min,
                time_count_max: this.time_count_max,
                age: this.age,
                rules: this.rules,
                is_published: this.is_published,
            })
                .then(response => {
                    // this.games = []
                    // this.getAllGames()
                    this.sendLoading = false

                    this.name = null
                    this.description = null
                    this.photo = null
                    this.people_count_min = null
                    this.people_count_max = null
                    this.time_count_min = null
                    this.time_count_max = null
                    this.age = null
                    this.rules = null
                    this.is_published = null
                    this.errored = false
                    this.dialogVisible = true
                })
                .catch(error => {
                    this.sendLoading = false
                    if (error.response.data.errors.name) {
                        this.errors = []
                        this.errors.push(error.response.data.errors.name[0])
                    }
                    this.errored = true
                })
                .finally(() => {

                })
        }
    },
    mounted() {

    },
    // validation() {
    //     return {
    //         name: { required }
    //     }
    // },
    // validation: {
    //     name: {
    //         required,
    //         maxLength: maxLength(5)
    //     }
    // }
}
</script>
