<template>
    <div>
        <div class="mb-4">
            <Link class="inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white"
                  :href="route('admin.product-groups.index')">Назад</Link>
        </div>
        <div>
            <div class="mb-4">
                <input type="text" v-model="productGroup.title" class="border w-1/3 border-gray-200 p-2" placeholder="Заголовок">
            </div>
            <div class="mb-4">
                <a href="#" @click.prevent="updateProductGroup"
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
        productGroup: Object,
    },

    components:{
        Link
    },

    methods:{
        updateProductGroup(){
            axios.patch(route('admin.product-groups.update', this.productGroup), this.productGroup)
                .then(res=>{
                    console.log(res);
                    router.get(route('admin.product-groups.index'));
                })
        }
    }
}
</script>

<style scoped>

</style>
