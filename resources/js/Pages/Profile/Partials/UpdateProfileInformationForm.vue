<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title>
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div class="col-span-6 sm:col-span-4" v-if="$page.props.jetstream.managesProfilePhotos">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            ref="photo"
                            @change="updatePhotoPreview">

                <jet-label for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div class="mt-2" v-show="! photoPreview">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" v-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          :style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <jet-secondary-button class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                    Select A New Photo
                </jet-secondary-button>

                <jet-secondary-button type="button" class="mt-2" @click.prevent="deletePhoto" v-if="user.profile_photo_path">
                    Remove Photo
                </jet-secondary-button>

                <jet-input-error :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Full Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>

			<!-- Gender -->
			<div class="col-span-6 sm:col-span-2">
                <jet-label for="gender" value="Gender" />
				<v-select id="gender" v-model="form.gender" :reduce="genders => genders.id" class="mt-1 block w-full border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm text-base" :options="genders" :clearable="false"></v-select>
				<jet-input-error :message="form.errors.gender" class="mt-2" />
            </div>

			<!-- Phone -->
			<div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Phone" />
                <jet-input @keypress="isNumber($event)" id="phone" type="tel" class="mt-1 block w-full" v-model="form.phone" required />
				<jet-input-error :message="form.errors.phone" class="mt-2" />
            </div>

			<!-- Location -->
			<div class="col-span-6 sm:col-span-2">
                <jet-label for="location" value="Location" />
				<v-select id="location" v-model="form.location" :reduce="locations => locations.id" class="mt-1 block w-full border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm text-base" :options="locations" :clearable="false"></v-select>
				<jet-input-error :message="form.errors.location" class="mt-2" />
            </div>

			<!-- Nickname -->
			<div class="col-span-6 sm:col-span-4">
                <jet-label for="nick" value="Nickname" />
                <jet-input id="nick" type="text" class="mt-1 block w-full" v-model="form.nick" />
				<jet-input-error :message="form.errors.nick" class="mt-2" />
            </div>

			<!-- Birthday -->
			<div class="col-span-6 sm:col-span-2">
                <jet-label for="birthday" value="Birthdate" />
                <jet-input id="birthday" type="date" class="mt-1 block w-full" v-model="form.birthday" />
				<jet-input-error :message="form.errors.birthday" class="mt-2" />
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
					nick: this.user.nickname,
					gender: this.user.gender,
					birthday: this.user.birthday,
					location: this.user.location,
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
