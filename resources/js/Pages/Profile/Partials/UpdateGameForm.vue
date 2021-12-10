<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title>
            Games Division
        </template>

        <template #description>
            Add an title you played
        </template>

        <template #form>
			<!-- Add Playing Game -->
            <div class="col-span-6 sm:col-span-5">
                <jet-label for="game" value="Game" />
                <v-select id="game" v-model="form.game" :reduce="games => games.id" class="mt-1 block w-full border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm text-base" :options="games" :clearable="false"></v-select>
                <jet-input-error :message="form.errors.game" class="mt-2" />
            </div>

			<div class="col-span-6 sm:col-span-1 flex items-center justify-end">
				<jet-action-message :on="form.recentlySuccessful" class="mr-3">
	                Added.
	            </jet-action-message>

	            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
	                Add
	            </jet-button>
			</div>

			<!-- Games Title List -->
			<div class="col-span-6 mt-5 space-y-6">
                <div class="flex items-center justify-between" v-for="(session, id) in games" :key="id">
                    <div class="flex items-center">
						<div>
	                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500" v-if="session.agent.is_desktop">
	                            <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
	                        </svg>

	                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500" v-else>
	                            <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
	                        </svg>
	                    </div>

	                    <div class="ml-3">
	                        <div class="text-sm text-gray-600">
	                            {{ session.label }}
	                        </div>

	                        <div>
	                            <div class="text-xs text-gray-500">
	                                {{ session.agent.platform }}, {{ session.agent.publisher }}
	                            </div>
	                        </div>
	                    </div>
                    </div>

					<div>
						<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
						</svg>
					</div>
                </div>
            </div>
        </template>
    </jet-form-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
	import vSelect from 'vue-select'

    export default defineComponent({
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
			vSelect,
        },

        props: {
			'user': {
				type: Object,
			},
			'locations': {
				type: Object,
			},
		},

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    name: this.user.name,
                    email: this.user.email,
                    phone: this.user.phone,
                    photo: null,
                }),

                photoPreview: null,

				genders: [
					{
						id: 0,
						label: 'Male'
					},
					{
						id: 1,
						label: 'Female'
					},
					{
						id: 2,
						label: 'Non-binary'
					},
				],

				games: [
					{
						id: 0,
						label: 'Call of Duty: Mobile',
						agent: {
							platform: 'Mobile',
							publisher: 'Steam'
						}
					},
					{
						id: 1,
						label: 'Valoran',
						agent: {
							platform: 'Mobile',
							publisher: 'Steam'
						}
					},
					{
						id: 2,
						label: 'Dota',
						agent: {
							platform: 'Mobile',
							publisher: 'Steam'
						}
					},
				],
            }
        },

        methods: {
            updateProfileInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('user-profile-information.update'), {
                    errorBag: 'updateProfileInformation',
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
                this.$inertia.delete(route('current-user-photo.destroy'), {
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

			isNumber(v) {
				v = (v) ? v : window.event
				var charCode = (v.which) ? v.which : v.keyCode

				if ((charCode > 31 && (charCode < 48 || charCode > 57))) {
					v.preventDefault()
				} else {
					return true
				}
			}
        },
    })
</script>
