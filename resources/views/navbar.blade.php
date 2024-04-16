<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('styles/navbar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     
    <!-- <style>
        .logoo img {
        width: 60px; /* spécifiez la largeur souhaitée */
        height: auto; /* laissez la hauteur ajustable en fonction de la largeur pour préserver les proportions */
    }

    
    </style> -->
    <title></title>
</head>
<body>
    <header>

       <div class='navbar'>
        <div class='logoo'>
            <!-- <img  src="{{ asset('./images/maestro.png')}}"> -->
            <a href='#' style="text-decoration: none; margin-right: 25px;">Maestro </a></div> 
        <ul class='links'>
            <li><a class="active" href="/" style="text-decoration: none; font-size: 25px;">Home</a></li>
            <li><a href="#about" style="text-decoration: none; font-size: 25px;">About</a></li>
            <li><a href="#contact" style="text-decoration: none; font-size: 25px;">Contact</a></li>
            <li><a href="#services" style="text-decoration: none; font-size: 25px;">Services</a></li>

            <li>
                    <a href="/">
                        @if (Route::has('login'))
                            @auth
                        </a>
             </li>

             <li> <a href="{{ url('/profil') }}"
             style="text-decoration: none; font-size: 25px;"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Profil</a>

            </li>
            <li>
            @else
                <a href="{{url('/login')}}" style="text-decoration: none; font-size: 25px;">Login</a>
                @if (Route::has('register'))
            </li>
            <li>
                <a href="{{url('/register')}}" style="text-decoration: none; font-size: 25px;">Register</a>
                @endif
            </li>
            @endauth

            @endif
        </ul>

        <div class="toggle_btn"> 
        <i class="fa-solid fa-bars"></i>
        </div>
       </div> 

       <div class="dropdown_menu">
    <ul>
        <li><a class="lien" href="Home">Home</a></li>
        <li><a href="#about" style="text-decoration: none;">About</a></li>
        <li><a href="#contact" style="text-decoration: none;">Contact</a></li>
        <!-- Utilisez une logique similaire pour afficher les liens de connexion/déconnexion -->
        @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/profil') }}" style="text-decoration: none;">Profil</a></li>
            @else
                <li><a href="{{ url('/login') }}" style="text-decoration: none;">Login</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ url('/register') }}" style="text-decoration: none;">Register</a></li>
                @endif
            @endauth
        @endif
    </ul>
</div>

<script>
    const toggleBtn = document.querySelector('.toggle_btn');
    const toggleBtnIcon = document.querySelector('.toggle_btn i');
    const dropDownMenu = document.querySelector('.dropdown_menu');

    toggleBtn.onclick = function () {
        dropDownMenu.classList.toggle('open');
        const isOpen = dropDownMenu.classList.contains('open');
        toggleBtnIcon.classList = isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
    };
</script>
</body>
</html>