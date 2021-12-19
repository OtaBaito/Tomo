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
					'bg-gray-100 text-gray-800', // Optional
					'bg-red-100 text-red-800', // Required
				]

                return 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full ' + statusColor[this.code]
            },
			message() {
				const statusText = [
					'Optional',
					'Required',
				]

				return statusText[this.code]
			}
        }
    })
</script>
