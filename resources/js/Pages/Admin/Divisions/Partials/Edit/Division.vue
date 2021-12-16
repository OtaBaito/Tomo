<template>
	<wide-form @submitted="updateDivisionInformation">
        <template #form>
			<!-- Cover Photo -->
			<div class="col-span-6 sm:row-span-2 sm:col-span-1">
				<!-- Cover Photo File Input -->
                <input type="file" class="hidden"
                            ref="photo"
                            @change="updatePhotoPreview">

				<div class="mt-1 flex flex-col items-center">
					<!-- New Cover Photo Preview -->
	                <div v-show="photoPreview">
	                    <span class="block rounded-lg w-36 h-44 bg-cover bg-no-repeat bg-center"
	                          :style="'background-image: url(\'' + photoPreview + '\');'">
	                    </span>
	                </div>

					<span class="flex justify-center items-center inline-block h-44 w-36 rounded-lg overflow-hidden bg-gray-100" v-show="!photoPreview">
						<PhotographIcon class="h-12 w-12 text-gray-300" />
					</span>

					<button @click.prevent="selectNewPhoto" type="button" class="mt-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
						Upload
					</button>
				</div>

				<jet-input-error :message="form.errors.photo" class="mt-2" />
			</div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="name" value="Game Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

			<!-- Leader -->
			<div class="col-span-6 sm:col-span-2">
                <jet-label for="leader" value="Leader" />
				<v-select id="leader" v-model="form.leader" :reduce="leaders => leaders.id" class="mt-1 block w-full border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm text-base" :options="leaders" :clearable="false"></v-select>
				<jet-input-error :message="form.errors.leader" class="mt-2" />
            </div>

			<!-- Publisher -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="publisher" value="Publisher" />
                <jet-input id="publisher" type="text" class="mt-1 block w-full" v-model="form.publisher" />
                <jet-input-error :message="form.errors.publisher" class="mt-2" />
            </div>

			<!-- Platform -->
			<div class="col-span-6 sm:col-span-2">
                <jet-label for="platform" value="Platform" />
				<v-select id="platform" v-model="form.platform" :reduce="platforms => platforms.id" class="mt-1 block w-full border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm text-base" :options="platforms" :clearable="false"></v-select>
				<jet-input-error :message="form.errors.platform" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </wide-form>
</template>

<script>
	import { defineComponent } from 'vue'
	import JetActionSection from '@/Jetstream/ActionSection.vue'
	import WideForm from '@/Jetstream/WideForm.vue'
	import JetButton from '@/Jetstream/Button.vue'
	import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
	import vSelect from 'vue-select'
	import { PhotographIcon } from '@heroicons/vue/solid'

	export default defineComponent({

		props: {
			'leaders': {
				type: Object
			},
			'division': {
				type: Object
			}
		},

		components: {
			JetActionSection,
			WideForm,
			JetButton,
			JetInput,
			JetInputError,
			JetLabel,
			JetActionMessage,
			vSelect,
			PhotographIcon,
		},

		data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
					photo: null,
                    name: this.division.name,
                    leader: Number.parseInt(this.division.leader),
                    publisher: this.division.publisher,
                    platform: Number.parseInt(this.division.platform),
					_token: this.$page.props.csrf_token,
                }),

                photoPreview: this.division.cover_photo_url,

				platforms: [
					{
						id: 0,
						label: 'Mobile',
					},
					{
						id: 1,
						label: 'Desktop',
					},
					{
						id: 2,
						label: 'Console',
					},
					{
						id: 3,
						label: 'Arcade',
					},
					{
						id: 4,
						label: 'Board',
					},
				],
            }
        },

		methods: {
            updateDivisionInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.put(route('admin.division.edit', this.division.id), {
                    errorBag: 'updateDivisionInformation',
                    preserveScroll: true,
                    onSuccess: () => (this.clearPhotoFileInput()),
                });
            },

            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const photo = this.$refs.photo.files[0];

                if (! photo) return;

                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(photo);
            },

            deletePhoto() {
                this.$inertia.delete(route('admin.division.cover.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.photoPreview = null;
                        this.clearPhotoFileInput();
                    },
                });
            },

            clearPhotoFileInput() {
                if (this.$refs.photo?.value) {
                    this.$refs.photo.value = null;
                }
            },
        },
	})
</script>
