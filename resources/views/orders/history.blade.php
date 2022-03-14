<x-app-layout>
    <x-slot name='header'>
        <h2 class='font-semibold text-xl text-gray-800 leading-tight'>
            {{ __( "Orders" ) }}
        </h2>
    </x-slot>

        <div class='py-12'>
            {{-- Your view here --}}
        <div class='max-w-7xl mx-auto sm:px-6 lg:px-8'>
        @foreach ($orders as $order)
            <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg my-10 '>
                <div class="card shadow-xl text-black">
                    <figure><img src="https://api.lorem.space/image/shoes?w=400&h=225" alt="Shoes"></figure>
                    <div class="card-body">
                      <h2 class="card-title">
                          Order Num: {{ $order->id }}
                        </h2>

                        <p> Amount of products: {{ $order->products }}</p>

                        {{-- <code>
                            {{ dd($order)}}
                        </code> --}}

                        <div tabindex="0" class="collapse">
                            <input type="checkbox">
                            <div class="collapse-title bg-primary text-primary-content peer-checked:bg-secondary peer-checked:text-secondary-content">
                              Click me to show/hide Products
                            </div>
                            <div class="collapse-content bg-primary text-primary-content peer-checked:bg-secondary peer-checked:text-secondary-content">
                              @foreach ($order->prods as $prod)
                                  <p>
                                    {{ $prod->prod_name }}
                                  </p>
                              @endforeach
                            </div>
                          </div>

                        <ul>
                        </ul>

                    </div>
                  </div>
                </div>
            @endforeach
            {{ $orders->links() }}
        </div>
    </div>

</x-app-layout>
