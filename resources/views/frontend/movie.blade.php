<x-layouts.frontend>
        <body>

         
         <section class="iq-main-slider p-0">
            <div id="tvshows-slider" class="iq-rtl-direction">

            @foreach($movies as $movie)
               <div>
                  <a href="{{ route('frontend.moviedetails') }}">
                        <div class="shows-img">
                           <?php
                           
                           $couverture = explode(',', $movie->image)[1];
                           ?>
                           <img src="{{ asset('assets/films/couvertures/'.$couverture) }}" class="w-100" alt="">
                           <div class="shows-content">
                              <h4 class="text-white mb-1">{{  $movie->titre }}</h4>
                              <div class="movie-time d-flex align-items-center">
                                    <div class="badge badge-secondary p-1 mr-2">{{ $movie->annee }}</div>
                                    <span class="text-white">{{ $movie->duree }}</span>
                              </div>
                           </div>
                        </div>
                  </a>
               </div>
            @endforeach

               
               
                
            </div>
            <div class="dropdown genres-box">
               <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  Genres
               </button>
               <div class="dropdown-menu three-column" aria-labelledby="dropdownMenuButton">
                  @foreach($categories as $categorie)
                  <a class="dropdown-item" href="{{$categorie->id}}">{{$categorie->nom}}</a>
                  @endforeach
                  
                  
               </div>
            </div>
         </section>

         <div class="main-content">
            @foreach($movies->groupBy('id_categorie') as $category => $moviesByCategory)
               <section id="iq-favorites">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                           <div class="iq-main-header d-flex align-items-center justify-content-between">
                           <!-- <img src="{{ asset('assets/films/couvertures/image_6436ad2dc79a1__large.jpg') }}" class="w-100" alt=""> -->
                              <h4 class="main-title">{{$moviesByCategory[0]->nom_cat }}</h4>
                           </div>
                           <div class="favorites-contens">
                              <ul class="favorites-slider list-inline  row p-0 mb-0 iq-rtl-direction">
                              @foreach($moviesByCategory as $movie)
                              <?php
                                 $couverture = explode(',', $movie->image)[0];
                              ?>
                                 <li class="slide-item">
                                       <div class="block-images position-relative">
                                          <div class="img-box">
                                             <img src="{{ asset('assets/films/couvertures/'.$couverture) }}" class="img-fluid" alt="">
                                          </div>
                                          <div class="block-description">
                                             <h6 class="iq-title"><a href="{{ route('showdetails', ['id' => $movie->id]) }}">{{ $movie->titre }}</a></h6>
                                             <div class="movie-time d-flex align-items-center my-2">
                                                <!-- <div class="badge badge-secondary p-1 mr-2">5+</div> -->
                                                <span class="text-white">{{ $movie->duree }}</span>
                                             </div>
                                             <div class="hover-buttons">
                                                <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                   Visionner
                                                </span>
                                             </div>
                                          </div>
                                          <!-- <div class="block-social-info">
                                             <ul class="list-inline p-0 m-0 music-play-lists">
                                                <li class="share">
                                                   <span><i class="ri-share-fill"></i></span>
                                                   <div class="share-box">
                                                      <div class="d-flex align-items-center">
                                                         <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-facebook-fill"></i></a>
                                                         <a href="https://twitter.com/intent/tweet?text=Currentlyreading" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-twitter-fill"></i></a>
                                                         <a href="#" data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" class="share-ico iq-copy-link" tabindex="0"><i class="ri-links-fill"></i></a>
                                                      </div>
                                                   </div>
                                                </li>
                                                <li>
                                                   <span><i class="ri-heart-fill"></i></span>
                                                   <span class="count-box">19+</span>
                                                </li>
                                             <li><span><i class="ri-add-line"></i></span></li>
                              
                                             </ul>
                                          </div> -->
                                       </div>
                                 </li>
                              @endforeach
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            @endforeach
         </div>
         
         <div id="back-to-top">
            <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
         </div>
    </body>
        
</x-layouts.frontend>