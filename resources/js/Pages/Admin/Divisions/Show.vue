<template>
    <app-layout title="Divisions">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Divisions
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="divisions.length != 0">
					<division-search :serverKeyword="keyword" />
                    <division-table :divisions="divisions" />
                </div>

				<div class="absolute top-0 left-0 flex flex-col justify-center items-center min-h-screen w-full" v-else>
					<add-note class="h-48" />
					<span class="text-lg mt-4">
						Zero results, <Link class="text-red-600 font-bold" :href="route('admin.division.add')">create a new one!</Link>
					</span>
				</div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
	import { Link } from '@inertiajs/inertia-vue3'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import DivisionTable from '@/Pages/Admin/Divisions/Partials/Read/DivisionTable.vue'
    import DivisionSearch from '@/Pages/Admin/Divisions/Partials/Read/DivisionSearch.vue'
	import AddNote from '@/Assets/Sprites/AddNote.vue'

    export default defineComponent({
        props: [
			'divisions',
			'keyword'
		],

        components: {
			Link,
            AppLayout,
            DivisionTable,
            DivisionSearch,
			AddNote,
        },
    })
</script>
