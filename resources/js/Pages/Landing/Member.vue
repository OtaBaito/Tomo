<template>
	<landing-layout title="Member">
		<div class="relative bg-white overflow-hidden">
			<div class="pt-16 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48">
				<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 sm:static">
					<div class="sm:max-w-lg">
						<span v-if="$page.props.user">
							<h1 class="text-4xl font font-extrabold tracking-tight text-gray-900 sm:text-6xl">
								Ready to be the one of us?
							</h1>
							<p class="mt-4 text-xl text-gray-500">This year, we gather more gamers with kind of different expertise and we could said our power is not enough just on quality, we need to fill the gap and that is why we would like to invite you come with us.</p>
						</span>
						<span v-else>
							<h1 class="text-4xl font font-extrabold tracking-tight text-gray-900 sm:text-6xl">
								Ready to advance more?
							</h1>
							<p class="mt-4 text-xl text-gray-500">Prove you are ready with digitalization, community gaming experiences was never this easy before.</p>
						</span>
					</div>
					<div>
						<div class="mt-10">
							<!-- Decorative image grid -->
							<div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:max-w-7xl lg:mx-auto lg:w-full">
								<div class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
									<div class="flex items-center space-x-6 lg:space-x-8">
										<div class="flex-shrink-0 grid grid-cols-1 gap-y-6 lg:gap-y-8">
											<div class="w-44 h-64 rounded-lg overflow-hidden sm:opacity-0 lg:opacity-100">
												<img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-01.jpg" alt="" class="w-full h-full object-center object-cover" />
											</div>
											<div class="w-44 h-64 rounded-lg overflow-hidden">
												<img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-02.jpg" alt="" class="w-full h-full object-center object-cover" />
											</div>
										</div>
										<div class="flex-shrink-0 grid grid-cols-1 gap-y-6 lg:gap-y-8">
											<div class="w-44 h-64 rounded-lg overflow-hidden">
												<img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-03.jpg" alt="" class="w-full h-full object-center object-cover" />
											</div>
											<div class="w-44 h-64 rounded-lg overflow-hidden">
												<img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-04.jpg" alt="" class="w-full h-full object-center object-cover" />
											</div>
											<div class="w-44 h-64 rounded-lg overflow-hidden">
												<img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-05.jpg" alt="" class="w-full h-full object-center object-cover" />
											</div>
										</div>
										<div class="flex-shrink-0 grid grid-cols-1 gap-y-6 lg:gap-y-8">
											<div class="w-44 h-64 rounded-lg overflow-hidden">
												<img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-06.jpg" alt="" class="w-full h-full object-center object-cover" />
											</div>
											<div class="w-44 h-64 rounded-lg overflow-hidden">
												<img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-07.jpg" alt="" class="w-full h-full object-center object-cover" />
											</div>
										</div>
									</div>
								</div>
							</div>

							<Link v-if="$page.props.user" :href="route('dashboard')" class="inline-block text-center bg-red-600 border border-transparent rounded-md py-3 px-8 font-medium text-white hover:bg-red-700">Dashboard</Link>
							<Link v-else :href="route('register')" class="inline-block text-center bg-red-600 border border-transparent rounded-md py-3 px-8 font-medium text-white hover:bg-red-700">Join us</Link>
						</div>
					</div>
				</div>
			</div>
		</div>
	</landing-layout>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';
import LandingLayout from '@/Layouts/LandingLayout.vue'

export default defineComponent({
	components: {
		Link,
		LandingLayout,
	},
})
</script>
