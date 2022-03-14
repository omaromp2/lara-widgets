<x-app-layout>
    <x-slot name='header'>
        <h2 class='font-semibold text-xl text-gray-800 leading-tight'>
            {{ __( 'Widgets' ) }}
        </h2>
    </x-slot>

    <div class='py-12'>
        {{-- Your view here --}}


        @if(Session::has('success'))


        <div class="w-full text-white bg-emerald-500">
            <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                <div class="flex">
                    <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                        <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                        </path>
                    </svg>

                    <p class="mx-3"> {{ Session::get('success') }} </p>
                </div>

                <button
                    class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>

        @endif

        @if(Session::has('fail'))


        <div class="w-full text-white bg-red-500">
            <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                <div class="flex">
                    <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                        <path
                            d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                        </path>
                    </svg>

                    <p class="mx-3"> {{ Session::get('fail') }} </p>
                </div>

                <button
                    class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>

        @endif
        <div class='max-w-7xl mx-auto sm:px-6 lg:px-8'>
            <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                <!-- component -->
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($widgets as $widget)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">
                                {{ $widget->name }}
                            </td>
                            <td class="px-4 py-3 text-ms font-semibold border">
                                {{ $widget->price }}
                            </td>
                            <td class="px-4 py-3 text-xs border">

                                {!! Form::open([
                                'method' => 'POST',
                                'route' => 'addCart',
                                'class' => 'flex'
                                ]) !!}

                                {{-- {!! Form::number('amount', null, []) !!} --}}

                                {!! Form::select('amount', [
                                    1 => 1, 2 => 2, 3 => 3 , 4=> 4 , 5=>5
                                ], 1, ['class' => 'select']) !!}

                                {!! Form::hidden('user_id', Auth::user()->id, []) !!}
                                {!! Form::hidden('prod_id', $widget->id ) !!}
                                {!! Form::hidden('widget_name', $widget->name, []) !!}
                                {!! Form::hidden('price', $widget->price, []) !!}


                                <x-button class="ml-3 " type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> Add to Cart
                                </x-button>


                                {!! Form::close() !!}

                            </td>

                        </tr>

                        @endforeach

                    </tbody>
                </table>

                <br>

                {{ $widgets }}

            </div>
        </div>
    </div>

</x-app-layout>
