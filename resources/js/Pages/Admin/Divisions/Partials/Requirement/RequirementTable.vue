<template>
	<div class="flex flex-col">
		<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
			<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
				<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
					<table class="min-w-full divide-y divide-gray-200">
						<thead class="bg-gray-50">
							<tr>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Name
								</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Eligibility
								</th>
								<th scope="col" class="relative px-6 py-3">
									<span class="sr-only">Edit</span>
								</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200">
							<tr v-for="link in gamelink" :key="link.division.name" colonstyle="inlineBgImage(link.division.cover_photo_url)" >
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="flex items-center">
										<div class="flex-shrink-0 h-10 w-10">
											<img class="h-10 w-auto" :src="link.division.cover_photo_url" v-if="link.division.cover_photo_url" alt="" />
											<PuzzleIcon v-else class="h-auto w-8 text-gray-500" />
										</div>
										<div class="ml-4">
											<div class="text-sm font-medium text-gray-900">
												{{ link.division.name }}
											</div>
											<div class="text-sm text-gray-500">
												{{ platform[link.division.platform] }}
											</div>
										</div>
									</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">Applied on {{ formatDate(link.created_at) }}</div>
									<div class="text-sm text-gray-500">
										<div class="flex items-center space-x-2">
											<span class="bg-green-500 w-4 h-4 rounded-full p-px">
												<CheckIcon class="text-white" />
											</span>
											<span>Profile Screenshot</span>
										</div>
									</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
									<Link :href="route('admin.division.fullfil', link.id)" class="text-gray-600 hover:text-gray-900 flex justify-end">
										<ChevronRightIcon class="h-5 w-5" />
									</Link>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { defineComponent } from 'vue'
	import { CheckIcon, ChevronRightIcon, PuzzleIcon } from '@heroicons/vue/solid'
	import { Link } from '@inertiajs/inertia-vue3'
	import moment from 'moment'

	const platform = [
		'Mobile',
		'Desktop',
		'Console',
		'Arcade',
		'Board',
	]

	export default defineComponent({
		components: {
			CheckIcon,
			ChevronRightIcon,
			PuzzleIcon,
			Link,
        },
		props: {
			gamelink: Object,
		},
		methods: {
			formatDate(str) {
				return moment(str).format('MMMM DD, YYYY')
			},

			inlineBgImage(src) {
				return {
					backgroundImage: `url("${src}")`,
					backgroundSize: 'contain',
					backgroundRepeat: 'no-repeat',
				}
			},
		},
		setup() {
			return {
				platform,
			}
		},
	})
</script>
