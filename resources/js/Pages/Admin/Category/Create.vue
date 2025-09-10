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
                <a href="#" @click.prevent="storeCategory" class="inline-block py-2 px-3 bg-indigo-600 border border-indigo-700 text-white">Создать</a>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name:"Create",

    layout: AdminLayout,

    props:{
        categories: Array
    },

    components:{
        Link
    },

    data(){
        return{
            category:{
                parent_id: null
            }
        }
    },

    methods:{
        storeCategory(){
            axios.post(route('admin.categories.store'), this.category)
                .then(res=>{
                    console.log(res);
                    this.category = {
                        parent_id: null
                    }
                })
        }
    }
}
</script>

<style scoped>

</style>
