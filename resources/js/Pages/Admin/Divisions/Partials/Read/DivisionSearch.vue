<template>
	<div>
		<div class="flex items-center w-full justify-between mb-2 px-2">
			<div class="relative rounded-md shadow-sm w-1/2">
				<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
					<span class="text-gray-500">
						<search-icon class="h-4 sm:h-3.5 w-4 sm:w-3.5" />
					</span>
				</div>
				<form v-on:submit.prevent="searchDivision">
					<input type="text" v-model="ckey" @keyup="searchDivision" name="division-search" id="division-search" class="focus:ring-red-500 focus:border-red-500 block w-full pl-9 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Search" />
				</form>
			</div>
			<div>
				<Link :href="route('admin.division.add')">
					<jet-button>
						Create
					</jet-button>
				</Link>
			</div>
		</div>
	</div>
</template>

<script>
	import { defineComponent } from 'vue'
	import { SearchIcon } from '@heroicons/vue/solid'
	import JetButton from '@/Jetstream/Button.vue'
	import { Link } from '@inertiajs/inertia-vue3'

	export default defineComponent({
		emits: ['search'],

		components: {
			SearchIcon,
			JetButton,
			Link,
		},
		props: {
			serverKeyword: Object
		},
		data() {
			return {
				ckey: this.serverKeyword,
			}
		},
		methods: {
			searchDivision() {
				const keyword = this.ckey

				this.$emit('search', { keyword })
			}
		}
	})
</script>
