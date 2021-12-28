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
									{ 0 / 4 } Requirements Fullfiled
								</div>
								<div class="fullfiled even this page would be auto hidden by system">
									Requirements Fullfiled
								</div>
								<div class="when no requirement">
									No Requirements
								</div>
							</div>

							<div>
								<jet-dropdown align="right" width="48">
									<template #trigger>
										<div class="hover:bg-gray-100 p-2 rounded-lg">
											<DotsVerticalIcon class="h-4 w-4 text-gray-500" />
										</div>
									</template>

									<template #content>
										<!-- Account Management -->
										<div class="block px-4 py-2 text-xs text-gray-400">
											Manage Account
										</div>

										<jet-dropdown-link :href="route('profile.show')">
											Complete Requirements
										</jet-dropdown-link>

										<jet-dropdown-link :href="route('admin.division.link')">
											Leave Division
										</jet-dropdown-link>


										<div class="border-t border-gray-100"></div>

									</template>
								</jet-dropdown>
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
	import { PhotographIcon, DotsVerticalIcon } from '@heroicons/vue/solid'
	import PlatformBar from '@/Pages/Admin/Divisions/Partials/Read/PlatformBar.vue'
	import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'

    export default defineComponent({
        components: {
            AppLayout,
			JetSectionBorder,
			Link,
			PhotographIcon,
			DotsVerticalIcon,
			PlatformBar,
			JetDropdown,
			JetDropdownLink,
        },
		props: {
			divisions: Object,
		}
    })
</script>
