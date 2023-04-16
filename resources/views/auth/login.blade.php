<x-layouts.GuestLayout>

   <section class="sign-in-page">
       <div class="container">
          <div class="row justify-content-center align-items-center height-self-center">
             <div class="col-lg-5 col-md-12 align-self-center">
                <div class="sign-user_card ">                    
                   <div class="sign-in-page-data">
                      <div class="sign-in-from w-100 m-auto">
                         <h3 class="mb-3 text-center">Connexion</h3>
                         <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('login') }}" data-toggle="validator" class="mt-4">
                                  {{csrf_field()}}
                                  <!-- <div class="form-group">
                                     <p class="text-center">Admin : admin@example.com , password</br>
                                        Demo Admin : demo@example.com , password</br>
                                        User : user@example.com , password</p>
                                       <label for="roles">Roles</label>
                                       <select name="roles" class="form-control">
                                       @foreach ($roles as $key => $value)
                                          <option value="{{ $value->name }}">{{ $value->title }}</option>
                                       @endforeach
                                       </select>

                                 
                                 </div> -->
                                    <div class="form-group">  
                                    <label for="email">Email</label>                               
                                       <input type="email" class="form-control mb-0" id="exampleInputEmail1" name="email" value="{{env('IS_DEMO') ? 'admin@example.com' : old('email')}}" required autocomplete="off" autofocus placeholder=" Email">
                                    </div>
                                    <div class="form-group">
                                    <label for="password">Mot de passe</label>                                 
                                       <input type="password" class="form-control mb-0" id="exampleInputPassword2" name="password" value="{{ env('IS_DEMO') ? 'password' : '' }}" required autocomplete="current-password" placeholder="Mot de passe">
                                    </div>
                                    <div class="sign-info">
                                             <button type="submit" class="btn btn-primary">Se connecter</button>
                                             <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                                             </div>                                
                                    </div>
  
                         </form>
                      </div>
                   </div>
                   <div class="mt-3">
                        <div class="d-flex justify-content-center links">
                           Vous n'avez pas de compte ? <a href="{{route('register')}}" class="text-primary ml-2">Inscrivez-vous</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                           <a href="{{route('frontend.forgotpassword')}}" class="f-link">Mot de passe oublié?</a>
                        </div>
                     </div>
                   
                </div>
             </div>
          </div>
       </div>
    </section>

</x-layouts.GuestLayout>