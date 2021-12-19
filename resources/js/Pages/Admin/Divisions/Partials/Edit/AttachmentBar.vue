<template>
	<span :class="color">
		{{ message }}
	</span>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: ['code'],

        computed: {
            color() {
				const statusColor = [
					'bg-gray-100 text-gray-800', // No File
					'bg-green-100 text-green-800', // Images
					'bg-blue-100 text-blue-800', // Videos
					'bg-yellow-100 text-yellow-800', // Documents
					'bg-red-100 text-red-800', // Other Files
				]

                return 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full ' + statusColor[this.code]
            },
			message() {
				const statusText = [
					'No File',
					'Images',
					'Videos',
					'Documents',
					'Other Files',
				]

				return statusText[this.code]
			}
        }
    })
</script>
