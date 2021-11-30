<template>
    <div>
        <Head :title="title" />

        <!-- <jet-banner /> -->

        <div class="min-h-screen bg-white">
            <nav>
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col items-center justify-center space-y-2 h-48">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <Link :href="route('home')">
									<img src="/assets/logo.png" class="block h-36 w-36" alt="Tomodachi Emblem">
                                </Link>
                            </div>
                        </div>
						<div class="flex space-x-2">
							<nav-link :href="route('home')" :active="route().current('home')">
								Home
							</nav-link>
							<nav-link :href="route('events')" :active="route().current('events')">
								Events
							</nav-link>
							<nav-link :href="route('about')" :active="route().current('about')">
								About
							</nav-link>
							<nav-link :href="route('contact')" :active="route().current('contact')">
								Contact
							</nav-link>
						</div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    // import JetBanner from '@/Jetstream/Banner.vue'
	import NavLink from '@/Pages/Landing/Partials/Nav.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        props: {
            title: String,
        },

        components: {
            Head,
            // JetBanner,
            Link,
			NavLink,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {

        }
    })
</script>
