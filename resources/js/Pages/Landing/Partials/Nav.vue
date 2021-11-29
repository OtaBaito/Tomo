<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active ? 'inline-flex items-center px-4 py-2 font-bold text-xs text-gray-900 uppercase tracking-widest hover:text-gray-700 focus:outline-none focus:text-gray-900 transition'
				: 'inline-flex items-center px-4 py-2 font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-100 active:text-gray-900 focus:outline-none focus:text-gray-900 transition'
            }
        }
    })
</script>
