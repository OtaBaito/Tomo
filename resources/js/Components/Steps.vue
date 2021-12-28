<template>
	<div class="sm:flex">
		<div class="group h-20 sm:h-auto sm:w-80 p-4" v-for="step in steps" :key="step.id">
			<div class="flex space-x-4 items-center h-full sm:block" v-if="step.done">
				<div class="h-full sm:h-px w-px sm:w-full border-2 border-red-500 group-hover:border-red-400 sm:mb-4"></div>
				<div>
					<div class="font-bold text-sm text-red-600 group-hover:text-red-500 leading-tight">
						STEP {{ step.id }}
					</div>
					<div class="font-semibold text-md text-gray-800">
						{{ step.name }}
					</div>
				</div>
			</div>
			<div class="flex space-x-4 items-center h-full sm:block" v-else>
				<Link :href="route(step.link)">
					<div class="h-full sm:h-px w-px sm:w-full border-2 border-gray-300 group-hover:border-gray-200 sm:mb-4"></div>
					<div>
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
