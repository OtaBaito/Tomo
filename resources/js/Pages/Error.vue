<template>
	<landing-layout :title="title">
		<div class="flex flex-col justify-center items-center">
			<img src="assets/surprised.webp" class="block h-96 w-auto" alt="Yui Surprised">

			<div class="text-2xl font-decorative font-extrabold tracking-tight text-gray-900 sm:text-3xl">
				{{ description }}
			</div>
		</div>

		<div class="absolute bottom-0 w-full p-4 flex justify-center items-center gap-x-4">
			<div class="text-lg font-medium tracking-tight text-gray-900 sm:text-xl">
				Developed and supported by
			</div>

			<!-- OtaByte Logo -->
			<div class="flex-shrink-0 flex items-center">
				<a href="https://otabyte.net/">
					<img src="assets/otabyte.webp" class="block h-14 w-auto" alt="Otabyte Logo">
				</a>
			</div>
		</div>
	</landing-layout>
</template>

<script>
    import { defineComponent } from 'vue'
	import LandingLayout from '@/Layouts/LandingLayout.vue'

    export default defineComponent({
        components: {
			LandingLayout,
        },

		props: {
			status: Number,
		},

		computed: {
			title() {
				return {
					503: '503 Service Unavailable',
					500: '500 Server Error',
					404: '404 Page Not Found',
					403: '403 Forbidden',
					419: '419 Page Expired',
				}[this.status]
			},
			description() {
				return {
					503: 'Sorry, we are doing some maintenance. Please check back soon.',
					500: 'Ah, this is so embarassing when our server error.',
					404: 'We not know what you\'re looking for.',
					403: 'Shalt thou access this page.',
					419: 'This page expired, wait a couple minute for new batch.',
				}[this.status]
			},
		},
    })
</script>
