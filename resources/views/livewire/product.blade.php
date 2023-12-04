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
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">
                        {{ $title }}
                    </span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="flex justify-between">

        <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-700 md:text-4xl dark:text-white">
            {{ $title }}
        </h2>

        <a href="{{ route('product.create')  }}" wire:navigate
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mb-4">
            Buat Produk
        </a>


    </div>

    <div class="mb-3">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Cari</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input wire:model.live.debounce.250ms="q" type="search" id="default-search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Nama produk" required>
        </div>
    </div>

    <div x-data="{ open: false, id: null, name: 'default' }">
        <div class="border-2 border-gray-200  dark:border-gray-700">
            <div class="relative overflow-x-auto sm:">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Merek
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga (Rp)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4">
                                <img src="{{ $item->image }}" alt="image-{{ $item->name }}" class="w-5">
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->brand->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->category->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($item->getFinalPrice(), 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('product.edit', ['id' => $item->id]) }}" wire:navigate
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <button x-on:click="open = true; id = {{ $item->id }}; name = '{{ $item->name }}'"
                                    type="button"
                                    class="font-medium ms-2 text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$products->links()}}
            </div>
        </div>

        {{-- Modal --}}
        <div x-show="open" style="display: none" x-on:keydown.escape.prevent.stop="open = false" role="dialog"
            aria-modal="true" x-id="['modal-title']" :aria-labelledby="$id('modal-title')"
            class="fixed inset-0 z-50 overflow-y-auto">
            {{-- Overlay --}}
            <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50"></div>

            {{-- Panel --}}
            <div x-show="open" x-transition x-on:click="open = false"
                class="relative flex min-h-screen items-center justify-center p-4">
                <div x-on:click.stop x-trap.noscroll.inert="open"
                    class="relative w-full max-w-lg overflow-y-auto bg-white dark:bg-gray-800 p-12 shadow-lg">
                    {{-- Title --}}
                    <h2 class="text-xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl dark:text-white"
                        :id="$id('modal-title')">Konfirmasi</h2>

                    {{-- Content --}}
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Apakah kamu yakin ingin menghapus "<span
                            x-text="name"></span>"?</p>

                    {{-- Buttons --}}
                    <div class="mt-8 flex space-x-2">
                        <button type="button" x-on:click="$wire.deleteById(id); open = false"
                            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Ya, Hapus
                        </button>
                        <button type="button" x-on:click="open = false"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Batalkan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>