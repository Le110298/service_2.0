<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import toastr from 'toastr';

const props = defineProps({
    coor_servs: {
        type: Object,
        default: () => ({}),
    },
    empls: {
        type: Object,
        default: () => ({}),
    },
    servis: {
        type: Object,
        default: () => ({}),
    },
});


const form = useForm({
    empl_id: '',
    serv_id: '',
    turn: '',
    val_asig: ''

});

const submit = () => {
    form.post(route("coor_servs.store"));
    alert("Hello world!");
};
</script>

<template>

    <Head title="Asignar Servicio" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Asignar Servicio
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">

                            <div class="mb-6">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Servicio</label>
                                    <select 
                                v-model="form.serv_id" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option v-for="servi in servis" :key="servi.id" :value="servi.id">{{servi.id}} {{servi.Nombre_Servicio}}</option>
                                </select>
                                <div v-if="form.errors.serv_id" class="text-sm text-red-600">
                                    {{ form.errors.serv_id }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Empleado</label>
                                    <select 
                                v-model="form.empl_id" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option v-for="empl in empls" :key="empl.id" :value="empl.id">{{empl.nombre}}</option>
                                </select>
                                <div v-if="form.errors.empl_id" class="text-sm text-red-600">
                                    {{ form.errors.empl_id }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Turnos</label>
                                <input type="num" v-model="form.turn" name="nombre" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.turn" class="text-sm text-red-600">
                                    {{ form.errors.turn }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="tel"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Valor
                                    Asignado</label>
                                <input type="text" v-model="form.val_asig" name="tel" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.val_asig" class="text-sm text-red-600">
                                    {{ form.errors.val_asig }}
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                Enviar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>