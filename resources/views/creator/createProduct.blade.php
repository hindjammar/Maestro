<body class="relative bg-yellow-50 overflow-hidden max-h-screen">
<script src="https://cdn.tailwindcss.com"></script>

@include('creator.side')

<main class="ml-60 pt-16 max-h-screen overflow-auto">
    <div class="text-xl font-bold text-center">Here you can create your products</div>
    <div class="px-6 py-8">
        <div class="max-w-xl mx-auto">
            <div class="bg-white rounded-3xl pt-4">
                <div class="flex items-center justify-center p-12">
                    <!-- Author: FormBold Team -->
                    <div class="mx-auto w-full max-w-[550px] bg-white">
                        <form action="/creProduct" id="productForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="-mx-3 flex flex-wrap">
                                <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                        <label for="marque" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Marque
                                        </label>
                                        <select name="marque"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
                                            <option value="" selected>Choose a marque</option>
                                            @foreach($vehicules as $vehicule)
                                                <option value="{{$vehicule->id}}">{{$vehicule->marque}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="modele" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Modele
                                        </label>
                                        <select name="modele"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
                                            <option value="" selected>Choose a modele</option>
                                            @foreach($vehicules as $vehicule)
                                                <option value="{{$vehicule->id}}">{{$vehicule->modele}}</option>
                                                @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="-mx-3 flex flex-wrap">
                                <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                        <label for="color" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Couleur
                                        </label>
                                        <select name="couleur"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
                                            <option value="selected" selected>Choose a color</option>
                                            @foreach($colors as $color)
                                                <option value="{{$color->id}}">{{$color->couleur}}</option>
                                                @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="reference" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Reference du couleur
                                        </label>
                                        <select name="reference"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
                                            <option value="" selected>Choose a reference</option>
                                            @foreach($references as $ref)
                                                <option value="{{$ref->id}}">{{$ref->reference}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="-mx-3 flex flex-wrap">
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="year" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Année
                                        </label>
                                       <select name="annee"
                                       class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                        <option value=""  selected>Choose a Year</option>
                                        @foreach($vehicules as $vehicule)
                                        <option value="{{$vehicule->id}}">{{$vehicule->annee}}</option>
                                        @endforeach
                                       </select>
                                    </div>

                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="qtt_article" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Quantite d'article
                                        </label>
                                        <input type="number" name="qtt_article" id="qtt_article" placeholder="Quantite d'article"
                                               class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                                    </div>
                                </div>
                                
                            </div>

                           
                           
                            <div class="mb-5">
                                <label for="composants" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Composants
                                </label>
                                <textarea type="text" name="composants" placeholder="Composants"
                                          class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                                </textarea>
                            </div>

                    
                
                            <div>
                                <button
                                type="submit" onclick="verifierDonnees()"
                                    class="hover:shadow-form rounded-md bg-black py-3 px-8 text-center text-base font-semibold text-white outline-none">
                                    Ajouter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function verifierDonnees() {
        // Ici, vous pouvez effectuer vos vérifications de données
        // Si les données ne sont pas valides, affichez une alerte
        alert("Veuillez vérifier les données avant l'ajout.");
        
    }
</script>
</body>
