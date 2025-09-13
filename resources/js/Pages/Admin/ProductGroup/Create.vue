<template>
    <div>
        <div class="mb-4">
            <Link class="inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white"
                  :href="route('admin.product-groups.index')">Назад</Link>
        </div>
        <div>
            <div class="mb-4">
                <input type="text" v-model="productGroup.title" class="border w-1/3 border-gray-200 p-2" placeholder="Название">
            </div>
            <div class="mb-4">
                <a href="#" @click.prevent="storeGroup"
                   class="inline-block py-2 px-3 bg-indigo-600 border border-indigo-700 text-white">
                    Создать
                </a>
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

    components:{
        Link
    },

    data(){
        return{
            productGroup:{}
        }
    },

    methods:{
        storeGroup(){
            axios.post(route('admin.product-groups.store'), this.productGroup)
                .then(res=>{
                    console.log(res);
                    this.productGroup = {};
                })
        }
    }
}
</script>

<style scoped>

</style>
