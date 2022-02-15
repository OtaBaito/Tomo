<template>
    <app-layout title="Division">
        <template #header>
            <div>
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">
	                Upload Momolink
	            </h2>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div>
					<upload-form />

					<jet-section-border />

					<upload-list :gallery="gallery" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import UploadForm from '@/Pages/Admin/Momolink/Partials/Create/Form.vue'
    import UploadList from '@/Pages/Admin/Momolink/Partials/Create/List.vue'
	import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
	import { Link } from '@inertiajs/inertia-vue3'

    export default defineComponent({
		props: {
			gallery: Object
		},

        components: {
            AppLayout,
            UploadForm,
            UploadList,
			JetSectionBorder,
			Link,
        },
    })
</script>
