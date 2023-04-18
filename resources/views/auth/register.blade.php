<x-layouts.GuestLayout>
   
    
   <section class="sign-in-page">
       <div class="container">
          <div class="row justify-content-center align-items-center height-self-center">
             <div class="col-lg-7 col-md-12 align-self-center">
                <div class="sign-user_card ">                    
                   <div class="sign-in-page-data">
                      <div class="sign-in-from w-100 m-auto">
                          <!-- Session Status -->
                         <x-auth-session-status class="mb-4" :status="session('status')" />

                         <!-- Validation Errors -->
                         <x-auth-validation-errors class="mb-4" :errors="$errors" />
                         <form method="post" action="{{ route('register') }}" data-toggle="validator" class="">
                            {{csrf_field()}}
                            <div class="row">
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label>Nom d'utilisateur</label>
                                     <input type="text" class="form-control mb-0" name="user_name" value="{{old('user_name')}}" id="username" required autocomplete="off" placeholder="Nom d'utilisateur ">
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="form-group">  
                                     <label>Email</label>                               
                                     <input type="email" class="form-control mb-0" name="email" value="{{old('email')}}" id="email" required autocomplete="off" placeholder="Email">
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label>Prénom</label>
                                     <input type="text" class="form-control mb-0" name="first_name" value="{{old('first_name')}}"  required  autocomplete="off" placeholder="Prénom ">
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="form-group">  
                                     <label>Nom</label>                               
                                     <input type="text" class="form-control mb-0" name="last_name" value="{{old('last_name')}}" id="lastname" required autocomplete="off" placeholder="Nom">
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="form-group">   
                                     <label>Mot de passe</label>                              
                                     <input type="password" class="form-control mb-0" name="password" required autocomplete="new-password" placeholder="Mot de passe">
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="form-group"> 
                                     <label>Confirmer mot de passe</label>                                
                                     <input type="password" class="form-control mb-0" name="password_confirmation" required autocomplete="off" placeholder="Confirmer mot de passe">
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="form-group"> 
                                     <label>Profil</label>
                                                                     
                                       <select name="role" class="form-control">
                                          <option value="" >--Choisir profil</option>  
                                          @foreach ($roles as $key => $value)
                                             <option value="{{ $value->name }}">{{ $value->title }}</option>
                                          @endforeach
                                       </select>
                                  </div>
                               </div>
                               
                            </div>
                            <!-- <div class="custom-control custom-radio mt-2">
                               <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                               <label class="custom-control-label" for="customRadio1">Premium-$39 / 3 Months
                                  with a 5 day free trial</label>
                             </div>
                             <div class="custom-control custom-radio mt-2">
                               <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                               <label class="custom-control-label" for="customRadio2"> Basic- $19 / 1 Month</label>
                             </div>
                             <div class="custom-control custom-radio mt-2">
                               <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                               <label class="custom-control-label" for="customRadio3">Free-Free</label>
                             </div> -->
                             
                             <button type="submit" class="btn btn-primary my-2">S'inscrire</button>     
                            <div class="mt-3 ">
                               <div class="d-flex justify-content-center links">
                               Vous avez déjà un compte &nbsp;<a href="{{route('login')}}" class="text-primary">S'identifier</a>
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
