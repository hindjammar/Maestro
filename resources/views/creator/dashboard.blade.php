<body class="relative bg-yellow-50 overflow-hidden max-h-screen">
<script src="https://cdn.tailwindcss.com"></script>

@include('creator.side')

<main class="ml-60 pt-16 max-h-screen overflow-auto">
    <div class="px-6 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl p-8 mb-5">
                <h1 class="text-3xl text-center font-bold mb-10">
                    Welcome Creator {{ auth()->user()->name }}
                </h1>

                <hr class="my-10">

                <div class="grid grid-cols-2 gap-x-20">
                    <div>
                        <h2 class="text-2xl font-bold mb-4">Dashboard</h2>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <div class="p-4 bg-green-100 rounded-xl">
                                    <div class="font-bold text-xl text-gray-800 leading-none">Good day,
                                        <br>{{ auth()->user()->name }}
                                    </div>
                                    <div class="mt-5">
                                        <a href="/createProduct"
                                           class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition">
                                            Start to create products
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 bg-yellow-100 rounded-xl text-gray-800">
                                <div class="font-bold text-2xl leading-none">{{$totalProducts}}</div>
                                <div class="mt-2">Total Products</div>
                            </div>
                            <!-- <div class="p-4 bg-yellow-100 rounded-xl text-gray-800">
                                <div class="font-bold text-2xl leading-none"></div>
                                <div class="mt-2">Public Posts</div>
                            </div> -->
                            <!-- <div class="col-span-2">
                                <div class="p-4 bg-purple-100 rounded-xl text-gray-800">
                                    <div class="font-bold text-xl leading-none">Your daily plan</div>
                                    <div class="mt-2">5 of 8 completed</div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold mb-4">My latest Products</h2>

                        <div class="space-y-4">
                                <div class="p-4 bg-white border rounded-xl text-gray-800 space-y-2">
                                    

                                    <div class="block w-full overflow-x-auto">
        <table class="items-center w-full border-collapse text-blueGray-700  ">
          <thead class="thead-light ">
            <tr>
              <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                Marque
              </th>
              <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                Modele
              </th>
              <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                Couleur
              </th> <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                Reference
              </th>
              <th class="px-6 bg-blueGray-50 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"></th>
            </tr>
          </thead>
          <tbody>
          @foreach($products as $product)
                                      <tr>
                                              

              <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
              @foreach ($vehicules as $vehicule)
                                                        @if ($vehicule->id === $product->marque)
                                                            {{ $vehicule->marque }}
                                                        @endif
                                                    @endforeach
                                        
              </th>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
              @foreach ($vehicules as $vehicule)
                                                        @if ($vehicule->id === $product->modele)
                                                            {{ $vehicule->modele }}
                                                        @endif
                                                    @endforeach
              </td>

              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
              @foreach ($couleurs as $couleur)
                                                        @if ($couleur->id === $product->couleur)
                                                            {{ $couleur->couleur }}
                                                        @endif
                                                    @endforeach
              </td>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
              @foreach ($references as $reference)
                                                        @if ($reference->id === $product->reference)
                                                            {{ $reference->reference }}
                                                        @endif
                                                    @endforeach
              </td>
               @endforeach
             </tr>
            </tbody>
   </table>
</div>

                                    <a href="javascript:void(0)"
                                       class="font-bold hover:text-yellow-800 hover:underline"></a>
                                    <div class="text-sm text-gray-600">
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                             fill="currentColor"
                                             class="text-gray-800 inline align-middle mr-1" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                        </svg>
                                        Nombre de places:  -->
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
