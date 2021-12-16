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
					'bg-gray-100 text-gray-800', // Mobile
					'bg-green-100 text-green-800', // Desktop
					'bg-blue-100 text-blue-800', // Console
					'bg-yellow-100 text-yellow-800', // Arcade
					'bg-red-100 text-red-800', // Board
				]

                return 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full ' + statusColor[this.code]
            },
			message() {
				const statusText = [
					'Mobile',
					'Desktop',
					'Console',
					'Arcade',
					'Board',
				]

				return statusText[this.code]
			}
        }
    })
</script>
