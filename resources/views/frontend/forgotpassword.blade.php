<x-layouts.GuestLayout>
    <body>
        <section class="sign-in-page">
            <div class="container">
               <div class="row justify-content-center align-items-center height-self-center">
                  <div class="col-lg-5 col-md-12 align-self-center">
                     <div class="sign-user_card ">                    
                        <div class="sign-in-page-data">
                           <div class="sign-in-from w-100 m-auto">
                              <h3 class="mb-3 text-center">Réinitialisation mot de passe</h3>
                              <p class="text-body">Entrez votre adresse e-mail et nous vous enverrons un e-mail avec des instructions pour réinitialiser votre mot de passe.</p>
                              <form class="mt-4" action="{{route('frontend.home')}}">
                                 <div class="form-group">                                 
                                    <input type="email" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter email" autocomplete="off" required>
                                 </div>                           
                                 <div class="d-inline-block w-100">
                                 <a href="{{route('login')}}" class="btn btn-primary float-right">Confirmer</a>
                              </div>             
                              </form>
                           </div>
                        </div>                    
                     </div>
                  </div>
               </div>
               <!-- Sign in END -->
               <!-- color-customizer -->
            </div>
         </section>
    </body>
</x-layouts.GuestLayout>