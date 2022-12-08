<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head } from "@inertiajs/inertia-vue3";
    import BreezeButton from "@/Components/PrimaryButton.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import { useForm } from "@inertiajs/inertia-vue3";

    const props = defineProps({
        coor_serv: {
            type: Object,
            default: () => ({}),
        },
        servis: {
        type: Object,
        default: () => ({}),
    },
        empls: {
        type: Object,
        default: () => ({}),
    },
    });

    const form = useForm({
        id: props.coor_serv.id,
        serv_id: props.coor_serv.serv_id,
        empl_id: props.coor_serv.empl_id,
        turn: props.coor_serv.turn,
        val_asig: props.coor_serv.val_asig,
    });


    const submit = () => {
        form.put(route("coor_servs.update", props.coor_serv.id));
    };
    </script>

    <template>
        <Head title="coor_serv Edit" />

        <BreezeAuthenticatedLayout>
            <template #header>
                <h2 class="text-xl font-semibold leading-tight text-black-800 text-center">
                    Editar Asignacion
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
                                        >Servicio</label
                                    >
                                    <select 
                                v-model="form.serv_id" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option v-for="servi in servis" :key="servi.id" :value="servi.id">{{servi.id}} {{servi.Nombre_Servicio}}</option>
                                </select>
                                    <div
                                        v-if="form.errors.serv_id"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.serv_id }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="tel"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Empleado</label
                                    >
                                    <select 
                                v-model="form.empl_id" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option v-for="empl in empls" :key="empl.id" :value="empl.id">{{empl.nombre}}</option>
                                </select>
                                    <div
                                        v-if="form.errors.empl_id"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.empl_id }}
                                    </div>
                                    <div class="mb-6">
                                    <label
                                        for="nombre"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Turnos</label
                                    >
                                    <input
                                        type="num"
                                        v-model="form.turn"
                                        name="nombre"
                                        autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.turn"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.turn }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="nombre"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >   Valor Asignado</label
                                    >
                                    <input
                                        type="num"
                                        v-model="form.val_asig"
                                        name="nombre"
                                        autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.val_asig"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.val_asig }}
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