<!-- vehicule/index.blade.php -->
<h2>Sélectionnez une marque :</h2>
@php
    $marques = $vehicules->unique('marque'); // Obtient une collection de marques uniques
@endphp

@foreach($marques as $marque)
    <button class="marqueButton" data-marque="{{ $marque->marque }}">{{ $marque->marque }}</button>
@endforeach

<div id="modeleButtons" style="display: none;">
    <!-- Modèles seront affichés dynamiquement ici -->
    @foreach($marques as $marque)
    <button class="modeleButton" data-modele="{{ $marque->modele }}">{{ $marque->modele }}</button>
@endforeach
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.marqueButton').click(function() {
            var marque = $(this).data('marque');
            $.ajax({
                url: '/filtrage',
                type: 'GET',
                data: {
                    marque: marque
                },
                success: function(response) {
                    $('#modeleButtons').html(response).show();
                }
            });
        });
    });
</script>
