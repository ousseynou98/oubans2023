<x-layouts.frontend>

<body>
    <div class="video-container iq-main-slider" >
        {{-- <img src="{{asset("banners/".$show->banner_url)}}" alt="" srcset=""> --}}
        <video id="myVideo" controls>
           <source src="{{asset('episodes/'.$episodes[0]->filename)}}" type="video/mp4">
        </video>
     </div>
     <!-- Banner End -->
     <!-- MainContent -->
     <div class="main-content">
        <section class="movie-detail container-fluid">
           <div class="row">
              <div class="col-lg-12">
                 <div class="trending-info season-info g-border">
                    {{-- <h4 class="trending-text big-title text-uppercase mt-0">{{$movie->titre}}</h4> --}}
                    <div class="d-flex align-items-center text-white text-detail episode-name mb-0">
                       <!-- <span>S1E01</span>
                       <span class="trending-year">Lorem Ipsum is dummy text</span> -->
                    </div>
                    <button class="buy" onclick="buy(this)" data-item-id="88" >Acheter iphone (450000 XOF)</button>
                    {{-- <p class="trending-dec w-100 mb-0"><br>{{$show->description}}</p> --}}
                    <br><br><br><br>
                     {{-- <ul class="list-inline p-0 mt-4 share-icons music-play-lists">
                       <li><span><i class="ri-add-line"></i></span></li>
                       <li><span><i class="ri-heart-fill"></i></span></li>
                       <li class="share">
                          <span><i class="ri-share-fill"></i></span>
                          <div class="share-box">
                             <div class="d-flex align-items-center">
                                <a href="#" class="share-ico"><i class="ri-facebook-fill"></i></a>
                                <a href="#" class="share-ico"><i class="ri-twitter-fill"></i></a>
                                <a href="#" class="share-ico"><i class="ri-links-fill"></i></a>
                             </div>
                          </div>
                       </li>
                    </ul> --}}
                 </div>
              </div>
           </div>
        </section>
        {{-- <div class="main-content"> --}}
            <section id="iq-favorites">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                           <h4 class="main-title">Episodes</h4>
                        </div>
                        <div class="favorites-contens">
                           <ul class="favorites-slider list-inline  row p-0 mb-0 iq-rtl-direction ">
                            @foreach ($episodes as $episode)

                              <li class="slide-item">

                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('images/'.$episode->img_ep)}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$episode->id])}}">{{$episode->title}}</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">15+</div>
                                             <span class="text-white">{{$episode->duration}}</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="{{route('frontend.showdetails', ["id"=>$episode->id])}}" role="button" class="btn btn-hover iq-button" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>

                              </li>
                            @endforeach
                              {{-- <li class="slide-item">

                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/02.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">My True Friends</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">7+</div>
                                             <span class="text-white">2 Seasons</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="{{route('frontend.showdetails', ["id"=>$show->id])}}" role="button" class="btn btn-hover iq-button" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>

                              </li> --}}
                              {{-- <li class="slide-item">

                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/03.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">Arrival 1999</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">11+</div>
                                             <span class="text-white">3 Seasons</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="{{route('frontend.showdetails', ["id"=>$show->id])}}" role="button" class="btn btn-hover iq-button" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>

                              </li> --}}
                              {{-- <li class="slide-item">

                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/04.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">Night Mare</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">18+</div>
                                             <span class="text-white">3 Seasons</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="{{route('frontend.showdetails', ["id"=>$show->id])}}" role="button" class="btn btn-hover iq-button" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>

                              </li> --}}
                              {{-- <li class="slide-item">

                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/05.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">The Marshal King</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">17+</div>
                                             <span class="text-white">1 Season</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="{{route('frontend.showdetails', ["id"=>$show->id])}}" role="button" class="btn btn-hover iq-button" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>

                              </li> --}}
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            {{-- <section id="iq-upcoming-movie">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                           <h4 class="main-title">Best Of International Shows</h4>
                        </div>
                        <div class="upcoming-contens">
                           <ul class="favorites-slider list-inline  row p-0 mb-0 iq-rtl-direction">
                              <li class="slide-item">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/06.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">Last Track</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">19+</div>
                                             <span class="text-white">3 Seasons</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                Play
                                                Now</span>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>
                              </li>
                              <li class="slide-item">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/07.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">Dino Land</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">9+</div>
                                             <span class="text-white">2 Seasons</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="{{route('frontend.showdetails', ["id"=>$show->id])}}" role="button" class="btn btn-hover iq-button" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>
                              </li>
                              <li class="slide-item">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/08.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">Mission Moon</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">18+</div>
                                             <span class="text-white">3 Seasons</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="{{route('frontend.showdetails', ["id"=>$show->id])}}" role="button" class="btn btn-hover iq-button" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>
                              </li>
                              <li class="slide-item">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/03.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">Arrival 1999</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">11+</div>
                                             <span class="text-white">3 Seasons</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="{{route('frontend.showdetails', ["id"=>$show->id])}}" role="button" class="btn btn-hover iq-button" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>
                              </li>
                              <li class="slide-item">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/05.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">The Marshal King</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">17+</div>
                                             <span class="text-white">1 Season</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="{{route('frontend.showdetails', ["id"=>$show->id])}}" role="button" class="btn btn-hover iq-button" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <section id="iq-suggestede">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                           <h4 class="main-title">Shows We Recommend</h4>
                        </div>
                        <div class="suggestede-contens">
                           <ul class="favorites-slider list-inline  row p-0 mb-0 iq-rtl-direction">
                              <li class="slide-item">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/01.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">Day of Darkness</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">15+</div>
                                             <span class="text-white">2 Seasons</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <span class="btn btn-hover">
                                                <i class="fa fa-play mr-1" aria-hidden="true"></i> Play Now
                                             </span>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>
                              </li>
                              <li class="slide-item">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/08.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">Mission Moon</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">18+</div>
                                             <span class="text-white">3 Seasons</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="{{route('frontend.showdetails', ["id"=>$show->id])}}" role="button" class="btn btn-hover iq-button" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>
                              </li>
                              <li class="slide-item">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/05.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">The Marshal King</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">17+</div>
                                             <span class="text-white">1 Season</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="{{route('frontend.showdetails', ["id"=>$show->id])}}" role="button" class="btn btn-hover iq-button" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>
                              </li>
                              <li class="slide-item">
                                    <div class="block-images position-relative">
                                       <div class="img-box">
                                          <img src="{{asset('frontend/images/tvthrillers/04.jpg')}}" class="img-fluid" alt="">
                                       </div>
                                       <div class="block-description">
                                          <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">Knight Mare</a></h6>
                                          <div class="movie-time d-flex align-items-center my-2">
                                             <div class="badge badge-secondary p-1 mr-2">18+</div>
                                             <span class="text-white">3 Seasons</span>
                                          </div>
                                          <div class="hover-buttons">
                                             <a href="{{route('frontend.showdetails', ["id"=>$show->id])}}" role="button" class="btn btn-hover iq-button" tabindex="0">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
                                          </a>
                                          </div>
                                       </div>
                                       <div class="block-social-info">
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
                                       </div>
                                    </div>
                              </li>
                              <li class="slide-item">
                                 <div class="block-images position-relative">
                                    <div class="img-box">
                                       <img src="{{asset('frontend/images/tvthrillers/02.jpg')}}" class="img-fluid" alt="">
                                    </div>
                                    <div class="block-description">
                                       <h6 class="iq-title"><a href="{{route('frontend.showdetails', ["id"=>$show->id])}}">Friends</a></h6>
                                       <div class="movie-time d-flex align-items-center my-2">
                                          <div class="badge badge-secondary p-1 mr-2">14+</div>
                                          <span class="text-white">10 Seasons</span>
                                       </div>
                                       <div class="hover-buttons">
                                          <span class="btn btn-hover iq-button"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now</span>
                                       </div>
                                    </div>
                                    <div class="block-social-info">
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
                                          <li><span><i class="ri-heart-fill"></i></span>
                                        <span class="count-box">19+</span></li>
                                          <li><span><i class="ri-add-line"></i></span></li>
                                       </ul>
                                    </div>
                                 </div>
                           </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </section> --}}
         {{-- </div> --}}
     </div>

