<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head } from "@inertiajs/inertia-vue3";
    import BreezeButton from "@/Components/PrimaryButton.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import { useForm } from "@inertiajs/inertia-vue3";

    const props = defineProps({
        servi: {
            type: Object,
            default: () => ({}),
        },
    });

    const form = useForm({
        id: props.servi.id,
        Nombre_Servicio: props.servi.Nombre_Servicio,
        Fecha: props.servi.Fecha,
        Hora: props.servi.Hora,
        Ubicacion: props.servi.Ubicacion,
        Encargado: props.servi.Encargado,
        Cantida_Meseros: props.servi.Cantida_Meseros,
        Precio: props.servi.Precio,
        Observaciones: props.servi.Observaciones

    });


    const submit = () => {
        form.put(route("servis.update", props.servi.id));
    };
    </script>

    <template>
        <Head title="servi Edit" />

        <BreezeAuthenticatedLayout>
            <template #header>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                   Editar Servicios
                </h2>
            </template>

            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form @submit.prevent="submit">
                                <div class="mb-6">
                                    <label
                                        for="nombre"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Nombre Servicio</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.Nombre_Servicio"
                                        name="nombre"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.Nombre_Servicio"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.Nombre_Servicio }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="fech"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Fecha</label
                                    >
                                    <input
                                        type="date"
                                        v-model="form.Fecha"
                                        name="fech"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.Fecha"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.Fecha }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="time"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Hora</label
                                    >
                                    <input
                                        type="time"
                                        v-model="form.Hora"
                                        name="time"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.Hora"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.Hora}}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="ubic"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Ubicacion</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.Ubicacion"
                                        name="ubic"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.Ubicacion"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.Ubicacion }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="enc"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Encargado</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.Encargado"
                                        name="enc"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.Encargado"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.Encargado }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="cant_mes"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Cantidad de meseros</label
                                    >
                                    <input
                                        type="number"
                                        v-model="form.Cantida_Meseros"
                                        name="cant_mes"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.Cantida_Meseros"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.Cantida_Meseros }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="pres"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Precio (sin simbolo)</label
                                    >
                                    <input
                                        type="number"
                                        v-model="form.Precio"
                                        name="pres"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.Precio"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.Precio }}
                                    </div>
                                    <div class="mb-6">
                                    <label
                                        for="obs"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Observaciones</label
                                    >
                                    <textarea name="obs" cols="30" rows="10"
                                        v-model="form.Observaciones"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="">
                                    </textarea>
                                    <div
                                        v-if="form.errors.Observaciones"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.Observaciones }}
                                    </div>
                                </div>
                                </div>
                                
                                <button
                                    type="submit"
                                    class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                    :disabled="form.processing"
                                    :class="{ 'opacity-25': form.processing }"
                                >
                                    Enviar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </BreezeAuthenticatedLayout>
    </template>