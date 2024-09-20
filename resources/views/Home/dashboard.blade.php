<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Artisan-Connect')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />

    <style>
        .modal-content {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .modal-body {
            padding: 1.25rem;
        }

        .form-control {
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
            padding: 0.75rem 1.25rem;
        }

        .modal {
            z-index: 1050;
            /* Assure-toi que le modal est au-dessus des autres éléments */
        }

        .modal-backdrop {
            z-index: 1040;
            /* Assure-toi que l'arrière-plan est sous le modal */
        }

        /* Assure-toi que le modal est visible */
        .modal {
            display: block;
            /* Assure-toi que le modal est affiché */
            opacity: 1;
            /* Assure-toi que le modal est opaque */
            transition: opacity 0.3s ease;
            /* Transition pour l'apparition/disparition */
        }

        /* Assure-toi que l'arrière-plan (backdrop) est visible */
        .modal-backdrop.show {
            /*opacity: 0.5;*/
            /* Ajuste l'opacité de l'arrière-plan si nécessaire */
        }

        /* Assure-toi que les champs du formulaire ne sont pas affectés par le CSS du modal */
        .modal-body input,
        .modal-body textarea {
            opacity: 1;
            /* Assure-toi que les champs du formulaire sont opaques */
            pointer-events: auto;
            /* Assure-toi que les champs du formulaire sont interactifs */
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html">
                    <img src="{{ asset('img/logo.png') }}" class="mr-2" alt="logo"
                        style="width: 200px; height: auto;" />
                </a>

                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('img/logo.png') }}"
                        alt="logo" style="width: 200px; height: auto;" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">

                            <button id="openModalButton" type="button" class="btn btn-primary">
                                Ajouter votre service
                            </button>

                        </div>
                    </li>
                </ul>

                <!-- Modal -->
                <!-- Modal -->
                <div id="serviceModal"
                    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center;">
                    <div style="background: white; padding: 20px; border-radius: 5px; width: 80%; max-width: 600px;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h5>Ajouter un service</h5>
                            <button id="closeModalButton"
                                style="background: none; border: none; font-size: 1.5em; cursor: pointer;">&times;</button>
                        </div>
                        <div style="margin-top: 20px;">
                            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="serviceName" class="form-label">Nom du
                                        service</label>
                                    <select id="serviceName" name="name" class="form-select" required>
                                        <option value="" disabled selected>Sélectionnez votre secteur</option>
                                        <option value="Mécanique">Mécanique</option>
                                        <option value="Menuisier">Menuisier</option>
                                        <option value="Charpenterie">Charpenterie</option>
                                        <option value="Maçonnerie">Maçonnerie</option>
                                        <option value="Spécialiste Froid">Spécialiste Froid</option>
                                        <option value="Couture">Couture</option>
                                        <option value="Tapisserie">Tapisserie</option>
                                        <option value="Coiffure">Coiffure</option>
                                        <option value="Bijouterie">Bijouterie</option>
                                        <option value="Electronique(réparateur TV, portable, etc)">Electronique
                                            (réparateur TV, portable, etc)</option>
                                        <option value="Briqueterie">Briqueterie</option>
                                        <option value="Vente de marchandise">Vente de marchandise</option>
                                        <option value="Agroalimentaire, alimentaire, restauration">Agroalimentaire,
                                            alimentaire, restauration</option>
                                        <option value="Vitrerie">Vitrerie</option>
                                        <option value="Hygiène et soins corporels">Hygiène et soins corporels</option>
                                        <option value="Audiovisuel et communication">Audiovisuel et communication
                                        </option>
                                        <option value="Transport">Transport</option>
                                        <option value="Artisanat d'art et de décoration">Artisanat d'art et de
                                            décoration</option>
                                        <option value="Autres(préciser)">Autres (préciser)</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="serviceDescription" class="form-label">Description du service</label>
                                    <textarea class="form-control" id="serviceDescription" name="description" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="servicePrice" class="form-label">Prix du service</label>
                                    <input type="number" class="form-control" id="servicePrice" name="price"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="serviceImage" class="form-label">Image du service</label>
                                    <input type="file" class="form-control" id="serviceImage" name="image"
                                        accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif




                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="icon-bell mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>

                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="ti-settings mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Paramètre</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Votre message
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="ti-user mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Réservations</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        12h
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <!-- <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="images/faces/face28.jpg" alt="profile" />
                        </a>-->


                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                            id="profileDropdown">
                            <span class="nav-profile-name">
                                {{ auth()->guard('prestataires')->check() ? auth()->guard('prestataires')->user()->nom : 'Utilisateur' }}
                            </span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">

                            <a class="dropdown-item">
                                <i class="ti-power-off text-primary"></i>
                                Déconnexion
                            </a>
                        </div>
                        @csrf
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <i class="icon-ellipsis"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Mon compte</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <!-- <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/buttons.html">Buttons</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/typography.html">Typography</a></li>
                            </ul>
                        </div>-->
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Form elements</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic
                                        Elements</a></li>
                            </ul>
                        </div>
                    </li>-->
                    <!--<li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false"
                            aria-controls="charts">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Charts</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/charts/chartjs.html">ChartJs</a></li>
                            </ul>
                        </div>
                    </li>-->
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false"
                            aria-controls="tables">
                            <i class="icon-grid-2 menu-icon"></i>
                            <span class="menu-title">Tables</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic
                                        table</a></li>
                            </ul>
                        </div>
                    </li>-->
                    <!--<li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false"
                            aria-controls="icons">
                            <i class="icon-contract menu-icon"></i>
                            <span class="menu-title">Icons</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a>
                                </li>
                            </ul>
                        </div>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                            aria-controls="auth">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Page utilisateur</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Connexion
                                    </a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html">
                                        Inscription </a></li>
                            </ul>
                        </div>
                    </li>


                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Bienvenue Artisan</h3>
                                    <h6 class="font-weight-normal mb-0">Visitez votre dashboard pour vous
                                        <span class="text-primary">familiarisé!</span>
                                    </h6>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                            <button class="btn btn-sm btn-light bg-white dropdown-toggle"
                                                type="button" id="dropdownMenuDate2" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true">
                                                <i class="mdi mdi-calendar"></i> Aujourd'hui (4 juillet 2024)
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuDate2">
                                                <a class="dropdown-item" href="#">January - March</a>
                                                <a class="dropdown-item" href="#">March - June</a>
                                                <a class="dropdown-item" href="#">June - August</a>
                                                <a class="dropdown-item" href="#">August - November</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class=" ">
                                <div class="card-people mt-auto">
                                    <img src="{{ asset('img/pagne.jpg') }}" alt="people">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                            <p class="mb-4">Pargez votre service</p>
                                            <p class="fs-30 mb-2">01111</p>
                                            <p>Pas plus</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Consultez votre réservation</p>
                                            <p class="fs-30 mb-2">011</p>
                                            <p>Toujours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Lisez vos notifications</p>
                                            <p class="fs-30 mb-2">0234</p>
                                            <p>De temps en temps</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">
                                            <p class="mb-4">personnalisez votre espace</p>
                                            <p class="fs-30 mb-2">0987</p>
                                            <p>Cliquez sur paramètres</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Bienvenue sur
                            ArtisanConnect.
                            <a href="" target="_blank">Votre site de prestation
                                à tout moment</a> les droits sont réserver..</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Vos informations
                            sont réserver <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Design <a
                                href="https://www.themewagon.com/" target="_blank">ArtisanConnect</a></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>-->
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->







    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sélectionner le bouton pour ouvrir le modal
            var openModalButton = document.getElementById('openModalButton');
            // Sélectionner le modal
            var modalElement = document.getElementById('serviceModal');
            // Sélectionner le bouton pour fermer le modal
            var closeModalButton = document.getElementById('closeModalButton');

            // Fonction pour afficher le modal
            function showModal() {
                modalElement.style.display = 'flex';
            }

            // Fonction pour fermer le modal
            function closeModal() {
                modalElement.style.display = 'none';
            }

            // Ajouter un événement de clic au bouton pour ouvrir le modal
            openModalButton.addEventListener('click', function() {
                showModal();
            });

            // Ajouter un événement de clic au bouton pour fermer le modal
            closeModalButton.addEventListener('click', function() {
                closeModal();
            });

            // Fermer le modal en cliquant en dehors de la boîte de contenu
            window.addEventListener('click', function(event) {
                if (event.target === modalElement) {
                    closeModal();
                }
            });
        });
    </script>





    <!-- End custom js for this page-->

</body>

</html>
