<template>
	<div class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
		<div v-if="requirements.length > 0">
			<div v-if="progress.length === requirements.length">
				Requirements Fullfiled
			</div>
			<div v-else class="flex flex-col space-y-4">
				<div v-for="(requirement, index) in requirements" :key="requirement.id" class="flex items-center space-x-4">
					<span v-if="requirement.progress.length > 0" class="w-6 h-6 ring ring-inset ring-red-500 rounded-full">
						<CheckCircleIcon class="text-red-500" />
					</span>
					<span v-else-if="(progress.length)  === index" class="bg-red-500 w-6 h-6 rounded-full ring ring-inset ring-red-200"></span>
					<span v-else class="bg-gray-200 w-6 h-6 rounded-full"></span>
				</div>
			</div>
		</div>
		<div v-else>
			No Requirements
		</div>
	</div>
</template>

<script>
	import { defineComponent } from 'vue'
	import AppLayout from '@/Layouts/AppLayout.vue'
	import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
	import { Link } from '@inertiajs/inertia-vue3'
	import { PhotographIcon, DotsVerticalIcon, CheckCircleIcon } from '@heroicons/vue/solid'
	import { ChevronRightIcon } from '@heroicons/vue/outline'
	import PlatformBar from '@/Pages/Admin/Divisions/Partials/Read/PlatformBar.vue'

	export default defineComponent({
		components: {
			AppLayout,
			JetSectionBorder,
			Link,
			PhotographIcon,
			DotsVerticalIcon,
			CheckCircleIcon,
			ChevronRightIcon,
			PlatformBar,
		},
		props: {
			requirements: Object,
			progress: Object,
		}
	})
</script>
