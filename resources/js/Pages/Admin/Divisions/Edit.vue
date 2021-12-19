<template>
    <app-layout title="Divisions">
        <template #header>
			<div class="flex justify-between">
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">
	                Editing {{ division.name }}
	            </h2>
				<Link :href="route('admin.division.list')" class="text-sm text-gray-500 hover:text-gray-600 duration-100 font-bold">Back</Link>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div>
					<division-form :division="division" :leaders="leaders" />

					<jet-section-border />

					<requirements :division="division" />

					<requirements-table :division="division.requirements" />

					<jet-section-border />

					<delete-division-form :division="division" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import DivisionForm from '@/Pages/Admin/Divisions/Partials/Edit/Division.vue'
    import DeleteDivisionForm from '@/Pages/Admin/Divisions/Partials/Edit/DeleteDivisionForm.vue'
    import Requirements from '@/Pages/Admin/Divisions/Partials/Edit/Requirements.vue'
    import RequirementsTable from '@/Pages/Admin/Divisions/Partials/Edit/RequirementsTable.vue'
	import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
	import { Link } from '@inertiajs/inertia-vue3'

    export default defineComponent({
        components: {
            AppLayout,
            DivisionForm,
			JetSectionBorder,
			DeleteDivisionForm,
			Requirements,
			RequirementsTable,
			Link,
        },
		props: {
			division: Object,
			leaders: Object,
		}
    })
</script>
