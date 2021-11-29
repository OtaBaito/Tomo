<template>
	<landing-layout title="Events">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="max-w-2xl mx-auto py-4 sm:py-6 lg:py-8 lg:max-w-none">
				<div class="space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
					<event-box v-for="callout in callouts" :callout="callout" :soon="callout.soon" />
				</div>
			</div>
		</div>
	</landing-layout>
</template>

<script>
import { defineComponent } from 'vue'
import LandingLayout from '@/Layouts/LandingLayout.vue'
import EventBox from '@/Pages/Landing/Partials/EventBox.vue'

export default defineComponent({
	components: {
		LandingLayout,
		EventBox,
	},

	props: {
		callouts: Object
	},
})
</script>
