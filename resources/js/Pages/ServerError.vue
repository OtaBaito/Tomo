<template>
	<div>
        <Head :title="title" />

        <!-- <jet-banner /> -->

        <div class="min-h-screen bg-white">
            <!-- Page Content -->
            <main>
				<div class="h-screen flex justify-center items-end w-screen">
					<div class="font-decorative font-extrabold tracking-tight text-gray-900 lg:w-1/2 my-auto">
						<div class="text-4xl sm:text-5xl">
							{{ tagline }}
						</div>

						<div class="text-xl text-gray-700 font-medium">
							{{ description }}
						</div>

						<div class="w-full flex items-center gap-x-4">
							<div class="text-lg font-medium tracking-tight sm:text-xl">
								Developed and supported by
							</div>

							<!-- OtaByte Logo -->
							<div class="flex-shrink-0 flex items-center">
								<a href="https://otabyte.net/">
									<img src="/assets/otabyte.webp" class="block h-14 w-auto" alt="Otabyte Logo">
								</a>
							</div>
						</div>
					</div>

					<img src="/assets/surprised.webp" class="hidden lg:block w-96 h-auto" alt="Otabyte Logo">
				</div>
            </main>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
	import LandingLayout from '@/Layouts/LandingLayout.vue'
	import { Head } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
			LandingLayout,
			Head,
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
			tagline() {
				return {
					503: 'Maintenance',
					500: 'Server Error',
					404: 'We not know what you\'re looking for.',
					403: 'Shalt thou access this page.',
					419: 'This page expired, wait a couple minute for new batch.',
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
