<x-layouts.GuestLayout>
   <section class="sign-in-page">
      <div class="container h-100">
         <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6 col-sm-12 col-12 ">
               <div class="sign-user_card ">
                  <div class="sign-in-page-data">
                     <div class="sign-in-from w-100 m-auto">
                        <h3 class="mb-0">Réinitialiser  mot de passe</h3>
                        <p class="text-white">Entrez votre adresse e-mail et nous vous enverrons un e-mail avec des instructions pour réinitialiser votre mot de passe.</p>
                        <form class="mt-4" action="{{ route('login') }}" data-toggle="validator">
                           <div class="form-group">
                             <input type="email" class="form-control mb-0" id="exampleInputEmail2" placeholder="Email address" autocomplete="off" required>                                
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
      </div>
   </section>
</x-layouts.GuestLayout>