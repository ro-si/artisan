 @extends('layouts.app')
 @section('title', 'ARTISAN')


 @section('content')


     <!-- Single Page Header start -->
     <div class="container-fluid page-header py-5">

         <h1 class="text-center text-white display-6">Contactez-nous</h1>
         <ol class="breadcrumb justify-content-center mb-0">
             <li class="breadcrumb-item"><a href="#">Voun n'arrivez pas à réservez</a></li>
             <li class="breadcrumb-item"><a href="#">Contactez le service</a></li>
             <li class="breadcrumb-item active text-white">Pour vos problèmes</li>
         </ol>
     </div>
     <!-- Single Page Header End -->


     <!-- Contact Start -->
     <div class="container-fluid contact py-5">
         <div class="container py-5">
             <div class="p-5 bg-light rounded">
                 <div class="row g-4">
                     <div class="col-12">
                         <div class="text-center mx-auto" style="max-width: 700px;">
                             <h1 class="text-primary">J'ai des soucis</h1>
                             <p class="mb-4">Vous voulez des renseignements sur le service,
                                 Vous n'arrivez pas à vous inscrire, votre réservation a mis du temps. Contactez-nous le
                                 service vous aidera
                                 .
                         </div>
                     </div>
                     <div class="col-lg-12">
                         <div class="h-100 rounded">
                             <iframe class="rounded w-100" style="height: 400px;"
                                 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
                                 loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                         </div>
                     </div>
                     <div class="col-lg-7">
                         <form action="" class="">
                             <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Nom Prénom">
                             <input type="email" class="w-100 form-control border-0 py-3 mb-4"
                                 placeholder="Entrez votre email">
                             <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Votre message"></textarea>
                             <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                                 type="submit">Envoyez</button>
                         </form>
                     </div>
                     <div class="col-lg-5">
                         <div class="d-flex p-4 rounded mb-4 bg-white">
                             <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                             <div>
                                 <h4>Address</h4>
                                 <p class="mb-2">Abidjan,Cocody angré</p>
                             </div>
                         </div>
                         <div class="d-flex p-4 rounded mb-4 bg-white">
                             <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                             <div>
                                 <h4>Notre mail</h4>
                                 <p class="mb-2">info@example.com</p>
                             </div>
                         </div>
                         <div class="d-flex p-4 rounded bg-white">
                             <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                             <div>
                                 <h4>Telephone</h4>
                                 <p class="mb-2">(+225)22232425</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Contact End -->
