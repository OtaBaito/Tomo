<template>
	<div :key="callout.name" class="group relative">
		<div :class="box">
			<img :src="callout.imageSrc" :alt="callout.imageAlt" :class="image" />
		</div>
		<h3 class="mt-6 text-sm text-gray-500">
			<Link :href="callout.href">
				<span class="absolute inset-0" />
				{{ callout.name }}
			</Link>
		</h3>
		<p class="text-base font-semibold text-gray-900">{{ callout.description }}</p>
	</div>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
        props: ['callout', 'soon'],

        computed: {
			image() {
				return this.soon ? 'w-full h-full object-center object-cover filter blur-sm grayscale'
				: 'w-full h-full object-center object-cover'
			},

			box() {
				return this.soon ? 'relative w-full h-80 bg-white rounded-lg overflow-hidden sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1'
				: 'relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1'
			},
        }
    })
</script>
