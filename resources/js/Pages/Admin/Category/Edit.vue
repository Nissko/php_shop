<template>
    <div>
        <div class="mb-4">
            <Link class="inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white"
                  :href="route('admin.categories.index')">Назад</Link>
        </div>
        <div>
            <div class="mb-4">
                <input type="text" v-model="category.title" class="border w-1/3 border-gray-200 p-2" placeholder="Заголовок">
            </div>
            <div class="mb-4">
                <select v-model="category.parent_id" class="w-1/4">
                    <option value="null" selected="" disabled="">Выберите категорию</option>
                    <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
                </select>
                <a href="#" @click.prevent="updateCategory"
                   class="inline-block py-2 px-3 bg-indigo-600 border border-indigo-700 text-white">
                    Обновить
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link, router} from "@inertiajs/vue3";
import axios from "axios";

export default {
    name:"Edit",

    layout: AdminLayout,

    props:{
        category: Object,
        categories: Array
    },

    components:{
        Link
    },

    methods:{
        updateCategory(){
            axios.patch(route('admin.categories.update', this.category), this.category)
                .then(res=>{
                    console.log(res);
                    router.get(route('admin.categories.index'));
                })
        }
    }
}
</script>

<style scoped>

</style>
