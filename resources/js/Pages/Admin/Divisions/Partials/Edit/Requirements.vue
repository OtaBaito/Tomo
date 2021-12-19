<template>
    <jet-form-section @submitted="updateDivisionRequirement">
        <template #title>
            Division Requirements
        </template>

        <template #description>
            Add additional requirements for member before join a division.
        </template>

        <template #form>
			<!-- Title -->
			<div class="col-span-6 sm:col-span-3">
				<jet-label for="title" value="Title" />
				<jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="title" />
				<jet-input-error :message="form.errors.title" class="mt-2" />
			</div>

			<!-- Description -->
			<div class="col-span-6 sm:col-span-3">
				<jet-label for="description" value="Description" />
				<jet-input id="description" type="text" class="mt-1 block w-full" v-model="form.description" autocomplete="description" />
				<jet-input-error :message="form.errors.description" class="mt-2" />
			</div>

			<!-- Attachment Media -->
			<div class="col-span-6 sm:col-span-3">
                <jet-label for="attachment" value="Attachment Media" />
				<v-select id="attachment" v-model="form.attachment" :reduce="attachments => attachments.id" class="mt-1 block w-full border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm text-base" :options="attachments" :clearable="false"></v-select>
				<jet-input-error :message="form.errors.attachment" class="mt-2" />
            </div>

			<!-- Mandate -->
			<div class="col-span-6 sm:col-span-3">
                <jet-label for="mandate" value="Mandate" />
				<v-select id="mandate" v-model="form.mandate" :reduce="mandates => mandates.id" class="mt-1 block w-full border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm text-base" :options="mandates" :clearable="false"></v-select>
				<jet-input-error :message="form.errors.mandate" class="mt-2" />
            </div>
        </template>

		<template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Added.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Add
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetConfirmsPassword from '@/Jetstream/ConfirmsPassword.vue'
    import JetDangerButton from '@/Jetstream/DangerButton.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
	import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
	import vSelect from 'vue-select'

    export default defineComponent({
        components: {
            JetFormSection,
            JetButton,
            JetConfirmsPassword,
            JetDangerButton,
            JetSecondaryButton,
			JetInput,
			JetInputError,
			JetLabel,
			JetActionMessage,
			vSelect,
        },

		props: {
			division: Object,
		},

        data() {
            return {
                enabling: false,
                disabling: false,

                qrCode: null,
                recoveryCodes: [],

				form: this.$inertia.form({
                    _method: 'PUT',
                    id: this.division.id,
					title: null,
					description: null,
					attachment: false,
					mandate: false,
                }),

				attachments: [
					{
						id: 0,
						label: 'No attachment',
					},
					{
						id: 1,
						label: 'Images / Pictures',
					},
					{
						id: 2,
						label: 'Videos',
					},
					{
						id: 3,
						label: 'Documents',
					},
					{
						id: 4,
						label: 'Et cetera',
					},
				],

				mandates: [
					{
						id: 0,
						label: 'Optional',
					},
					{
						id: 1,
						label: 'Yes',
					},
				],
            }
        },

        methods: {
			updateDivisionRequirement() {
                this.form.put(route('admin.division.requirement', this.form.id), {
                    errorBag: 'updateDivisionRequirement',
                    preserveScroll: true,
                });
            },
        },
    })
</script>
