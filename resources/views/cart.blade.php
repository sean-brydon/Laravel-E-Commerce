@section("title","Cart")

<x-layout>
    <div class="flex justify-center my-6">
        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            <div class="flex-1">
                <table class="w-full text-sm lg:text-base">
                    <thead>
                    <tr class="h-12 uppercase">
                        <th class="hidden md:table-cell"></th>
                        <th class="text-left">Product</th>
                        <th class="lg:text-right text-left pl-5 lg:pl-0">
                            <span class="lg:hidden" title="Quantity">Qtd</span>
                            <span class="hidden lg:inline">Quantity</span>
                        </th>
                        <th class="hidden text-right md:table-cell">Unit price</th>
                        <th class="text-right">Total price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total = 0 ?>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <tr>
                                <td class="hidden pb-4 md:table-cell">
                                    <a href="#">
                                        <img src="{{ $details['photo'] }}"
                                             class="w-20 rounded" alt="Thumbnail">
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <p class="mb-2 md:ml-4">{{ $details['name'] }}</p>
                                        <form action="" method="POST">
                                            <button type="submit" class="text-gray-700 md:ml-4">
                                                <small>(Remove item)</small>
                                            </button>
                                        </form>
                                    </a>
                                </td>
                                <td class="justify-center md:justify-end md:flex mt-6">
                                    <div class="w-20 h-10">
                                        <div class="relative flex flex-row w-full h-8">
                                            <label>
                                                <input type="number" value="{{ $details['quantity'] }}"
                                                       class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black"/>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden text-right md:table-cell">
                          <span class="text-sm lg:text-base font-medium">
                            £{{ $details['price'] }}
                          </span>
                                </td>
                                <td class="text-right">
                          <span class="text-sm lg:text-base font-medium">
                            £{{ $details['price'] * $details['quantity'] }}
                          </span>
                                </td>
                            </tr>

                        @endforeach
                    @endif
                    </tbody>
                </table>
                <hr class="pb-6 mt-6">
                <strong>Total ${{ $total }}</strong>

            </div>
        </div>
    </div>

</x-layout>
