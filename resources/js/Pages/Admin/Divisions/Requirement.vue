<template>
    <app-layout title="Divisions">
        <template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Division Requirements
			</h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
					<div class="col-span-6 space-y-6" v-if="divisions.length > 0">
		                <div class="flex items-center justify-between" v-for="(division, id) in divisions" :key="id">
		                    <div class="flex items-center">
								<div class="flex-shrink-0 h-12 w-10">
									<img class="h-12 w-10 rounded-lg object-cover" v-if="division.cover_photo_url" :src="division.cover_photo_url" alt="" />
									<span class="flex justify-center items-center inline-block h-12 w-10 rounded-lg overflow-hidden bg-gray-100" v-if="!division.cover_photo_url">
										<PhotographIcon class="h-6 w-6 text-gray-300" />
									</span>
								</div>

			                    <div class="ml-3">
			                        <div class="text-sm text-gray-600">
			                            {{ division.name }}
			                        </div>

			                        <div>
			                            <div class="text-xs text-gray-500">
											<platform-bar :code="division.platform">
												{{ division.platform }}
											</platform-bar> {{ division.publisher }}
			                            </div>
			                        </div>
			                    </div>
		                    </div>

							<div class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
								<div class="normal">
									<div class="flex items-center space-x-4">
										<span class="bg-red-500 w-3 h-3 rounded-full -mx-[3px] p-px">
											<CheckIcon class="text-white" />
										</span>
										<span>Profile Screenshot</span>
									</div>
									<div class="flex items-center space-x-4">
										<span class="bg-red-500 w-1.5 h-1.5 rounded-full ring ring-red-200"></span>
										<span>Score Screenshot</span>
									</div>
									<div class="flex items-center space-x-4">
										<span class="bg-gray-200 w-1.5 h-1.5 rounded-full"></span>
										<span>Win Rate Screenshot</span>
									</div>
									<div class="flex items-center space-x-4">
										<span class="bg-gray-200 w-1.5 h-1.5 rounded-full"></span>
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
		                </div>
		            </div>
					<div v-else class="flex justify-center items-center text-gray-500">
						You are not joined on any <a target="_blank" :href="route('admin.division.link')" class="underline text-gray-600 hover:text-gray-900">division</a>.
					</div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
	import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
	import { Link } from '@inertiajs/inertia-vue3'
	import { PhotographIcon, DotsVerticalIcon, CheckIcon } from '@heroicons/vue/solid'
	import PlatformBar from '@/Pages/Admin/Divisions/Partials/Read/PlatformBar.vue'

    export default defineComponent({
        components: {
            AppLayout,
			JetSectionBorder,
			Link,
			PhotographIcon,
			DotsVerticalIcon,
			CheckIcon,
			PlatformBar,
        },
		props: {
			divisions: Object,
		}
    })
</script>
