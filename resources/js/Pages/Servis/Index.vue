
<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from '@inertiajs/inertia-vue3';
import DataTable from 'datatables.net-vue3'
import DataTablesLib from 'datatables.net';
import html2pdf from 'html2pdf.js';
DataTable.use(DataTablesLib);

const props = defineProps({
    servis: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm();
function destroy(id) {
    if (confirm("Usted realmente quiere eliminar el servicio?")) {
        form.delete(route('servis.destroy', id));
    }
}
function savepdf() {
    var element = document.getElementById('el');
    var opt = {
        margin: 1,
        filename: 'myfile.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'A4', orientation: 'landscape' }
    };

    // New Promise-based usage:
    html2pdf().set(opt).from(element).save();
}
</script>

<template>

    <Head title="servis" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-2xl font-semibold leading-tight text-black-800 text-center">
                Registro y Consulta de Servicios
            </h2>
        </template>

        <div class="py-12 bg-slate-400">
            <div class="mx-auto max-w-8xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <div class="mb-4 text-right">

                                <BreezeButton class="bg-red-700" @click="savepdf()">Generar PDF</BreezeButton>

                            </div>
                            <Link :href="route('servis.create')">
                            <BreezeButton>Agregar Servicios</BreezeButton>
                            </Link>

                        </div>


                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <DataTable class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="el">
                                <thead class="text-xs text-gray-500 uppercase bg-gray-80  dark:text-gray-400 border-b">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Servicio
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Empresa
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Fecha
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Hora
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Ubicacion
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Encargado
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Cantida_Meseros
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Precio
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Observaciones
                                        </th>

                                        <th scope="col" class="px-6 py-3">

                                        </th>
                                        <th scope="col" class="px-6 py-3">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="servi in servis" :key="servi.id"
                                        class="bg-white border-b  dark:border-gray-700">

                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ servi.Nombre_Servicio }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ servi.Nombre_emp }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ servi.Fecha }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ servi.Hora }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ servi.Ubicacion }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ servi.Encargado }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ servi.Cantida_Meseros }}
                                        </td>
                                        <td class="px-6 py-4">
                                            ${{ servi.Precio }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ servi.Observaciones }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <Link :href="
                                                route(
                                                    'servis.edit',
                                                    servi.id
                                                )
                                            " class="px-4 py-2 text-white bg-blue-600 rounded-lg">Editar</Link>
                                        </td>
                                        <td class="px-6 py-4">
                                            <BreezeButton class="bg-red-700" @click="destroy(servi.id)">
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