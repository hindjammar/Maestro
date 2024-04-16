<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="relative bg-yellow-50 overflow-hidden max-h-screen">
<script src="https://cdn.tailwindcss.com"></script>

@include('creator.side')

<main class="bg-white ml-60 pt-16 max-h-screen overflow-auto flex justify-center h-full">
    <div class="w-full max-w-5xl p-8 rounded-lg h-1/2 pb-8">
        <h1 class="text-2xl font-semibold text-green-800 mb-6">Tableau Excel</h1>

        <div class="flex justify-between mb-4">
            <a href="{{ route('creer-excel') }}" class="btn btn-primary bg-green-500 hover:bg-green-600">Créer Excel</a>
            <a href="{{ route('exporter-excel') }}" class="btn btn-success bg-green-500 hover:bg-green-600">Exporter Excel</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success bg-green-200 text-green-800 mb-4">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger bg-red-200 text-red-800 mb-4">{{ session('error') }}</div>
        @endif

        <hr class="my-6 border-2 border-green-500">

        <h2 class="text-lg font-semibold mb-2">Importer un fichier Excel</h2>
        <form action="{{ route('importer-excel') }}" method="POST" enctype="multipart/form-data" class="mb-6">
            @csrf
            <input type="file" name="fichier_excel" class="border border-green-500 rounded-lg py-2 px-4 w-full mb-2">
            <button type="submit" class="btn btn-primary bg-green-500 hover:bg-green-600">Importer</button>
        </form>

        <hr class="my-6 border-2 border-green-500">

        <h2 class="text-lg font-semibold mb-2">Données Excel</h2>
        
        <table class="table w-full">
            <thead>
                <tr>
                    <th class="border border-green-500 px-4 py-2 bg-green-600">Marque</th>
                    <th class="border border-green-500 px-4 py-2 bg-green-600">Modele</th>
                    <th class="border border-green-500 px-4 py-2 bg-green-600">Couleur</th>
                    <th class="border border-green-500 px-4 py-2 bg-green-600">Reference</th>
                    <th class="border border-green-500 px-4 py-2 bg-green-600">Annee</th>
                    <th class="border border-green-500 px-4 py-2 bg-green-600">Composants</th>
                    <th class="border border-green-500 px-4 py-2 bg-green-600">Quantite d'article</th>


                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)

                <tr>
               
                    <td class="border border-green-500 px-4 py-2">
                    @foreach ($vehicules as $vehicule)
                                                        @if ($vehicule->id === $product->marque)
                                                            {{ $vehicule->marque }}
                                                        @endif
                                                    @endforeach
                    </td>
                    <td class="border border-green-500 px-4 py-2">
                    @foreach ($vehicules as $vehicule)
                                                        @if ($vehicule->id === $product->modele)
                                                            {{ $vehicule->modele }}
                                                        @endif
                                                    @endforeach
                    
                    </td>
                    <td class="border border-green-500 px-4 py-2">
                    @foreach ($couleurs as $couleur)
                                                        @if ($couleur->id === $product->couleur)
                                                            {{ $couleur->couleur }}
                                                        @endif
                                                    @endforeach
                    
                    </td>
                    <td class="border border-green-500 px-4 py-2">
                    @foreach ($references as $reference)
                                                        @if ($reference->id === $product->reference)
                                                            {{ $reference->reference }}
                                                        @endif
                                                    @endforeach
                    </td>
                    <td class="border border-green-500 px-4 py-2">
                    @foreach ($vehicules as $vehicule)
                                                        @if ($vehicule->id === $product->annee)
                                                            {{ $vehicule->annee }}
                                                        @endif
                                                    @endforeach
                    </td>
                    <td class="border border-green-500 px-4 py-2">
                         {{$product->composants}}         
                                   </td>
                    <td class="border border-green-500 px-4 py-2">
                         {{$product->qtt_article}}
                         
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</main>


</body>
</html>
