<template>
    <app-layout title="Game Division">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Game Division
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default defineComponent({
        props: ['sessions'],

        components: {
            AppLayout,
        },

		data() {
			return {
				
			}
		}
    })
</script>
