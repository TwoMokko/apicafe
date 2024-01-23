<template>
    <base-loading v-if = "loading"></base-loading>
    <div class = "container">
        <div class = "form-group">
            <div class = "mb-3 d-flex align-items-baseline gap-4">
                <h6>Название:</h6>
                <div style = "flex: auto">
                    <input type = "text" v-model = "name" class = "form-control is-invalid">
                    <div class = "invalid-feedback">Обязательное поле</div>
                    <div class = "invalid-feedback">Максимальное количество символов: </div>
                </div>
            </div>

            <textarea type = "text" v-model = "description" class = "form-control mb-3"></textarea>
            <input type = "text" v-model = "photo" class = "form-control mb-3">
            <input type = "text" v-model = "people_count_min" class = "form-control mb-3">
            <input type = "text" v-model = "people_count_max" class = "form-control mb-3">
            <input type = "text" v-model = "time_count_min" class = "form-control mb-3">
            <input type = "text" v-model = "time_count_max" class = "form-control mb-3">
            <input type = "text" v-model = "age" class = "form-control mb-3">
            <input type = "text" v-model = "rules" class = "form-control mb-3">
            <input type = "text" v-model = "is_published" class = "form-control mb-3">
            <button @click = "saveData" type="button" class="btn btn-outline-secondary mb-3">Сохранить</button>
        </div>
    </div>
    <base-error v-if = "errored">
        Ошибка загрузки данных!
        <br>{{ errors[0] }}
    </base-error>
    <base-dialog v-model:show="dialogVisible">
        <div class = "text-center">Сохранено</div>
    </base-dialog>
</template>

<script>
import BaseError from "@/components/UI/BaseError.vue";
import BaseLoading from "@/components/UI/BaseLoading.vue";
import BaseDialog from "@/components/UI/BaseDialog.vue";

// import { useVuelidate } from '@vuelidate/core';
// import { required, maxLength } from '@vuelidate/validators';

export default {
    name: "GameUpdatePage",
    components: {
        BaseDialog,
        BaseLoading, BaseError
    },
    props: [
      'gameId'
    ],
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
            loading: true,
            errors: [],
        }
    },
    methods: {
        saveData() {
            // this.v$.$touch()
            // if (this.v$.$anyError) {
            //     return;
            // }
            axios.post('/api/games/' + this.gameId, {
                _method: 'PUT',
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
                    this.errored = false
                    this.dialogVisible = true
                })
                .catch(error => {
                    if (error.response.data.errors.name) {
                        this.errors = []
                        this.errors.push(error.response.data.errors.name[0])
                    }
                    this.errored = true
                })
                .finally(() => {
                    this.loading = false
                })
        }
    },
    mounted() {
        axios.get('/api/games/' + this.gameId)
            .then(response => {
                this.name = response.data.data.name
                this.description = response.data.data.description
                this.photo = response.data.data.photo
                this.people_count_min = response.data.data.people_count_min
                this.people_count_max = response.data.data.people_count_max
                this.time_count_min = response.data.data.time_count_min
                this.time_count_max = response.data.data.time_count_max
                this.age = response.data.data.age
                this.rules = response.data.data.rules
                this.is_published = response.data.data.is_published
            })
            .catch(error => {
                this.errored = true
            })
            .finally(() => {
                this.loading = false
            })
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
