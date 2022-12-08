<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head } from "@inertiajs/inertia-vue3";
    import BreezeButton from "@/Components/PrimaryButton.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import { useForm } from "@inertiajs/inertia-vue3";

    const props = defineProps({
        empres: {
            type: Object,
            default: () => ({}),
        },
    });


    const form = useForm({
        Nombre_emp: '',
        dir_emp: '',
        direc_emp: '',
        rfc: '',
        tel:''
        
    });

    const submit = () => {
        form.post(route("empres.store"));
    };
    </script>

    <template>
        <Head title="Crear empresa" />

        <BreezeAuthenticatedLayout>
            <template #header>
                <h2 class="text-xl font-semibold leading-tight text-black-800 text-center">
                    Crear Empresa
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
                                        >Nombre de la Empresa</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.Nombre_emp"
                                        name="nombre"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.Nombre_emp"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.Nombre_emp }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="Directivo"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Directivo</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.dir_emp"
                                        name="Directivo"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.dir_emp"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.dir_emp }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="direccion"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Direccion</label
                                    >
                                    <textarea
                                        v-model="form.direc_emp"
                                        name="direccion"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.direc_emp"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.direc_emp }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="rfc"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >RFC</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.rfc"
                                        name="rfc"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.rfc"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.rfc }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="tel"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Telefono</label
                                    >
                                    <input
                                        type="num"
                                        v-model="form.tel"
                                        name="tel"
                                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.tel"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.tel }}
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