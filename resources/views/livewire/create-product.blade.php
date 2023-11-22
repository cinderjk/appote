<div>

    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}"
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
                <a href="{{ route('product') }}"
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <div class=" rounded-lg dark:border-gray-700">
        <div class="h-48 rounded bg-gray-50 dark:bg-gray-800">
            <div x-data="{
                value: 1,
                options : [
                    { value: 1, label: 'Foo' },
                    { value: 2, label: 'Bar' },
                    { value: 3, label: 'Baz' },
                ],
                init() {
                    let choices = new Choices(this.$refs.select)

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
                    })

                    this.$watch('value', () => refreshChoices())
                    this.$watch('options', () => refreshChoices())
                }
            }">

                <select x-ref="select"></select>

                <div>Selected : <span x-text="JSON.stringify(value)"></span> </div>
                <button @click="value = 3">Change to Baz</button>
                <button @click="options.push({value: 4, label: 'Bob'})">Add Bob</button>

            </div>
        </div>
    </div>
</div>