<template>
    <div>
        <div class="mb-4">
            <Link class="inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white"
                  :href="route('admin.params.index')">Назад</Link>
        </div>
        <div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <td class="px-6 py-3">Id</td>
                    <td class="px-6 py-3">Название</td>
                    <td class="px-6 py-3">Тип фильтра</td>
                    <td class="px-6 py-3">Заголовок &laquo;Тип фильтра&raquo;</td>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">{{ param.id }}</td>
                    <td class="px-6 py-4">{{ param.title }}</td>
                    <td class="px-6 py-4">{{ param.filter_type }}</td>
                    <td class="px-6 py-4">{{ param.filter_type_title }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name:"Show",
    layout: AdminLayout,

    props:{
        param: Object
    },

    components:{
        Link
    }
}
</script>

<style scoped>

</style>
