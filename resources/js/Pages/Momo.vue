<template>
    <div>
        <Head title="Momolink" />

        <div class="min-h-screen bg-white">
            <nav>
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col items-center justify-center space-y-2 h-screen">
						<a :href="route('home')">
							<div class="flex">
	                            <!-- Logo -->
	                            <div class="flex-shrink-0 flex items-center">
	                                <img src="assets/logo.png" class="block h-36 w-36" alt="Tomodachi Emblem">
	                            </div>
	                        </div>

							<div class="text-3xl font-decorative font-extrabold tracking-tight text-gray-900 sm:text-4xl">
								Momolink
							</div>
						</a>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
				<div class="absolute bottom-0 w-full p-4 flex justify-center items-center gap-x-4">
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

    export default defineComponent({
        components: {
            Head,
        },
    })
</script>
