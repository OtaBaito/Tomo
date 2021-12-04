<template>
    <Link :href="'/'">
        <img :src="$page.props.app.url + '/assets/logo.png'"  alt="Tomodachi Emblem" class="block h-36 w-36">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
