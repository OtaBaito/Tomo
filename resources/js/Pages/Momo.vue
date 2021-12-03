<template>
    <div>
        <Head title="Momolink" />

        <div class="min-h-screen bg-white">
            <nav>
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col items-center space-y-4 w-full">
						<div class="flex mt-4">
							<!-- Logo -->
							<div class="flex-shrink-0 flex items-center">
								<img src="assets/logo.png" class="block h-36 w-36" alt="Tomodachi Emblem">
							</div>
						</div>

						<div class="text-3xl font-decorative font-extrabold tracking-tight text-gray-900 sm:text-4xl">
							Tomo Peaches
						</div>

						<div class="flex gap-x-2">
							<a target="_blank" href="mailto:friends@tomo.or.id" class="flex group">
								<div class="mt-1 text-sm text-gray-400 group-hover:text-red-400">
									<MailIcon class="h-7 w-7"/>
								</div>
							</a>

							<a target="_blank" href="https://www.instagram.com/tomodachi.clan/" class="flex group">
								<div class="mt-1 text-sm text-gray-400 group-hover:text-red-400">
									<Instagram class="h-7 w-7"/>
								</div>
							</a>
						</div>

						<div v-for="category in categories" class="flex flex-col items-center w-full md:w-1/2 pt-7 gap-y-7">
							<div class="w-full">
								<h2 class="text-xl text-center mb-2 font-bold font-decorative">{{ category.name }}</h2>

								<div class="w-full">
									<div v-for="link in category.links" class="rounded-md shadow w-full my-2 flex">
										<Link :href="link.url" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-md text-white bg-red-600 hover:bg-red-700 md:py-4 md:text-lg md:px-10">
											{{ link.name }}
										</Link>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
				<div class="bottom-0 w-full p-4 flex justify-center items-center gap-x-4">
					<div class="text-lg font-medium tracking-tight text-gray-900 sm:text-xl">
						Developed and supported by
					</div>

					<!-- OtaByte Logo -->
					<div class="flex-shrink-0 flex items-center">
						<a href="https://otabyte.net/">
							<img src="assets/otabyte.png" class="block h-14 w-auto" alt="Otabyte Logo">
						</a>
					</div>
				</div>
            </main>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head } from '@inertiajs/inertia-vue3';
	import { MailIcon } from '@heroicons/vue/solid'
	import Instagram from '@/Assets/Icons/Instagram.vue'

    export default defineComponent({
        components: {
            Head,
			MailIcon,
			Instagram,
        },

		props: {
			categories: Object,
		},
    })
</script>