</body>

</x-layouts.frontend>
<script>
    const player = new Plyr('#myVideo', {
        i18n: {
            restart: 'Recommencer',
            rewind: 'Rembobiner {seektime}s',
            play: 'Lire',
            pause: 'Pause',
            fastForward: 'Avance rapide {seektime}s',
            seek: 'Chercher',
            played: 'Lu',
            buffered: 'Mise en mémoire tampon',
            currentTime: 'Temps actuel',
            duration: 'Durée',
            volume: 'Volume',
            mute: 'Muet',
            unmute: 'Son activé',
            enableCaptions: 'Activer les sous-titres',
            disableCaptions: 'Désactiver les sous-titres',
            download: 'Télécharger',
            enterFullscreen: 'Passer en plein écran',
            exitFullscreen: 'Sortir du plein écran',
            frameTitle: 'Lecteur vidéo pour {title}',
            captions: 'Sous-titres',
            settings: 'Réglages',
            pip: 'PIP',
            menuBack: 'Retour',
            speed: 'Vitesse',
            normal: 'Normal',
            quality: 'Qualité',
            loop: 'Boucle'
        },
        seekTime: 1,
    });

</script>
<script src="https://paytech.sn/cdn/paytech.min.js"></script>
<script>
   //  function buy(btn) {

   //      (new PayTech({

   //      })).withOption({
   //          requestTokenUrl           :   "/validation",
   //          method              :   'POST',
   //          headers             :   {
   //              // "Accept"          :    "text/html"
   //          },
   //          prensentationMode   :   PayTech.OPEN_IN_POPUP,
   //          willGetToken        :   function () {

   //          },
   //          didGetToken         : function (token, redirectUrl) {

   //          },
   //          didReceiveError: function (error) {
   //              // console.log(error);
   //          },
   //          didReceiveNonSuccessResponse: function (jsonResponse) {
   //              // console.log(jsonResponse);
   //          }
   //      }).send();

   //      // .send params are optional
   //  }

   function buy(btn) {
    // Récupération du jeton CSRF
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Configuration de la requête
    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            // Ajoutez les données de la requête ici
        }),
    };

    // Envoi de la requête
    fetch('/validation', requestOptions)
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error(error));
}

</script>
<style>
   .plyr {
    position: static !important;
}
</style>
