<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="row">
           <div class="col-lg-12">
              <div class="iq-card">
                 <div class="iq-card-body">
                     {{-- Add Your HTML Content Here..... --}}
                    @if ($show)
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe class="embed-responsive-item" src="{{ asset("banners/". $show->banner_url) }}" allowfullscreen></iframe>
                        </div>
                        <p data-animation-in="fadeInUp" data-delay-in="1.2">{{$show->description}}
                         </p>
                       <div class="trending-list" data-wp_object-in="fadeInUp" data-delay-in="1.2">
                          <div class="text-primary title starring">
                              Starring: <span class="text-body">{{$show->first_name." ".$show->last_name}}</span>
                          </div>
                          <div class="text-primary title genres">
                              Genres: <span class="text-body">{{$show->nom}}</span>
                          </div>
                          <div class="text-primary title tag">
                              Tag: <span class="text-body">{{"#".$show->nom}}</span>
                          </div>
                      </div>
                    @endif
                 </div>
              </div>
           </div>
        </div>
    </div>
</x-layouts.dashboard>
