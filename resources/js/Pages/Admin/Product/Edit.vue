<template>
    <div>
        <div class="mb-4">
            <Link class="inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white"
                  :href="route('admin.products.index')">Назад</Link>
        </div>
        <div>
            <div class="mb-4">
                <input type="text" v-model="entries.product.title"
                       class="border w-1/3 border-gray-200 p-2 w-full"
                       placeholder="Название">
            </div>

            <div class="mb-4">
                <textarea type="text" v-model="entries.product.description"
                          class="border w-1/3 border-gray-200 p-2 w-full"
                          placeholder="Описание">
                </textarea>
            </div>

            <div class="mb-4">
                <textarea type="text" v-model="entries.product.content"
                          class="border w-1/3 border-gray-200 p-2 w-full"
                          placeholder="Контент">
                </textarea>
            </div>

            <div class="mb-4">
                <input type="number" v-model="entries.product.price"
                       class="border w-1/3 border-gray-200 p-2"
                       placeholder="Цена">
            </div>

            <div class="mb-4">
                <input type="number" v-model="entries.product.old_price"
                       class="border w-1/3 border-gray-200 p-2"
                       placeholder="Старая цена">
            </div>

            <div class="mb-4">
                <input type="number" v-model="entries.product.qty"
                       class="border w-1/3 border-gray-200 p-2"
                       placeholder="Количество на складе">
            </div>

            <div class="mb-4">
                <select v-model="entries.product.category_id" class="w-1/4">
                    <option value="null" selected="" disabled="">Выберите категорию</option>
                    <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
                </select>
            </div>
<!--            <div class="mb-4">
                <input type="file" v-model="entries.images" class="border w-1/3 border-gray-200 p-2">
            </div>
            <div class="mb-4">
                <select v-model="entries.params" class="w-1/4">
                    <option value="null" selected="" disabled="">Выберите категорию</option>
                    <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
                </select>
            </div>-->
            <div class="mb-4">
                <select v-model="entries.product.product_group_id" class="w-1/4">
                    <option value="null" selected="" disabled="">Выберите группу продуктов</option>
                    <option v-for="productGroup in productGroups" :value="productGroup.id">{{ productGroup.title }}</option>
                </select>
                <a href="#" @click.prevent="editProduct"
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

export default {
    name:"Edit",

    layout: AdminLayout,

    props:{
        product: Object,
        categories:Array,
        productGroups:Array,
    },

    components:{
        Link
    },

    data(){
        return{
            entries:{
                product:this.product,
                //images:null,
                //params:[],
            }
        }
    },

    methods:{
        editProduct(){
            axios.patch(route('admin.products.update', this.product.id), this.entries)
                .then(res=>{
                    console.log(res);
                    router.get(route('admin.products.index'));
                })
        }
    }
}
</script>

<style scoped>

</style>
