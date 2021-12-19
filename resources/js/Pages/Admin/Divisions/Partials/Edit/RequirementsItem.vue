<template>
	<td class="px-6 py-4 whitespace-nowrap">
		<div class="flex items-center">
			<div class="ml-4">
				<div class="text-sm font-medium text-gray-900">
					{{ requirement.title }}
				</div>
				<div class="text-sm text-gray-500">
					{{ requirement.description }}
				</div>
			</div>
		</div>
	</td>
	<td class="px-6 py-4 whitespace-nowrap">
		<mandate-bar :code="requirement.mandate">{{ requirement.mandate }}</mandate-bar>
	</td>
	<td class="px-6 py-4 whitespace-nowrap">
		<attachment-bar :code="requirement.attachment">{{ requirement.attachment }}</attachment-bar>
	</td>
	<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
		{{ formatDate(requirement.created_at) }}
	</td>
	<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
		<Link method="delete" :href="route('admin.division.unrequire', requirement.id)" class="text-red-600 hover:text-red-900" preserve-scroll>Delete</Link>
	</td>
</template>

<script>
    import { defineComponent } from 'vue'
	import AttachmentBar from '@/Pages/Admin/Divisions/Partials/Edit/AttachmentBar.vue'
	import MandateBar from '@/Pages/Admin/Divisions/Partials/Edit/MandateBar.vue'
	import { Link } from '@inertiajs/inertia-vue3'

	import moment from 'moment'

    export default defineComponent({
        components: {
			AttachmentBar,
			MandateBar,
			Link,
        },

		props: {
			requirement: Object,
		},

        data() {
            return {
				form: this.$inertia.form({
                    _method: 'PUT',
                    id: this.requirement.id,
					title: null,
					description: null,
					attachment: false,
					mandate: false,
                }),
            }
        },

        methods: {
			formatDate(date) {
				return moment(String(date)).format('MM-DD-YYYY')
			},
        },
    })
</script>
