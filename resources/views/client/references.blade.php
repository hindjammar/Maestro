<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <style>
       

        
        .scrollable {
            overflow-x: hidden; /* Utilisez un défilement horizontal */
            overflow-y: auto; /* Masquez le défilement vertical */
            white-space: nowrap; /* Empêchez le texte de se retourner à la ligne */
        }
    </style>
</head>
<body>
<div  style="margin-top:90px;" class="max-w-4xl mx-auto p-10 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-screen overflow-y-auto">
<!-- <div class="scrollable grid gap-6 grid-flow-col sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6"> -->
    
                <div class="scrollable">
                 @php
                    $referencesChunks = $references->chunk(72);
                @endphp
                @foreach($referencesChunks as $chunk)

                <div class="grid gap-6 grid-cols-8">

                @foreach($references as $reference)
                            <div class="flex flex-col relative">
                <div class="relative">
                    <img class="h-8 w-8 mx-auto rounded-md" src="{{$reference->imagereference}}">
                    <div class="tooltip hidden absolute bg-gray-800 text-white text-center p-2 rounded-lg bottom-0 left-0 w-full">
                        {{$reference->reference}}
                    </div>
                </div>
                <div class="hovered-reference hidden text-center">  <?php
            // Diviser la référence en deux parties
            $words = explode(' ', $reference->reference);
            $half = count($words) / 2;
            $firstHalf = implode(' ', array_slice($words, 0, ceil($half)));
            $secondHalf = implode(' ', array_slice($words, ceil($half)));
            // Afficher chaque moitié sur une ligne séparée
            echo '<a href="/details/'.$reference->id.'">' . $firstHalf . '<br>' . $secondHalf . '</a>';
            ?></div>
            </div>
                @endforeach
        </div>
        @endforeach
    </div>  
    </div>
</div>
</div> 
<script>
    $(document).ready(function(){
        $('.flex').hover(function(){
            $(this).find('.hovered-reference').toggleClass('hidden');
        });
    });
</script>

</body>
</html>

