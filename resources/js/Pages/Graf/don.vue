<template>
    <p class="h3" style="text-align:center ;">Estadistica de Servicios de Cada Mesero </p>
      <DoughnutChart :chartData="testData" />
    </template>
    
    <script lang="ts">
    import { defineComponent } from 'vue';
    import { DoughnutChart } from 'vue-chart-3';
    import { Chart, registerables } from "chart.js";
    
    Chart.register(...registerables);
    
    export default defineComponent({
      name: 'Home',
      components: { DoughnutChart },
      setup() {
        const testData = {
          labels: ['mesero 1', 'mesero 2', 'mesero 3', 'mesero 4',],
          datasets: [
            {
              label: 'Cantidad de Servicios',
              data: [5, 0, 4, 0],
              backgroundColor: ['#77CEFF', '#0079AF', '#123E6B', '#97B0C4', '#A5C8ED'],
            },
          ],
        };
    
        return { testData };
      },
    });
    </script>