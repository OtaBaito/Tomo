<template>
	<div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
		<div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
			<div v-for="attachment in gallery" :key="attachment.id" class="group relative bg-white p-4 sm:rounded-md">
				<div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 sm:rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
					<img v-if="attachment.type == 1" :src="attachment.file_url" :alt="attachment.imageAlt" class="w-full h-full object-center object-cover lg:w-full lg:h-full" />
					<div v-if="attachment.type == 2" class="flex items-center justify-center min-h-full w-full">
						<FilmIcon  class="h-20 w-20 text-gray-800" />
					</div>
					<div v-else class="flex items-center justify-center min-h-full w-full">
						<DocumentTextIcon  class="h-20 w-20 text-gray-800" />
					</div>
				</div>
				<div class="mt-4 flex justify-between">
					<div>
						<h3 class="text-sm text-gray-700">
							<a :href="attachment.href">
								<span aria-hidden="true" class="absolute inset-0" />
								{{ attachment.title }}
							</a>
						</h3>
						<p class="mt-1 text-sm text-gray-500">{{ filetype(attachment.type) }}</p>
					</div>
					<p class="text-sm font-medium text-gray-900">
						<jet-dropdown align="right" width="48">
							<template #trigger>
								<div class="hover:bg-gray-100 p-2 rounded-lg">
									<DotsVerticalIcon class="h-4 w-4 text-gray-900" />
								</div>
							</template>

							<template #content>
								<!-- Attachment Management -->
								<div class="block px-4 py-2 text-xs text-gray-400">
									Manage {{ attachment.title }}
								</div>

								<jet-dropdown-link :href="route('profile.show')">
									Edit Attachment
								</jet-dropdown-link>

								<jet-dropdown-link :href="route('admin.division.link')">
									Delete Attachment
								</jet-dropdown-link>
							</template>
						</jet-dropdown>
					</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    import { defineComponent } from 'vue'
    import { DocumentTextIcon, FilmIcon, DotsVerticalIcon } from '@heroicons/vue/solid'
	import { Link } from '@inertiajs/inertia-vue3'
	import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'

    export default defineComponent({
        components: {
            DocumentTextIcon,
			FilmIcon,
			DotsVerticalIcon,
			Link,
			JetDropdown,
			JetDropdownLink,
        },

		props: {
			gallery: Object
		},

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'POST',
					attachment: null,
                }),

				activeClass: 'border-gray-300',
            }
        },

        methods: {
			filetype(type) {
				const filetype = [
					'No File',
					'Images',
					'Videos',
					'Documents',
					'Other Files',
				]
				return filetype[type]
            },
        },
    })
</script>
