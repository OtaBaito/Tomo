<template>
    <app-layout title="Dashboard">
        <template #header>
			<tomo-steps v-if="stepsdata.length > 0" :steps="stepsdata" />
			<h2 v-else class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <welcome />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'
    import TomoSteps from '@/Components/Steps.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
            TomoSteps,
        },

		data() {
			return {
				stepsdata: [
					{
						id: 1,
						done: true,
						name: 'User\'s Profile',
						link: '#',
					},
					{
						id: 2,
						done: false,
						name: 'Join Division',
						link: '#',
					},
					{
						id: 3,
						done: false,
						name: 'Complete Requirements',
						link: '#',
					},
					{
						id: 4,
						done: false,
						name: 'Let\'s Play',
						link: '#',
					},
				],
			}
		},
    })
</script>
