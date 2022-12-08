<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head } from "@inertiajs/inertia-vue3";
    import BreezeButton from "@/Components/PrimaryButton.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import { useForm } from "@inertiajs/inertia-vue3";

    const props = defineProps({
        empls: {
            type: Object,
            default: () => ({}),
        },
    });


    const form = useForm({
        nombre: '',
        tel: '',
        
    });

    const submit = () => {
        form.post(route("empls.store"));
    };
    </script>

    <template>
        <Head title="Crear empleado" />

        <BreezeAuthenticatedLayout>
            <template #header>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Crear empleado
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
                                        >Nombre</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.nombre"
                                        name="nombre"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                    <div
                                        v-if="form.errors.nombre"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.nombre }}
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
                                        autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                        name="tel"
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