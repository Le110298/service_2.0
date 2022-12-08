<template>
  
    <button @click="shuffleData">Shuffle</button>
    <BarChart v-bind="barChartProps" />

</template>

<script>
import { Chart, registerables } from 'chart.js';
import { BarChart, useBarChart } from 'vue-chart-3';
import { ref, computed, defineComponent } from 'vue';
import { shuffle } from 'lodash';

Chart.register(...registerables);

export default defineComponent({
  name: 'App',
  components: {
    BarChart,
  },
  setup() {
    const data = ref([24, 10]);

    const chartData = computed(() => ({
      labels: ['Televisa', 'Tv Azteca'],
      datasets: [
        {
          data: data.value,
          backgroundColor: ['#77CEFF', '#0079AF'],
        },
      ],
    }));

    const { barChartProps, barChartRef } = useBarChart({
      chartData,
    });

    function shuffleData() {
      data.value = shuffle(data.value);
    }

    return { shuffleData, barChartProps, barChartRef };
  },
});
</script>
