<template>
	<div class="flex flex-col mt-4">
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
									Mandate Status
								</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									File Types
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
							<tr :key="requirement.id" v-for="requirement in division">
								<requirements-item :requirement="requirement" />
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
	import AttachmentBar from '@/Pages/Admin/Divisions/Partials/Edit/AttachmentBar.vue'
	import MandateBar from '@/Pages/Admin/Divisions/Partials/Edit/MandateBar.vue'
	import RequirementsItem from '@/Pages/Admin/Divisions/Partials/Edit/RequirementsItem.vue'
	import pickBy from 'lodash/pickBy'
	import { Link } from '@inertiajs/inertia-vue3'

	import moment from 'moment'

	export default defineComponent({
		components: {
			AttachmentBar,
			MandateBar,
			RequirementsItem,
			Link,
		},
		props: {
			division: Object,
			product: Object,
		},
	})
</script>
