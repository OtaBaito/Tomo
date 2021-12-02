<template>
	<landing-layout title="About">
		<div class="max-w-2xl mx-auto py-12 px-4 grid items-center grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-16 lg:max-w-7xl lg:px-8 lg:grid-cols-2">
			<div>
				<h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">About</h2>
				<p class="mt-4 text-gray-500">
					Gaming isn't just all about fun or entertainment, here we prove about our idea is not just a mere passion, we stand together build a team and prepared for competition.
				</p>

				<dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
					<div v-for="feature in features" :key="feature.name" class="border-t border-gray-200 pt-4">
						<dt class="font-medium text-gray-900">{{ feature.name }}</dt>
						<dd class="mt-2 text-sm text-gray-500">{{ feature.description }}</dd>
					</div>
				</dl>
			</div>
			<div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
				<img src="assets/mascot.png" alt="Tomodachi Mascot." class="bg-gray-100 rounded-lg object-cover object-top" style="width: 280px; height: 280px" />
				<img src="https://tailwindui.com/img/ecommerce-images/product-feature-03-detail-02.jpg" alt="Top down view of walnut card tray with embedded magnets and card groove." class="bg-gray-100 rounded-lg" />
				<img src="https://tailwindui.com/img/ecommerce-images/product-feature-03-detail-04.jpg" alt="Walnut card tray filled with cards and card angled in dedicated groove." class="bg-gray-100 rounded-lg" />
				<img src="https://images.unsplash.com/photo-1548003693-b55d51032288?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="Gaming." class="bg-gray-100 rounded-lg object-cover object-top" style="width: 280px; height: 280px" />
			</div>
		</div>
		<div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
			<h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Our team</h2>

			<div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
				<div v-for="member in members" :key="member.id" class="group relative">
					<div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
						<img :src="member.imageSrc" :alt="member.imageAlt" class="w-full h-full object-center object-cover lg:w-full lg:h-full" />
					</div>
					<div class="mt-4 flex justify-between">
						<div>
							<h3 class="text-sm text-gray-700">
								<a :href="member.href">
									<span aria-hidden="true" class="absolute inset-0" />
									{{ member.name }}
								</a>
							</h3>
							<p class="mt-1 text-sm text-gray-500">{{ member.role }}</p>
						</div>
					</div>
				</div>
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

	props: {
		features: Object,
		members: Object,
	},
})
</script>
