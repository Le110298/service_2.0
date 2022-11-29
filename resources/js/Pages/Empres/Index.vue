<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head } from "@inertiajs/inertia-vue3";
    import BreezeButton from "@/Components/PrimaryButton.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import { Inertia } from "@inertiajs/inertia";
    import { useForm } from '@inertiajs/inertia-vue3'
    import DataTable from 'datatables.net-vue3'
import DataTablesLib from 'datatables.net';
 
DataTable.use(DataTablesLib);

    const props = defineProps({
        empres: {
            type: Object,
            default: () => ({}),
        },
    });
    const form = useForm();

    function destroy(id) {
        if (confirm("Usted realmente quiere eliminar la empresa?")) {
            form.delete(route('empres.destroy', id));
        }
    }
    </script>

    <template>

      <Head title="empres" />

    <BreezeAuthenticatedLayout>
            <template #header>
                <h2 class="text-2xl font-semibold leading-tight text-black-800 text-center">
                Registro y Consulta de Empresas
            </h2>
            </template>

            <div class="py-12 bg-slate-400">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                           <div class="mb-2">
                                <Link :href="route('empres.create')">
                                    <BreezeButton>Agregar Empresa</BreezeButton></Link
                                >
                            </div>
                             <div
                                class="relative overflow-x-auto shadow-md sm:rounded-lg"
                            >
                                <DataTable
                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                                >
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                    >
                                        <tr>
                                            <th scope="col" class="px-6 py-3">#</th>
                                            <th scope="col" class="px-6 py-3">
                                                 Empresa
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Directivo
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Direccion
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                RFC
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Telefono
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="empre in empres"
                                            :key="empre.id"
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                        >
                                            <th
                                                scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                            >
                                                {{ empre.id }}
                                            </th>
                                            <th
                                                scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                            >
                                                {{empre.Nombre_emp}}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{empre.dir_emp}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{empre.direc_emp}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{empre.rfc}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{empre.tel}}
                                            </td>


                                            <td class="px-6 py-4">
                                                <Link
                                                    :href="
                                                        route(
                                                            'empres.edit',
                                                            empre.id
                                                        )
                                                    "
                                                   class="px-4 py-2 text-white bg-blue-600 rounded-lg" >Editar</Link
                                                >
                                            </td>
                                            <td class="px-6 py-4">
                                                <BreezeButton
                                                    class="bg-red-700"
                                                    @click="destroy(empre.id)"
                                                >
                                                    Eliminar
                                                </BreezeButton>
                                            </td>
                                        </tr>
                                    </tbody>
                                </DataTable>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </BreezeAuthenticatedLayout>
    </template>