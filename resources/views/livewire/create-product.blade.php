<div>

    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}" wire:navigate
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li class="inline-flex items-center">
                <a href="{{ route('product') }}" wire:navigate
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white ">
                    <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                        Produk
                    </span>
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $title }}</span>
                </div>
            </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-700 md:text-4xl dark:text-white">
        {{ $title }}
    </h2>
    <div class="  dark:border-gray-700">
        <div class="lg:flex lg:justify-content:space-between lg:gap-2">
            {{-- Brand --}}
            <div wire:ignore class="mb-3 lg:w-1/2" x-data="{
                        value: 1,
                        options : [
                            @foreach ($brands as $item )
                            { value: {{ $item->id }}, label: '{{ $item->name }}' },
                            @endforeach
                        ],
                        init() {
                            let choices = new Choices(this.$refs.select, {
                                itemSelectText: 'Tekan untuk memilih',
                            })
        
                            let refreshChoices = () => {
                                choices.clearStore()
                                choices.setChoices(this.options.map(({value, label}) => ({
                                    value,
                                    label,
                                    selected: this.value === value
                                })))
                            }
                            refreshChoices()
        
                            this.$refs.select.addEventListener('change', () => {
                                this.value = choices.getValue(true)
                                @this.set('brand_id', this.value)
                            })
        
                            this.$watch('value', () => refreshChoices())
                            this.$watch('options', () => refreshChoices())
                        }
                    }">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merek</label>

                <select x-ref="select" id="brand"></select>
            </div>
            {{-- Category --}}
            <div wire:ignore class="mb-3 lg:w-1/2" x-data="{
                        value: 1,
                        options : [
                            @foreach ($categories as $item )
                            { value: {{ $item->id }}, label: '{{ $item->name }}' },
                            @endforeach
                        ],
                        init() {
                            let choices = new Choices(this.$refs.select, {
                                itemSelectText: 'Tekan untuk memilih',
                            })

                            let refreshChoices = () => {
                                choices.clearStore()
                                choices.setChoices(this.options.map(({value, label}) => ({
                                    value,
                                    label,
                                    selected: this.value === value
                                })))
                            }
                            refreshChoices()

                            this.$refs.select.addEventListener('change', () => {
                                this.value = choices.getValue(true)
                                @this.set('category_id', this.value)
                            })

                            this.$watch('value', () => refreshChoices())
                            this.$watch('options', () => refreshChoices())
                        }
                    }">
                <label for="category"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>

                <select x-ref="select" id="category"></select>
            </div>
        </div>

        {{-- Name --}}
        <div wire:ignore class="mb-3">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input wire:model="name" type="text" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Nama Produk">
        </div>



        {{-- Price --}}
        <div class="mb-3">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
            <input wire:model="price" type="text" id="price"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Harga">
        </div>

        {{-- Sale Price --}}
        <div x-data="{ open: false }">
            <button x-on:click="open = ! open" type="button"
                class="text-xs text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Punya
                harga promo?</button>

            <div x-show="open">
                {{-- Price --}}
                <div class="mb-3">
                    <label for="sale_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                        Promo</label>
                    <input wire:model="sale_price" type="text" id="sale_price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Harga Promo">
                </div>
            </div>
        </div>

        {{-- Description --}}
        <div class="mb-3">

            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                (opsional)</label>
            <textarea id="message" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Deskripsi singkat produk"></textarea>

        </div>


        {{-- Image --}}
        <div class="mb-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Unggah
                Foto (opsional)</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG atau JPEG.</p>
        </div>

        <div class="mb-3">
            <button wire:click="create" type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Buat Produk
            </button>
        </div>
    </div>
</div>