<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Artisan-Connect')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">



    <!-- Inclure le CSS de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Inclure le JavaScript de Leaflet -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .custom-btn {
            background-color: #81c408;
            /* Remplacez cette valeur par la couleur souhaitée */
            color: white;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            text-align: center;
            display: inline-block;
        }

        .custom-btn:hover {
            background-color: white;
            border: 1px solid #81c408;
        }
    </style>
</head>



<body>



    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                            class="text-white">9265 Abidjan, COTE D'IVOIRE</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                            class="text-white">artisanconnect40@gmail.com</a></small>
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
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <!--<button type="submit" class="btn btn-link nav-link"
                                                                                                                                                                       style="display: inline; padding: 0;">Déconnecter</button> -->
                            </form>
                        @endguest
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->






    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <img src="" alt="">
        <h1 class="text-center text-white display-6">Métier/Service</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Nous venons vers vous</a></li>
            <li class="breadcrumb-item"><a href="#">Découvrez nos artisans</a></li>
            <li class="breadcrumb-item active text-white">Et réservez</li>
        </ol>
    </div>
    <!-- Single Page Header End -->






    <!-- Modale de Connexion -->
    <!-- Modale de Connexion -->
    <div class="modal fade" id="quickLogin" tabindex="-1" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header px-3">
                    <h4 class="modal-title"><i class="fas fa-sign-in-alt"></i> Se connecter </h4>
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Fermer</span>
                    </button>
                </div>
                <form role="form" method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 auth-field-item mt-3 required">
                            <label class="form-label" for="email">Email:<sup>*</sup></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input id="mEmail" name="email" type="text"
                                    placeholder="Email ou Nom d'utilisateur" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="control-label">Mot de passe</label>
                            <div class="input-group show-pwd-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input id="mPassword" name="password" type="password" class="form-control"
                                    placeholder="Mot de passe" autocomplete="new-password" required>
                                <span class="icon-append show-pwd">
                                    <button type="button" class="eyeOfPwd">
                                        <i class="far fa-eye-slash"></i>
                                    </button>
                                </span>
                            </div>
                        </div>

                        <div>
                            <label class="checkbox form-check-label float-start mt-2" style="font-weight: normal;">
                                <input type="checkbox" value="1" name="remember_me" id="rememberMe2"> Se
                                souvenir de
                                moi
                            </label>
                            <div>
                                <p class="float-end mt-2">
                                    <a href="">Mot de passe oublié?</a>
                                </p>
                            </div>
                            <div style="clear:both"></div>
                        </div>

                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <span style="margin-right: 5px;">Tu n'as pas encore de compte ?</span>
                            <a href="{{ route('register') }}" class="ml-3">S'inscrire</a>
                        </div>

                        <input type="hidden" name="quickLoginForm" value="1">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-end" id="loginSubmitButton">Se
                            connecter</button>
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const loginSubmitButton = document.getElementById('loginSubmitButton');

            loginForm.addEventListener('submit', function(event) {
                const email = document.getElementById('mEmail').value.trim();
                const password = document.getElementById('mPassword').value.trim();

                if (email === '' || password === '') {
                    event.preventDefault(); // Empêche l'envoi du formulaire
                    alert('Veuillez remplir tous les champs.');
                }
            });
        });
    </script>


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Choisissez puis réservez</h1>
            <div class="row g-4">

                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="Artisan"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Liste de prestataires</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                    form="fruitform">
                                    <option value="Mecanique">Mécanique</option>
                                    <option value="Menuiserie">Menuiserie</option>
                                    <option value="Maconnerie">Maçonnerie</option>
                                    <option value="Froid">froid</option>
                                    <option value="Couture">Couture</option>
                                    <option value="Tapisserie">Tapisserie</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i
                                                            class="fas fa-apple-alt me-2"></i>Mécanique</a>
                                                    <span>(3)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i
                                                            class="fas fa-apple-alt me-2"></i>Menuiserie</a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>
                                                        Couture</a>
                                                    <span>(2)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i
                                                            class="fas fa-apple-alt me-2"></i>Tapisserie</a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Coiffure
                                                    </a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>


                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>
                                                        Boucherie</a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>
                                                        Vitrerie</a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Transport
                                                    </a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Spécialiste
                                                        en
                                                        froid</a>
                                                    <span>(8)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Vente de
                                                        marchandise </a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i> Hygiène et
                                                        soins
                                                        corporels</a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i> Artisanat
                                                        d'art
                                                        et de décoration</a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i
                                                            class="fas fa-apple-alt me-2"></i>Agroalimentaire,
                                                        Alimentation, Restauration </a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>







                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>
                                                        Audiovisuel et communication
                                                    </a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>





                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>10% sur réservation</h4>




                                    </div>
                                </div>


                            </div>
                        </div>




                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">






                                <div class="container">
                                    <div class="row">
                                        @if (isset($services) && $services->isNotEmpty())
                                            @foreach ($services as $service)
                                                <div class="col-md-6 col-lg-6 col-xl-4">
                                                    <div class="rounded position-relative fruite-item">
                                                        <div class="fruite-img">
                                                            <img src="{{ asset('assets/' . $service->image) }}"
                                                                class="img-fluid w-100 rounded-top" alt=""
                                                                style="width: 500px; height: 350px; object-fit: cover;">
                                                        </div>
                                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                            style="top: 10px; left: 10px;">
                                                            {{ 'Métier' }}
                                                        </div>
                                                        <div
                                                            class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                            <h4>{{ $service->name }}</h4>
                                                            <p>{{ $service->description }}</p>
                                                            <p class="text-muted">Prestataire :
                                                                {{ $service->prestataire->nom }}
                                                                {{ $service->prestataire->prenom }}
                                                            </p>

                                                            <p class="text-muted">Ville :
                                                                {{ $service->prestataire->ville }}</p>
                                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                                {{-- <p class="text-dark fs-5 fw-bold mb-0">
                                                                    {{ number_format($service->price) }}pour la
                                                                    réservations</p> --}}
                                                                @auth
                                                                    <button type="button"
                                                                        class="btn border border-secondary rounded-pill px-3 text-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#reservationModal"
                                                                        data-service-id="{{ $service->id }}">
                                                                        Réservation
                                                                    </button>
                                                                @else
                                                                    <a href="{{ route('login') }}"
                                                                        class="btn border border-secondary rounded-pill px-3 text-primary">
                                                                        Connectez-vous pour réserver
                                                                    </a>
                                                                @endauth

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>Aucun service trouvé.</p>
                                        @endif
                                    </div>
                                </div>



                                <!-- Modal de réservation -->
                                <div class="modal fade" id="reservationModal" tabindex="-1"
                                    aria-labelledby="reservationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('reservations.store') }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="reservationModalLabel">Faire une
                                                        réservation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="service_id" id="service-id">
                                                    <div class="mb-3">
                                                        <label for="reservation-date" class="form-label">Date de
                                                            réservation</label>
                                                        <input type="date" class="form-control"
                                                            id="reservation-date" name="reservation_date" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="additional-notes" class="form-label">Notes
                                                            supplémentaires</label>
                                                        <textarea class="form-control" id="additional-notes" name="additional_notes" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary">Réserver</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="img/peinture.jpg" class="img-fluid w-100 rounded-top"
                                                alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">Métier</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>Peintre</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                incididunt</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                <a href="#"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i>Réservation</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="#" class="rounded">&laquo;</a>
                                        <a href="#" class="active rounded">1</a>
                                        <a href="#" class="rounded">2</a>
                                        <a href="#" class="rounded">3</a>

                                        <a href="#" class="rounded">&raquo;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->


    <script>
        // Script pour insérer l'ID du service dans le formulaire du modal
        document.addEventListener('DOMContentLoaded', function() {
            var reservationModal = document.getElementById('reservationModal');
            reservationModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var serviceId = button.getAttribute('data-service-id');
                var serviceIdInput = reservationModal.querySelector('#service-id');
                serviceIdInput.value = serviceId;
            });
        });
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Vérifie si l'utilisateur est connecté
            const isLoggedIn = @json(auth()->check());

            // Sélectionne tous les boutons de réservation
            document.querySelectorAll('.reservationButton').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    if (!isLoggedIn) {
                        event.preventDefault(); // Empêche la navigation
                        $('#quickLogin').modal('show'); // Affiche la modale
                    }
                });
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('form').addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch('{{ route('services.store') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Met à jour la vue avec les nouveaux services
                            const serviceList = document.querySelector('#service-list');
                            serviceList.innerHTML = data.servicesHtml;
                            // Ferme le modal
                            const modal = document.querySelector('#serviceModal');
                            const modalInstance = bootstrap.Modal.getInstance(modal);
                            modalInstance.hide();
                        }
                    })
                    .catch(error => console.error('Erreur:', error));
            });
        });
    </script>
    @include('layouts.footer')


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i
                                class="fas fa-copyright text-light me-2"></i>ArtisanConnect

                        </a>, Tout droit réservé.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Design par <a class="border-bottom" href="https://htmlcodex.com">Rosine Koffi</a> Développeur <a
                        class="border-bottom" href="https://themewagon.com">Full stack</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
