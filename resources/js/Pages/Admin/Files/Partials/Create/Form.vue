<template>
    <wide-form @submitted="uploadFiles">
        <template #form>
			<!-- Upload File -->
			<div class="px-4 py-5 bg-white space-y-6 sm:p-6 col-span-6 sm:overflow-hidden">
				<div>
					<div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed rounded-md w-full"
						:class="[activeClass]"
						v-cloak
						@drop.prevent="attachFile"
						@dragover.prevent
						@dragenter.prevent="dragoverFile"
						@dragleave.prevent="dragoverFileStop">
						<div class="space-y-1 text-center">
							<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
								<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
							<div class="flex text-sm text-gray-600" >
								<label for="attachment" class="relative cursor-pointer bg-white rounded-md font-medium text-red-600 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
									<span>Upload a file</span>
									<input id="attachment" ref="attachment" @change="uploadFiles" name="attachment" type="file" class="sr-only" />
								</label>
								<p class="pl-1">or drag and drop</p>
							</div>
							<p class="text-xs text-gray-500">
								PNG, JPG, GIF up to 5MB
							</p>
						</div>
					</div>
				</div>
			</div>
        </template>
    </wide-form>
</template>

<script>
    import { defineComponent } from 'vue'
    import WideForm from '@/Jetstream/WideForm.vue'
	import { Link } from '@inertiajs/inertia-vue3'

    export default defineComponent({
        components: {
            WideForm,
			Link,
        },

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'POST',
					attachment: null,
                }),

				activeClass: 'border-gray-300',
            }
        },

        methods: {
			upload() {
				this.form.post(route('attachment.upload'), {
                    errorBag: 'uploadFiles',
                    preserveScroll: true,
                });
			},

			uploadFiles() {
				if (this.$refs.attachment) {
                    this.form.attachment = this.$refs.attachment.files[0]
                }

                this.upload()
            },

			attachFile(e) {
				this.dragoverFileStop();

				let droppedFiles = e.dataTransfer.files;
				if(!droppedFiles) return;

				// this tip, convert FileList to array
				// credit: https://www.smashingmagazine.com/2018/01/drag-drop-file-uploader-vanilla-js/

				([...droppedFiles]).forEach(f => {
					this.form.attachment = f;
				});

				this.upload()
			},

			dragoverFile (e) {
				this.activeClass = 'border-gray-100'
			},
			dragoverFileStop (e) {
				this.activeClass = 'border-gray-300'
			},

			selectNewAttachment() {
                this.$refs.attachment.click();
            },
        },
    })
</script>
