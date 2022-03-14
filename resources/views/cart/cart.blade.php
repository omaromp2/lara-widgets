<x-app-layout>
    <x-slot name='header'>
        <h2 class='font-semibold text-xl text-gray-800 leading-tight'>
            {{ __( 'Cart' ) }}
        </h2>
    </x-slot>

        <div class='py-12'>
            {{-- Your view here --}}
        <div class='max-w-7xl mx-auto sm:px-6 lg:px-8'>
            <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>
                <div class="overflow-x-auto" >
                    {!! Form::open([
                        'Method' => 'Post',
                        'route' => 'placeOrder'
                    ]) !!}
                    <table class="table w-full">
                        <thead class="bg-gray-500" >
                            <tr>
                                <td></td>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Amount</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr class="hover text-black " >
                                    <th>

                                    </th>
                                    <th>
                                        {{ $item->widget_name }}
                                    </th>
                                    <th>
                                        {{-- {!! Form::hidden('price-' .$item->id , $item->current_price, []) !!} --}}
                                        ${{ $item->current_price }}
                                    </th>
                                    <th>
                                        {!! Form::number($item->id , $item->amount, ['class' => 'select']) !!}
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <hr>
                    <h1 class="text-center text-black " > Total Order: <b>{{ $cartItems->sum('current_price') }}</b>  </h1> --}}
                    @if ($cartItems->count() > 0)
                        {!! Form::submit('Place Order', [ 'class' => 'btn btn-primary btn-block']) !!}
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
