<template>
    <jet-action-section>
        <template #title>
            Delete Division
        </template>

        <template #description>
            Permanently delete your division.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Once your division is deleted, all of its resources and data will be permanently deleted (owned products would be destroyed). Before deleting your division, please download any data or information that you wish to retain.
            </div>

            <div class="mt-5">
                <jet-danger-button @click="confirmDivisionDeletion">
                    Delete Division
                </jet-danger-button>
            </div>

            <!-- Delete Division Confirmation Modal -->
            <jet-dialog-modal :show="confirmingDivisionDeletion" @close="closeModal">
                <template #title>
                    Delete Division
                </template>

                <template #content>
                    Are you sure you want to delete your division? Once your division is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your division.
                </template>

                <template #footer>
                    <jet-secondary-button @click="closeModal">
                        Cancel
                    </jet-secondary-button>

                    <jet-danger-button class="ml-2" @click="deleteDivision" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Delete Division
                    </jet-danger-button>
                </template>
            </jet-dialog-modal>
        </template>
    </jet-action-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetActionSection from '@/Jetstream/ActionSection.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetDangerButton from '@/Jetstream/DangerButton.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

    export default defineComponent({
        components: {
            JetActionSection,
            JetDangerButton,
            JetDialogModal,
            JetSecondaryButton,
        },

		props: {
			division: Object
		},

        data() {
            return {
                confirmingDivisionDeletion: false,

                form: this.$inertia.form({
					id: this.division.id,
                })
            }
        },

        methods: {
            confirmDivisionDeletion() {
                this.confirmingDivisionDeletion = true;
            },

            deleteDivision() {
                this.form.delete(route('admin.division.destroy', this.form.id), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onFinish: () => this.form.reset(),
                })
            },

            closeModal() {
                this.confirmingDivisionDeletion = false
                this.form.reset()
            },
        },
    })
</script>
