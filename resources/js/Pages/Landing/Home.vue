<template>
	<landing-layout title="Home">
		<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <event-banner
					:primary="route('events')"
					:secondary="route('events')">
					This match was not for a mere players.
				</event-banner>
            </div>
        </div>
	</landing-layout>
</template>

<script>
import { defineComponent } from 'vue'
import LandingLayout from '@/Layouts/LandingLayout.vue'
import EventBanner from '@/Pages/Landing/Partials/EventBanner.vue'

export default defineComponent({
	components: {
		LandingLayout,
		EventBanner,
	},
})
</script>
