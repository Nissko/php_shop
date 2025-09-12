<template>
    <div>
        <div class="mb-4">
            <Link class="inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white"
                  :href="route('admin.params.index')">Назад</Link>
        </div>
        <div>
            <div class="mb-4">
                <input type="text" v-model="param.title" class="border w-1/3 border-gray-200 p-2" placeholder="Заголовок">
            </div>
            <div class="mb-4">
                <select v-model="param.filter_type" class="w-1/4">
                    <option value="null" selected="" disabled="">Выберите тип фильтра</option>
                    <option v-for="filterType in filterTypes" :value="filterType.value">{{ filterType.title }}</option>
                </select>
                <a href="#" @click.prevent="updateParam"
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
        param: Object,
        filterTypes: Array
    },

    components:{
        Link
    },

    methods:{
        updateParam(){
            axios.patch(route('admin.params.update', this.param), this.param)
                .then(res=>{
                    console.log(res);
                    router.get(route('admin.params.index'));
                })
        }
    }
}
</script>

<style scoped>

</style>
