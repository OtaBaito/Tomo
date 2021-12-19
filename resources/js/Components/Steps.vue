<template>
	<div class="flex">
		<div class="group w-80 p-4" v-for="step in steps" :key="step.id">
			<Link :href="route('dashboard')">
				<div v-if="step.done">
					<div class="h-px w-full border-2 border-red-500 group-hover:border-red-400 mb-4"></div>
					<div class="font-bold text-sm text-red-600 group-hover:text-red-500 leading-tight">
						STEP {{ step.id }}
					</div>
					<div class="font-semibold text-md text-gray-800">
						{{ step.name }}
					</div>
				</div>
				<div v-else>
					<div class="h-px w-full border-2 border-gray-300 group-hover:border-gray-200 mb-4"></div>
					<div class="font-bold text-sm text-gray-600 group-hover:text-gray-500 leading-tight">
						STEP {{ step.id }}
					</div>
					<div class="font-semibold text-md text-gray-800">
						{{ step.name }}
					</div>
				</div>
			</Link>
		</div>
	</div>
</template>

<script>
	import { defineComponent } from 'vue'
	import { Link } from '@inertiajs/inertia-vue3'
	import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid'

	export default defineComponent({
		components: {
			ChevronLeftIcon,
			ChevronRightIcon,
			Link
		},
		props: {
			steps: Object
		}
	})
</script>
