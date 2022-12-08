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
        empres: {
        type: Object,
        default: () => ({}),
    },
    });

    const form = useForm({
        id: props.servi.id,
        Nombre_Servicio: props.servi.Nombre_Servicio,
        empresID: props.servi.empresID,
        Fecha: props.servi.Fecha,
        Hora: props.servi.Hora,
        Ubicacion: props.servi.Ubicacion,
        Encargado: props.servi.Encargado,
        Cantida_Meseros: props.servi.Cantida_Meseros,
        Precio: props.servi.Precio,
        Observaciones: props.servi.Observaciones,
    });


    const submit = () => {
        form.put(route("servis.update", props.servi.id));
    };
    </script>

    <template>
        <Head title="coor_serv Edit" />

        <BreezeAuthenticatedLayout>
            <template #header>
                <h2 class="text-xl font-semibold leading-tight text-black-800 text-center">
                    Editar Servicio
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
                                        >Nombre_Servicio</label
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
                                        for="tel"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >empresID</label
                                    >
                                    <select 
                                v-model="form.empresID" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Elija la empresa</option>
                                    <option v-for="empre in empres" :key="empre.id" :value="empre.id">{{empre.Nombre_emp}}</option>
                                </select>
                                    <div
                                        v-if="form.errors.empresID"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.empresID }}
                                    </div>
                                    <div class="mb-6">
                                    <label
                                        for="nombre"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Fecha</label
                                    >
                                    <input
                                        type="date"
                                        v-model="form.Fecha"
                                        name="nombre"
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
                                        for="nombre"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >   Hora</label
                                    >
                                    <input
                                        type="time"
                                        v-model="form.Hora"
                                        name="nombre"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.Hora"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.Hora }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="nombre"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >   Ubicacion</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.Ubicacion"
                                        name="nombre"
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
                                        for="nombre"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >   Encargado</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.Encargado"
                                        name="nombre"
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
                                        for="nombre"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >   Cantida_Meseros</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.Cantida_Meseros"
                                        name="nombre"
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
                                        for="nombre"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >   Precio</label
                                    >
                                    <input
                                        type="num"
                                        v-model="form.Precio"
                                        name="nombre"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.Precio"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.Precio }}
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <label
                                        for="nombre"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >   Observaciones</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.Observaciones"
                                        name="nombre"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
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