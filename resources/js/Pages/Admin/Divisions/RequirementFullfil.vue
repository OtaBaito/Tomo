<template>
    <app-layout title="Divisions">
        <template #header>
			<div class="flex justify-between">
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">
	                Fullfil {{ gamelink.division.name }} Requirement
	            </h2>
				<Link :href="route('admin.division.fill')" class="text-sm text-gray-500 hover:text-gray-600 duration-100 font-bold">Back</Link>
            </div>
        </template>

        <div>
			<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
				<div class="bg-white w-full sm:rounded-lg">
					<div class="flex flex-col">
						<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
							<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
								<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
									<div class="flex">
										<div class="">
											<img class="h-full w-48 object-cover" :src="gamelink.division.cover_photo_url" v-if="gamelink.division.cover_photo_url" alt="" />
											<PuzzleIcon v-else class="h-auto w-8 text-gray-500" />
										</div>
										<div class="flex items-center w-full">
											<RequirementSteps :requirements="gamelink.division.requirements" :progress="gamelink.requirements" />
											<div class="bg-gray-50">
												<div class="flex w-full justify-between items-center">
													<h1 class="font-semibold text-lg text-gray-800 leading-tight">{{ gamelink.division.requirements[0].title }}</h1>
													<span v-if="gamelink.division.requirements[0].mandate" class="font-semibold text-xs text-green-800 bg-green-100 leading-5 rounded-full px-2">Required</span>
													<input :type="gamelink.division.requirements[0].attachment" :name="requirement.id" value="">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		    </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
	import RequirementSteps from '@/Pages/Admin/Divisions/Partials/Requirement/RequirementSteps.vue'
	import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
	import { PuzzleIcon } from '@heroicons/vue/solid'
	import { Link } from '@inertiajs/inertia-vue3'

    export default defineComponent({
        components: {
            AppLayout,
			RequirementSteps,
			JetSectionBorder,
			PuzzleIcon,
			Link,
        },
		props: {
			gamelink: Object,
		}
    })
</script>
