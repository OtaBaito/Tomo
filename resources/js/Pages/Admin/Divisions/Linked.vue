<template>
    <app-layout title="Division">
        <template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Join Division
			</h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div>
					<game-form :divisions="divisions" :games="games" class="mt-10 sm:mt-0" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import GameForm from '@/Pages/Admin/Divisions/Partials/Linked/GameForm.vue'
	import { Link } from '@inertiajs/inertia-vue3'

    export default defineComponent({
		props: {
			'divisions': {
				type: Object
			},
			'games': {
				type: Object
			}
		},

        components: {
            AppLayout,
            GameForm,
			Link,
        },
    })
</script>
