<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from '@inertiajs/inertia-vue3'
import DataTable from 'datatables.net-vue3'
import DataTablesLib from 'datatables.net';
import html2pdf from 'html2pdf.js';
DataTable.use(DataTablesLib);

const props = defineProps({
    coor_servs: {
        type: Object,
        default: () => ({}),
    },
}
);

const form = useForm();

function destroy(id) {
    if (("Usted realmente quiere eliminar el empleado?")) {
        form.delete(route('Coor_servs.destroy', id));
    }
}
function savepdf() {
    var element = document.getElementById('elw');
    var opt = {
        margin: 1,
        filename: 'coor.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'A4', orientation: 'landscape' }
    };
    // New Promise-based usage:
    html2pdf().set(opt).from(element).save();
}

</script>

<template>

    <Head title="Coor_servs" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-2xl font-semibold leading-tight text-black-800 text-center">
                Registro y Consulta de Asignaciones
            </h2>
        </template>

        <div class="py-12 bg-slate-400">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-2">
                            <div class="mb-4 text-right">

                                <BreezeButton class="bg-red-700" @click="savepdf()">Generar PDF</BreezeButton>

                            </div>
                            <Link :href="route('coor_servs.create')">
                            <BreezeButton>Asignar Servicio</BreezeButton>
                            </Link>
                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <DataTable class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="elw">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Servicio
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            Empleado
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Turnos
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Valor Asignado
                                        </th>

                                        <th scope="col" class="px-6 py-3">

                                        </th>
                                        <th scope="col" class="px-6 py-3">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="coor_serv in coor_servs" :key="coor_serv.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ coor_serv.Nombre_Servicio }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ coor_serv.nombre }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ coor_serv.turn }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ coor_serv.val_asig }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <Link :href="route('coor_servs.edit', coor_serv.id)"
                                                class="px-4 py-2 text-white bg-blue-600 rounded-lg">Editar</Link>
                                        </td>
                                        <td class="px-6 py-4">
                                            <BreezeButton class="bg-red-700" @click="destroy(coor_serv.id)">
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