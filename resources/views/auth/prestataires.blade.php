<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Artisan-Connect')</title>
    <!-- plugins:css -->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Devenez prestataire</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Inscrivez-vous</a></li>
            <li class="breadcrumb-item"><a href="#">Ajoutez vos services</a></li>
            <li class="breadcrumb-item active text-white">Réservez des réservation</li>
        </ol>
    </div>
    <!-- Single Page Header End -->



    @extends('layouts.app')
    @section('title', 'Artisan')

    @section('content')

        <!-- Checkout Page Start -->
        <div class="container py-5">
            <h1 class="mb-4 text-center">Formulaire d'inscription</h1>
            <form action="{{ route('prestataires.store') }}" method="POST">
                @csrf

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom" class="form-label">Nom<sup>*</sup></label>
                            <input type="text" id="nom" name="nom" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prenom" class="form-label">Prénoms<sup>*</sup></label>
                            <input type="text" id="prenom" name="prenom" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="situation_geographique" class="form-label">Situation
                                géographique<sup>*</sup></label>
                            <input type="text" id="situation_geographique" name="situation_geographique"
                                class="form-control" placeholder="Votre lieu d'activité" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="numero_mobile" class="form-label">Numéro mobile<sup>*</sup></label>
                            <input type="text" id="numero_mobile" name="numero_mobile" class="form-control"
                                placeholder="Numéro de téléphone" required>
                        </div>
                        @if ($errors->has('numero_mobile'))
                            <span class="text-danger">{{ $errors->first('numero_mobile') }}</span>
                        @endif

                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif

                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif

                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="sector" class="form-label">Secteur d'activité<sup>*</sup></label>
                            <select id="sector" name="secteur_activite" class="form-select" required>
                                <option value="" disabled selected>Sélectionnez votre secteur</option>
                                <option value="Mécanique">Mécanique</option>
                                <option value="Menuisier/charpenterie">Menuisier/charpenterie</option>
                                <option value="Maçonnerie">Maçonnerie</option>
                                <option value="Spécialiste Froid">Spécialiste Froid</option>
                                <option value="Couture">Couture</option>
                                <option value="Tapisserie">Tapisserie</option>
                                <option value="Coiffure">Coiffure</option>
                                <option value="Bijouterie">Bijouterie</option>
                                <option value="Electronique(réparateur TV, portable, etc)">Electronique (réparateur TV,
                                    portable, etc)</option>
                                <option value="Briqueterie">Briqueterie</option>
                                <option value="Vente de marchandise">Vente de marchandise</option>
                                <option value="Agroalimentaire, alimentaire, restauration">Agroalimentaire, alimentaire,
                                    restauration</option>
                                <option value="Vitrerie">Vitrerie</option>
                                <option value="Hygiène et soins corporels">Hygiène et soins corporels</option>
                                <option value="Audiovisuel et communication">Audiovisuel et communication</option>
                                <option value="Transport">Transport</option>
                                <option value="Artisanat d'art et de décoration">Artisanat d'art et de décoration</option>
                                <option value="Autres(préciser)">Autres (préciser)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address<sup>*</sup></label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group position-relative">
                            <label for="password" class="form-label">Mot de passe<sup>*</sup></label>
                            <input type="password" id="password" name="password" class="form-control" required>
                            <div class="position-absolute top-0 end-0 pe-3 pt-2">
                                <input type="checkbox" id="togglePassword"> Afficher le mot de passe
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group position-relative">
                            <label for="password_confirmation" class="form-label">Confirmer mot de
                                passe<sup>*</sup></label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" required>
                            <div class="position-absolute top-0 end-0 pe-3 pt-2">
                                <input type="checkbox" id="toggleConfirmPassword"> Afficher le mot de passe
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="latitude" class="form-label">Position GPS (Latitude)<sup>*</sup></label>
                            <input type="text" id="latitude" name="latitude" class="form-control"
                                placeholder="Latitude" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="longitude" class="form-label">Position GPS (Longitude)<sup>*</sup></label>
                            <input type="text" id="longitude" name="longitude" class="form-control"
                                placeholder="Longitude" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="button" class="btn btn-primary" id="getLocation">
                            Obtenez ma position GPS
                        </button>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="plage_horaire" class="form-label">Plage horaire de travail<sup>*</sup></label>
                            <input type="text" id="plage_horaire" name="plage_horaire" class="form-control"
                                placeholder="Ex : 8h00 - 17h00" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="ville" class="form-label">Ville<sup>*</sup></label>
                            <input type="text" id="ville" name="ville" class="form-control"
                                placeholder="Ville" required>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-success w-100">
                            Inscrivez-vous
                        </button>
                    </div>
                    <div class="col-12 mt-3 text-center">
                        <p>Avez-vous un compte ? <a href="{{ route('prestataires.login.form') }}">Connectez-vous</a></p>
                    </div>
                </div>
            </form>
        </div>
        <!-- Checkout Page End -->

        <script>
            // Toggle password visibility
            document.getElementById('togglePassword').addEventListener('change', function() {
                const passwordField = document.getElementById('password');
                passwordField.type = this.checked ? 'text' : 'password';
            });

            document.getElementById('toggleConfirmPassword').addEventListener('change', function() {
                const passwordField = document.getElementById('password_confirmation');
                passwordField.type = this.checked ? 'text' : 'password';
            });
        </script>

        <script>
            document.getElementById('getLocation').addEventListener('click', function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        document.getElementById('latitude').value = position.coords.latitude;
                        document.getElementById('longitude').value = position.coords.longitude;
                    }, function(error) {
                        alert(
                            "Impossible de récupérer votre position. Assurez-vous que la géolocalisation est activée."
                        );
                    });
                } else {
                    alert("La géolocalisation n'est pas supportée par votre navigateur.");
                }
            });
        </script>

    @endsection



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>



</body>

</html>
