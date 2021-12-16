<template>
    <app-layout title="Division">
        <template #header>
            <div class="flex justify-between">
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">
	                New Title
	            </h2>
				<Link :href="route('admin.division.list')" class="text-sm text-gray-500 hover:text-gray-600 duration-100 font-bold">Back</Link>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div>
					<division-form :leaders="leaders" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import DivisionForm from '@/Pages/Admin/Divisions/Partials/Create/Division.vue'
	import { Link } from '@inertiajs/inertia-vue3'

    export default defineComponent({
		props: {
			'leaders': {
				type: Object
			}
		},

        components: {
            AppLayout,
            DivisionForm,
			Link,
        },
    })
</script>
