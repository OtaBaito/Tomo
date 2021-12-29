<template>
	<div class="bg-yellow-50 overflow-hidden sm:rounded-lg">
		<div class="flex flex-col lg:flex-row-reverse h-full lg:h-96 justify-center">
			<img src="assets/mascot.webp" class="object-cover object-top mx-auto lg:mx-0 block h-auto w-96" alt="Tomodachi Mascot">
			<div class="bg-gradient-to-t from-yellow-50 via-yellow-50 py-4 lg:py-0 h-full -mt-96 lg:mt-0 flex flex-col justify-center text-center lg:text-left">
				<h1 class="font-decorative text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">Are you worthy player?</h1>
				<p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
					<slot></slot>
				</p>
				<div class="mt-5 sm:mt-8 flex justify-center lg:justify-start">
					<div class="rounded-md shadow">
						<Link :href="primary" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 md:py-4 md:text-lg md:px-10">
					        Accept challenge
					    </Link>
					</div>
					<div class="ml-3">
						<Link :href="secondary" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 md:py-4 md:text-lg md:px-10">
					        Learn more
					    </Link>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
        props: ['primary', 'secondary'],
    })
</script>
