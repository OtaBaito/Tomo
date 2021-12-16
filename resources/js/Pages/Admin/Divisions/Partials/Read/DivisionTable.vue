<template>
	<div class="flex flex-col">
		<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
			<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
				<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
					<table class="min-w-full divide-y divide-gray-200" @search="updateDivision(keyword)">
						<thead class="bg-gray-50">
							<tr>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Name
								</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Leader
								</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Platform
								</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Registered
								</th>
								<th scope="col" class="relative px-6 py-3">
									<span class="sr-only">Edit</span>
								</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200">
							<tr v-for="game in divisions.data" :key="game.id">
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="flex items-center">
										<div class="flex-shrink-0 h-12 w-10">
											<img class="h-12 w-10 rounded-lg object-cover" v-if="game.cover_photo_url" :src="game.cover_photo_url" alt="" />
											<span class="flex justify-center items-center inline-block h-12 w-10 rounded-lg overflow-hidden bg-gray-100" v-if="!game.cover_photo_url">
												<PhotographIcon class="h-6 w-6 text-gray-300" />
											</span>
										</div>
										<div class="ml-4">
											<div class="text-sm font-medium text-gray-900">
												{{ game.name }}
											</div>
											<div class="text-sm text-gray-500">
												{{ game.publisher }}
											</div>
										</div>
									</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div v-if="game.leader" class="text-sm text-gray-900">
										{{ game.leader.name }}
									</div>
									<div v-else class="text-sm text-gray-500 italic">
										Vacant
									</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<platform-bar :code="game.platform">{{ game.platform }}</platform-bar>
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
									{{ formatDate(game.created_at) }}
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
									<Link :href="route('admin.division.edit', game.id)" class="text-red-600 hover:text-red-900">Edit</Link>
								</td>
							</tr>
						</tbody>
					</table>
					<pagination :links="divisions" />
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { defineComponent } from 'vue'
	import Pagination from '@/Components/Pagination'
	import PlatformBar from '@/Pages/Admin/Divisions/Partials/Read/PlatformBar.vue'
	import pickBy from 'lodash/pickBy'
	import { Link } from '@inertiajs/inertia-vue3'
	import { PhotographIcon } from '@heroicons/vue/solid'

	import moment from 'moment'

	export default defineComponent({
		components: {
			Pagination,
			PlatformBar,
			Link,
			PhotographIcon,
		},
		props: [
			'divisions',
			'product',
		],
		methods: {
			updateDivision(keyword) {
				this.$inertia.get(route('admin.division.list'), keyword, { preserveState: true })
			},
			formatDate(date) {
				return moment(String(date)).format('MM-DD-YYYY')
			},
			calculateAsset(products) {
				let total = []

				Object.entries(products).forEach(([key, v]) => {
					total.push(Number(v.price))
				})

				return total.reduce( function (x, y) { return x + y }, 0 )
			},
			formatCurrency(price) {
				const formatter = new Intl.NumberFormat('en-US', {
					style: 'currency',
					currency: 'IDR',
					minimumFractionDigits: 2
				})

				return formatter.format(price)
			},
		},
	})
</script>
