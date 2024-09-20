<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                        class="text-white">9265 Abidjan, COTE D'IVOIRE</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                        class="text-white">Email@Example.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{ url('/') }}" class="navbar-brand">
                <h3 class="text-primary display-6">ArtisanConnect</h3>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Accueil</a>
                    <a href="{{ url('/metier') }}" class="nav-item nav-link">Métiers/Service</a>
                    <a href="{{ url('/devenirartisan') }}" class="nav-item nav-link">Devenir artisan</a>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                </div>
                <div class="d-flex m-3 me-0 navbar-nav mx-auto">
                    @guest
                        <a href="{{ route('login') }}" class="nav-item nav-link custom-btn">
                            Se connecter
                        </a>
                    @else
                        <span class="navbar-text">
                            Bienvenue, {{ Auth::user()->name }}!
                        </span>

                        <div class="dropdown">
                            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Mon Compte</a></li>
                                {{-- <li>
                                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Déconnexion</button>
                                    </form>
                                </li> --}}
                            </ul>
                        </div>

                    @endguest
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
