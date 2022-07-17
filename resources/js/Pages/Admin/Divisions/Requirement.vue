<template>
    <app-layout title="Divisions">
        <template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Division Requirements
			</h2>
        </template>

        <div>
			<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
				<div class="col-span-6 space-y-6" v-if="gamelink.length > 0">
					<RequirementTable :gamelink="gamelink" />
				</div>
				<div v-else class="flex justify-center items-center text-gray-500">
					You are not joined on any
					<a target="_blank" :href="route('admin.division.link')" class="underline text-gray-600 hover:text-gray-900"> division</a>.
				</div>
		    </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
	import RequirementTable from '@/Pages/Admin/Divisions/Partials/Requirement/RequirementTable.vue'
	import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
	import { Link } from '@inertiajs/inertia-vue3'

    export default defineComponent({
        components: {
            AppLayout,
			RequirementTable,
			JetSectionBorder,
			Link,
        },
		props: {
			gamelink: Object,
		}
    })
</script>
