<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    servis: {
        type: Object,
        default: () => ({}),
    },
});


const form = useForm({
    Nombre_Servicio: '',
    empresID: '',
    Fecha: '',
    Hora: '',
    Ubicacion: '',
    Encargado: '',
    Cantida_Meseros: '',
    Precio: '',
    Observaciones: ''

});
const submit = () => {
    form.post(route("servis.store"));
};
</script>

<template>

    <Head title="Crear Servicio" />

    <BreezeAuthenticatedLayout>
        <template #header>
                            <Link :href="route('servis.index')">
                            <BreezeButton>Regresar</BreezeButton>
                            </Link>
                            <h2 class="text-3xl font-semibold leading-tight text-black-800 text-center">
                Crear servicio
            </h2>
                      
        </template>
    
        <div class="py-12">
            <div class="mx-auto max-w-2xl sm:px-6 lg:px-4">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-4 bg-white border-b border-gray-200">
                     
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-blue-900 dark:text-blue-700">Nombre
                                    Servicio</label>
                                <input type="text" v-model="form.Nombre_Servicio" name="nombre"
                                    class="form-input rounded text-blue-500 block w-full p-2.5" placeholder="" />
                                <div v-if="form.errors.Nombre_Servicio" class="text-sm text-red-600">
                                    {{ form.errors.Nombre_Servicio }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="empresa"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue-700">Empresa</label>
                                <input type="num" v-model="form.empresID" name="empresa"
                                    class="form-input rounded text-blue-500 block w-full p-2.5" placeholder="" />
                                <div v-if="form.errors.empresID" class="text-sm text-red-600">
                                    {{ form.errors.empresID }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="fech"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue-700">Fecha</label>
                                <input type="date" v-model="form.Fecha" name="fech"
                                    class="form-input rounded text-blue-500 block w-full p-2.5" placeholder="" />
                                <div v-if="form.errors.Fecha" class="text-sm text-red-600">
                                    {{ form.errors.Fecha }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="time"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue-700">Hora</label>
                                <input type="time" v-model="form.Hora" name="time"
                                    class="form-input rounded text-blue-500 block w-full p-2.5" placeholder="" />
                                <div v-if="form.errors.Hora" class="text-sm text-red-600">
                                    {{ form.errors.Hora }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="ubic"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue-700">Ubicacion</label>
                                <input type="text" v-model="form.Ubicacion" name="ubic"
                                    class="form-input rounded text-blue-500 block w-full p-2.5" placeholder="" />
                                <div v-if="form.errors.Ubicacion" class="text-sm text-red-600">
                                    {{ form.errors.Ubicacion }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="enc"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue-700">Encargado</label>
                                <input type="text" v-model="form.Encargado" name="enc"
                                    class="form-input rounded text-blue-500 block w-full p-2.5" placeholder="" />
                                <div v-if="form.errors.Encargado" class="text-sm text-red-600">
                                    {{ form.errors.Encargado }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="cant_mes"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue-700">Cantidad de
                                    meseros</label>
                                <input type="number" v-model="form.Cantida_Meseros" name="cant_mes"
                                    class="form-input rounded text-blue-500 block w-full p-2.5" placeholder="" />
                                <div v-if="form.errors.Cantida_Meseros" class="text-sm text-red-600">
                                    {{ form.errors.Cantida_Meseros }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="pres"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue-700">Precio (sin
                                    simbolo)</label>
                                <input type="number" v-model="form.Precio" name="pres"
                                    class="form-input rounded text-blue-500 block w-full p-2.5" placeholder="" />
                                <div v-if="form.errors.Precio" class="text-sm text-red-600">
                                    {{ form.errors.Precio }}
                                </div>
                                <div class="mb-6">
                                    <label for="obs"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue-700">Observaciones</label>
                                    <textarea name="obs" cols="30" rows="10" v-model="form.Observaciones"
                                        class="form-input rounded text-blue-500 block w-full p-2.5  " placeholder="">
                                    </textarea>
                                    <div v-if="form.errors.Observaciones" class="text-sm text-red-600">
                                        {{ form.errors.Observaciones }}
                                    </div>
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