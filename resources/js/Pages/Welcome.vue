<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeButton from "@/Components/PrimaryButton.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
})
</script>

<template>
    <Head title="Mariela Lopez Cruz" />


    <div v-if="canLogin" class="grid h-screen  border-b border-gray-200 place-items-center bg-slate-400">
      
            <img src="../svg/waiter.svg" style="height:375px; width:400px;" alt="img"/>
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-xl text-gray-700 dark:text-gray-500 underline"><button class="text-2xl bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-9 rounded-full">Dashboard</button></Link>

            <template v-else>
                <div>
                <Link :href="route('login')" class="text-sm my-0 text-gray-700 dark:text-gray-500 underline"><BreezeButton> Iniciar sesion</BreezeButton></Link>
            </div>
            <div class="">
                <Link v-if="canRegister" :href="route('register')" class=" text-sm text-gray-700 dark:text-gray-500 underline"><BreezeButton class="bg-red-700">Registrar </BreezeButton></Link>
            </div>
            </template>
        </div>
    
  
</template>
