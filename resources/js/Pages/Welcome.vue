<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'
import {
    Dialog,
    DialogPanel,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    Tab,
    TabGroup,
    TabList,
    TabPanel,
    TabPanels,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import { MenuIcon, SearchIcon, ShoppingBagIcon, XIcon } from '@heroicons/vue/outline'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const navigation = {
    categories: [
        {
            id: 'women',
            name: 'Women',
            featured: [
                {
                    name: 'New Arrivals',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg',
                    imageAlt: 'Models sitting back to back, wearing Basic Tee in black and bone.',
                },
                {
                    name: 'Basic Tees',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg',
                    imageAlt: 'Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees.',
                },
            ],
            sections: [
                {
                    id: 'clothing',
                    name: 'Clothing',
                    items: [
                        { name: 'Tops', href: '#' },
                        { name: 'Dresses', href: '#' },
                        { name: 'Pants', href: '#' },
                        { name: 'Denim', href: '#' },
                        { name: 'Sweaters', href: '#' },
                        { name: 'T-Shirts', href: '#' },
                        { name: 'Jackets', href: '#' },
                        { name: 'Activewear', href: '#' },
                        { name: 'Browse All', href: '#' },
                    ],
                },
                {
                    id: 'accessories',
                    name: 'Accessories',
                    items: [
                        { name: 'Watches', href: '#' },
                        { name: 'Wallets', href: '#' },
                        { name: 'Bags', href: '#' },
                        { name: 'Sunglasses', href: '#' },
                        { name: 'Hats', href: '#' },
                        { name: 'Belts', href: '#' },
                    ],
                },
                {
                    id: 'brands',
                    name: 'Brands',
                    items: [
                        { name: 'Full Nelson', href: '#' },
                        { name: 'My Way', href: '#' },
                        { name: 'Re-Arranged', href: '#' },
                        { name: 'Counterfeit', href: '#' },
                        { name: 'Significant Other', href: '#' },
                    ],
                },
            ],
        },
        {
            id: 'men',
            name: 'Men',
            featured: [
                {
                    name: 'New Arrivals',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg',
                    imageAlt: 'Drawstring top with elastic loop closure and textured interior padding.',
                },
                {
                    name: 'Artwork Tees',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-06.jpg',
                    imageAlt:
                        'Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt.',
                },
            ],
            sections: [
                {
                    id: 'clothing',
                    name: 'Clothing',
                    items: [
                        { name: 'Tops', href: '#' },
                        { name: 'Pants', href: '#' },
                        { name: 'Sweaters', href: '#' },
                        { name: 'T-Shirts', href: '#' },
                        { name: 'Jackets', href: '#' },
                        { name: 'Activewear', href: '#' },
                        { name: 'Browse All', href: '#' },
                    ],
                },
                {
                    id: 'accessories',
                    name: 'Accessories',
                    items: [
                        { name: 'Watches', href: '#' },
                        { name: 'Wallets', href: '#' },
                        { name: 'Bags', href: '#' },
                        { name: 'Sunglasses', href: '#' },
                        { name: 'Hats', href: '#' },
                        { name: 'Belts', href: '#' },
                    ],
                },
                {
                    id: 'brands',
                    name: 'Brands',
                    items: [
                        { name: 'Re-Arranged', href: '#' },
                        { name: 'Counterfeit', href: '#' },
                        { name: 'Full Nelson', href: '#' },
                        { name: 'My Way', href: '#' },
                    ],
                },
            ],
        },
    ],
    pages: [
        { name: 'Company', href: '#' },
        { name: 'Stores', href: '#' },
    ],
}

const open = ref(false)
</script>

<template>

    <Head title="Welcome" />

    <div class="bg-white">
        <!-- Mobile menu -->
        <TransitionRoot as="template" :show="open">
            <Dialog as="div" class="relative z-40 lg:hidden" @close="open = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100" leave-to="opacity-0">
                    <div class="fixed inset-0 bg-black bg-opacity-25" />
                </TransitionChild>

                <div class="fixed inset-0 flex z-40">
                    <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                        enter-from="-translate-x-full" enter-to="translate-x-0"
                        leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                        leave-to="-translate-x-full">
                        <DialogPanel
                            class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto">
                            <div class="px-4 pt-5 pb-2 flex">
                                <button type="button"
                                    class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400"
                                    @click="open = false">
                                    <span class="sr-only">Close menu</span>
                                    <XIcon class="h-6 w-6" aria-hidden="true" />
                                </button>
                            </div>

                            <!-- Links -->
                            <TabGroup as="div" class="mt-2">
                                <div class="border-b border-gray-200">
                                    <TabList class="-mb-px flex px-4 space-x-8">
                                        <Tab as="template" v-for="category in navigation.categories"
                                            :key="category.name" v-slot="{ selected }">
                                            <button
                                                :class="[selected ? 'text-indigo-600 border-indigo-600' : 'text-gray-900 border-transparent', 'flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium']">
                                                {{ category.name }}
                                            </button>
                                        </Tab>
                                    </TabList>
                                </div>
                                <TabPanels as="template">
                                    <TabPanel v-for="category in navigation.categories" :key="category.name"
                                        class="pt-10 pb-8 px-4 space-y-10">
                                        <div class="grid grid-cols-2 gap-x-4">
                                            <div v-for="item in category.featured" :key="item.name"
                                                class="group relative text-sm">
                                                <div
                                                    class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                                                    <img :src="item.imageSrc" :alt="item.imageAlt"
                                                        class="object-center object-cover" />
                                                </div>
                                                <a :href="item.href" class="mt-6 block font-medium text-gray-900">
                                                    <span class="absolute z-10 inset-0" aria-hidden="true" />
                                                    {{ item.name }}
                                                </a>
                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                            </div>
                                        </div>
                                        <div v-for="section in category.sections" :key="section.name">
                                            <p :id="`${category.id}-${section.id}-heading-mobile`"
                                                class="font-medium text-gray-900">
                                                {{ section.name }}
                                            </p>
                                            <ul role="list"
                                                :aria-labelledby="`${category.id}-${section.id}-heading-mobile`"
                                                class="mt-6 flex flex-col space-y-6">
                                                <li v-for="item in section.items" :key="item.name" class="flow-root">
                                                    <a :href="item.href" class="-m-2 p-2 block text-gray-500">
                                                        {{ item.name }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </TabPanel>
                                </TabPanels>
                            </TabGroup>

                            <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                                <div v-for="page in navigation.pages" :key="page.name" class="flow-root">
                                    <a :href="page.href"
                                        class="-m-2 p-2 block font-medium text-gray-900">{{ page.name }}</a>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                                <div class="flow-root">
                                    <a href="#" class="-m-2 p-2 block font-medium text-gray-900">Sign in</a>
                                </div>
                                <div class="flow-root">
                                    <a href="#" class="-m-2 p-2 block font-medium text-gray-900">Create account</a>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 py-6 px-4">
                                <a href="#" class="-m-2 p-2 flex items-center">
                                    <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt=""
                                        class="w-5 h-auto block flex-shrink-0" />
                                    <span class="ml-3 block text-base font-medium text-gray-900"> CAD </span>
                                    <span class="sr-only">, change currency</span>
                                </a>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <header class="relative bg-white z-50">
            <!-- <p
                class="bg-indigo-600 h-10 flex items-center justify-center text-sm font-medium text-white px-4 sm:px-6 lg:px-8">
                Get free delivery on orders over $100</p> -->

            <nav aria-label="Top" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="border-b border-gray-200">
                    <div class="h-16 flex items-center">
                        <button type="button" class="bg-white p-2 rounded-md text-gray-400 lg:hidden"
                            @click="open = true">
                            <span class="sr-only">Open menu</span>
                            <MenuIcon class="h-6 w-6" aria-hidden="true" />
                        </button>

                        <!-- Logo -->
                        <div class="ml-4 flex lg:ml-0">
                            <a href="#">
                                <span class="sr-only">Workflow</span>
                                <img class="h-8 w-auto"
                                    src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600"
                                    alt="" />
                            </a>
                        </div>

                        <!-- Flyout menus -->
                        <PopoverGroup class="hidden lg:ml-8 lg:block lg:self-stretch z-50">
                            <div class="h-full flex space-x-8">
                                <Popover v-for="category in navigation.categories" :key="category.name" class="flex"
                                    v-slot="{ open }">
                                    <div class="relative flex">
                                        <PopoverButton class="hover:text-indigo-600"
                                            :class="[open ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-700 hover:text-gray-800', 'relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px']">
                                            {{ category.name }}
                                        </PopoverButton>
                                    </div>

                                    <transition enter-active-class="transition ease-out duration-200"
                                        enter-from-class="opacity-0" enter-to-class="opacity-100"
                                        leave-active-class="transition ease-in duration-150"
                                        leave-from-class="opacity-100" leave-to-class="opacity-0">
                                        <PopoverPanel class="absolute top-full inset-x-0 text-sm text-gray-500">
                                            <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                            <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true" />

                                            <div class="relative bg-white">
                                                <div class="max-w-7xl mx-auto px-8">
                                                    <div class="grid grid-cols-2 gap-y-10 gap-x-8 py-16">
                                                        <div class="col-start-2 grid grid-cols-2 gap-x-8">
                                                            <div v-for="item in category.featured" :key="item.name"
                                                                class="group relative text-base sm:text-sm">
                                                                <div
                                                                    class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                                                                    <img :src="item.imageSrc" :alt="item.imageAlt"
                                                                        class="object-center object-cover" />
                                                                </div>
                                                                <a :href="item.href"
                                                                    class="mt-6 block font-medium text-gray-900">
                                                                    <span class="absolute z-10 inset-0"
                                                                        aria-hidden="true" />
                                                                    {{ item.name }}
                                                                </a>
                                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="row-start-1 grid grid-cols-3 gap-y-10 gap-x-8 text-sm">
                                                            <div v-for="section in category.sections"
                                                                :key="section.name">
                                                                <p :id="`${section.name}-heading`"
                                                                    class="font-medium text-gray-900">
                                                                    {{ section.name }}
                                                                </p>
                                                                <ul role="list"
                                                                    :aria-labelledby="`${section.name}-heading`"
                                                                    class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                    <li v-for="item in section.items" :key="item.name"
                                                                        class="flex">
                                                                        <a :href="item.href"
                                                                            class="hover:text-gray-800">
                                                                            {{ item.name }}
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </PopoverPanel>
                                    </transition>
                                </Popover>

                                <a v-for="page in navigation.pages" :key="page.name" :href="page.href"
                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600">{{ page.name }}</a>
                            </div>
                        </PopoverGroup>

                        <div class="ml-auto flex items-center" v-if="canLogin">
                            <Link v-if="$page.props.user" :href="route('dashboard')"
                                class="text-sm font-medium px-4 py-2 text-center bg-gray-100 border border-transparent rounded-md text-gray-700 hover:bg-gray-200">
                            Dashboard
                            </Link>
                            <div v-else class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                <Link :href="route('login')"
                                    class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign in</Link>
                                <span v-if="canRegister" class="h-6 w-px bg-gray-200" aria-hidden="true" />
                                <Link v-if="canRegister" :href="route('register')"
                                    class="text-sm font-medium px-4 py-2 text-center bg-indigo-600 border border-transparent rounded-md text-white hover:bg-indigo-700">
                                Create account</Link>

                                <!-- Cart -->
                                <div class="ml-4 flow-root lg:ml-6">
                                    <a href="#" class="group -m-2 p-2 flex items-center">
                                        <ShoppingBagIcon
                                            class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                            aria-hidden="true" />
                                        <span
                                            class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                        <span class="sr-only">items in cart, view bag</span>
                                    </a>
                                </div>
                            </div>


                            <!-- Search -->
                            <div class="flex lg:ml-6">
                                <a href="#" class="p-2 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Search</span>
                                    <SearchIcon class="w-6 h-6" aria-hidden="true" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <div class="relative bg-white">
        <div class="pt-16 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48">
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 sm:static">
                <div class="sm:max-w-lg">
                    <h1 class="text-4xl font font-extrabold tracking-tight text-gray-900 sm:text-6xl">Summer styles are
                        finally here</h1>
                    <p class="mt-4 text-xl text-gray-500">This year, our new summer collection will shelter you from the
                        harsh elements of a world that doesn't care if you live or die.</p>
                </div>
                <div>
                    <div class="mt-10">
                        <!-- Decorative image grid -->
                        <div aria-hidden="true"
                            class="pointer-events-none lg:inset-y-0 lg:max-w-7xl lg:mx-auto lg:w-full">
                            <div
                                class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                                <div class="flex items-center space-x-6 lg:space-x-8">
                                    <div class="flex-shrink-0 grid grid-cols-1 gap-y-6 lg:gap-y-8">
                                        <div class="w-44 h-64 rounded-lg overflow-hidden sm:opacity-0 lg:opacity-100">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-01.jpg"
                                                alt="" class="w-full h-full object-center object-cover" />
                                        </div>
                                        <div class="w-44 h-64 rounded-lg overflow-hidden">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-02.jpg"
                                                alt="" class="w-full h-full object-center object-cover" />
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 grid grid-cols-1 gap-y-6 lg:gap-y-8">
                                        <div class="w-44 h-64 rounded-lg overflow-hidden">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-03.jpg"
                                                alt="" class="w-full h-full object-center object-cover" />
                                        </div>
                                        <div class="w-44 h-64 rounded-lg overflow-hidden">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-04.jpg"
                                                alt="" class="w-full h-full object-center object-cover" />
                                        </div>
                                        <div class="w-44 h-64 rounded-lg overflow-hidden">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-05.jpg"
                                                alt="" class="w-full h-full object-center object-cover" />
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 grid grid-cols-1 gap-y-6 lg:gap-y-8">
                                        <div class="w-44 h-64 rounded-lg overflow-hidden">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-06.jpg"
                                                alt="" class="w-full h-full object-center object-cover" />
                                        </div>
                                        <div class="w-44 h-64 rounded-lg overflow-hidden">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-07.jpg"
                                                alt="" class="w-full h-full object-center object-cover" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#"
                            class="inline-block text-center bg-indigo-600 border border-transparent rounded-md py-3 px-8 font-medium text-white hover:bg-indigo-700">Shop
                            Collection</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
