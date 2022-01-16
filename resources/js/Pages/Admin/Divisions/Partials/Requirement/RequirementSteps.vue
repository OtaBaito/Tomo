<template>
	<div class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
		<div class="flex flex-col space-y-4">
			<div class="flex items-center space-x-4">
				<span class="w-6 h-6 ring ring-inset ring-red-500 rounded-full">
					<CheckCircleIcon class="text-red-500" />
				</span>
				<span>Profile Screenshot</span>
			</div>
			<div class="flex items-center space-x-4">
				<span class="bg-red-500 w-6 h-6 rounded-full ring ring-inset ring-red-200"></span>
				<span>Score Screenshot</span>
			</div>
			<div class="flex items-center space-x-4">
				<span class="bg-gray-200 w-6 h-6 rounded-full"></span>
				<span>Win Rate Screenshot</span>
			</div>
			<div class="flex items-center space-x-4">
				<span class="bg-gray-200 w-6 h-6 rounded-full"></span>
				<span>Join Team</span>
			</div>
		</div>
		<div class="fullfiled even this page would be auto hidden by system">
			Requirements Fullfiled
		</div>
		<div class="when no requirement">
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
			division: Object,
		}
	})
</script>
