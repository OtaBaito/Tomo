<template>
    <wide-form @submitted="linkDivision">
        <template #form>
			<!-- Add Playing Game -->
			<div class="col-span-6 sm:col-span-5" v-if="divisions.length > 0">
				<v-select id="game_divisions_id" v-model="form.game_divisions_id" :reduce="divisions => divisions.id" class="mt-1 block w-full border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm text-base" :options="divisions" :clearable="false"></v-select>
				<jet-input-error :message="form.errors.game_divisions_id" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-1 flex items-center justify-end" v-if="divisions.length > 0">
				<jet-action-message :on="form.recentlySuccessful" class="mr-3">
					Added.
				</jet-action-message>

				<jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
					Add
				</jet-button>
			</div>

			<!-- Games Title List -->
			<div class="col-span-6 space-y-6" v-if="games.length > 0">
                <div class="flex items-center justify-between" v-for="(game, id) in games" :key="id">
                    <div class="flex items-center">
						<div class="flex-shrink-0 h-12 w-10">
							<img class="h-12 w-10 rounded-lg object-cover" v-if="game.division.cover_photo_url" :src="game.division.cover_photo_url" alt="" />
							<span class="flex justify-center items-center inline-block h-12 w-10 rounded-lg overflow-hidden bg-gray-100" v-if="!game.division.cover_photo_url">
								<PhotographIcon class="h-6 w-6 text-gray-300" />
							</span>
						</div>

	                    <div class="ml-3">
	                        <div class="text-sm text-gray-600">
	                            {{ game.division.name }}
	                        </div>

	                        <div>
	                            <div class="text-xs text-gray-500">
									<platform-bar :code="game.division.platform">
										{{ game.division.platform }}
									</platform-bar> {{ game.division.publisher }}
	                            </div>
	                        </div>
	                    </div>
                    </div>

					<div @click="confirmDivisionUnlink(game.id)">
						<div class="hover:bg-gray-100 p-2 rounded-lg">
							<LogoutIcon class="h-4 w-4 text-gray-500" />
						</div>
					</div>
                </div>
            </div>

			<!-- Unlink Division Confirmation Modal -->
            <jet-dialog-modal :show="confirmingDivisionUnlink" @close="closeModal">
                <template #title>
                    Unlink
                </template>

                <template #content>
                    Are you sure you want to leave your division? Once your division is unlinked, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently leave your division.
                </template>

                <template #footer>
                    <jet-secondary-button @click="closeModal">
                        Cancel
                    </jet-secondary-button>

                    <jet-danger-button class="ml-2" @click="unlinkDivision" :class="{ 'opacity-25': unlink.processing }" :disabled="unlink.processing">
                        Unlink
                    </jet-danger-button>
                </template>
            </jet-dialog-modal>
        </template>
    </wide-form>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetButton from '@/Jetstream/Button.vue'
    import WideForm from '@/Jetstream/WideForm.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
	import JetActionSection from '@/Jetstream/ActionSection.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetDangerButton from '@/Jetstream/DangerButton.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
	import vSelect from 'vue-select'
	import { Link } from '@inertiajs/inertia-vue3'
	import PlatformBar from '@/Pages/Admin/Divisions/Partials/Read/PlatformBar.vue'
	import { PhotographIcon } from '@heroicons/vue/solid'
	import { LogoutIcon } from '@heroicons/vue/outline'

    export default defineComponent({
        components: {
            JetActionMessage,
			JetActionSection,
            JetDangerButton,
            JetDialogModal,
            JetSecondaryButton,
            JetButton,
            WideForm,
            JetInputError,
			vSelect,
			Link,
			PlatformBar,
			PhotographIcon,
			LogoutIcon,
        },

        props: {
			'divisions': {
				type: Object
			},
			'games': {
				type: Object
			}
		},

        data() {
            return {
				confirmingDivisionUnlink: false,

                form: this.$inertia.form({
                    _method: 'POST',
                    game_divisions_id: (this.divisions.length > 0) ? this.divisions[0].id : null,
                }),

				unlink: this.$inertia.form({
					id: 0,
                })
            }
        },

        methods: {
			confirmDivisionUnlink(id) {
				this.unlink.id = id

                this.confirmingDivisionUnlink = true;
            },

            unlinkDivision() {
                this.unlink.delete(route('admin.division.unlink', this.unlink.id), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onFinish: () => this.unlink.reset(),
                })
            },

            closeModal() {
                this.confirmingDivisionUnlink = false
                this.unlink.reset()
            },

            linkDivision() {
				console.log(this.form);
                this.form.post(route('admin.division.link'), {
                    errorBag: 'linkDivision',
                    preserveScroll: true,
                });
            },
        },
    })
</script>
