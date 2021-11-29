<template>
	<landing-layout title="Contact">
		<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div>
					<div class="md:grid md:grid-cols-3 md:gap-6">
						<div class="md:col-span-1">
							<div class="px-4 sm:px-0">
								<h3 class="text-lg font-medium leading-6 text-gray-900">Contact</h3>
								<p class="mt-1 text-sm text-gray-600">
									Feel free to get in touch with us, our staff might reply your message.
								</p>
							</div>
							<div class="py-4">
								<a target="_blank" href="mailto:friends@tomo.or.id" class="flex group">
									<div class="mt-1 text-sm text-gray-400 group-hover:text-red-400">
										<MailIcon class="h-5 w-5"/>
									</div>
									<div class="ml-2 mt-1 text-sm text-gray-600 font-semibold group-hover:text-red-600">
										friends@tomo.or.id
									</div>
								</a>
								<a target="_blank" href="https://www.instagram.com/tomodachi.clan/" class="flex group">
									<div class="mt-1 text-sm text-gray-400 group-hover:text-red-400">
										<Instagram class="h-5 w-5"/>
									</div>
									<div class="ml-2 mt-1 text-sm text-gray-600 font-semibold group-hover:text-red-600">
										tomodachi.clan
									</div>
								</a>
							</div>
						</div>

				        <div class="mt-5 md:mt-0 md:col-span-2">
				            <form method="post" @submitted="sendContactForm">
				                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
				                    <div class="grid grid-cols-6 gap-6">
										<!-- Email -->
										<div class="col-span-6 sm:col-span-4">
											<jet-label for="email" value="Email" />
											<jet-input required id="email" type="email" placeholder="friends@tomo.or.id" class="mt-1 block w-full" v-model="form.email" />
											<jet-input-error :message="form.errors.email" class="mt-2" />
										</div>

										<div class="col-span-6">
											<label for="message" class="block text-sm font-medium text-gray-700">
												Message
											</label>
											<div class="mt-1">
												<textarea required id="message" name="message" v-model="form.message" rows="3" class="shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 mt-1 block h-36 w-full sm:text-sm border border-gray-300 rounded-md resize-none" placeholder="My dearest friend, I wanted to befriend with you . . ." />
											</div>
											<p class="mt-2 text-sm text-gray-500">
												Explain a little what you concern about.
											</p>
										</div>
				                    </div>
				                </div>

				                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
									<jet-action-message :on="form.recentlySuccessful" class="mr-3">
										Message sent.
									</jet-action-message>

									<jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
										Send
									</jet-button>
				                </div>
				            </form>
				        </div>
				    </div>
				</div>
            </div>
        </div>
	</landing-layout>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';
import LandingLayout from '@/Layouts/LandingLayout.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import { MailIcon } from '@heroicons/vue/solid'
import Instagram from '@/Assets/Icons/Instagram.vue'

export default defineComponent({
	components: {
		Link,
		LandingLayout,
		JetActionMessage,
		JetButton,
		JetInput,
		JetInputError,
		JetLabel,
		MailIcon,
		Instagram,
	},

	data() {
		return {
			form: this.$inertia.form({
				_method: 'POST',
				email: null,
				message: null,
				_token: this.$page.props.csrf_token,
			}),
		}
	},

	methods: {
		sendContactForm() {
			this.form.post(route('contact.update'), {
				sendCrrorBag: 'contactForm',
				preserveScroll: true,
				onSuccess: () => (this.clearPhotoFileInput()),
			});
		},
	}
})
</script>
