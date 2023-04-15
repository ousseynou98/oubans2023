
    <div class="rtl-box">
         <button type="button" id="flip"  class="btn btn-light rtl-btn">
               <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 20 20" fill="white">
               <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
               </svg>
         </button>
         <div class="rtl-panel" id="panel">
            <ul class="modes">
               <li class="dir-btn"  data-mode="rtl" data-active="false" data-value="ltr"><a href="#">LTR</a></li>
               <li class="dir-btn" data-mode="rtl" data-active="true"   data-value="rtl"><a href="#">RTL</a></li>
            </ul>
         </div>
      </div>
<footer id="contact" class="footer-one iq-bg-dark">
     
    <!-- Address -->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row footer-standard">
                <div class="col-lg-7">
                    <div class="widget text-left">
                        <div class="menu-footer-link-1-container">
                            <ul id="menu-footer-link-1" class="menu p-0">
                                <li id="menu-item-7314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7314">
                                    <a href="#">Conditions d'utilisation</a>
                                </li>
                                <li id="menu-item-7316" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7316">
                                    <a href="{{route('frontend.privacypolicy')}}">Politique de confidentialité</a>
                                </li>
                                <li id="menu-item-7118" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7118">
                                   <a href="{{route('frontend.faq')}}">FAQ</a>
                               </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="widget text-left">			
                        <div class="textwidget">
                            <p><small>© 2022 OUBANS. Tous les droits sont réservés. Toutes les vidéos et émissions sur cette plate-forme sont des marques déposées de, et toutes les images et contenus associés sont la propriété des producteurs ou  Oubans. La duplication et la copie de ceci sont strictement interdites. Tous les droits sont réservés.</small></p>
                        </div>
                    </div>                        
                </div>
                <div class="col-lg-2 col-md-6 mt-4 mt-lg-0">
                    <h6 class="footer-link-title">
                    Suivez-nous :
                    </h6>
                    <ul class="info-share"> 
                        <li><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>

                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="widget text-left">
                        <div class="textwidget">
                            <h6 class="footer-link-title"></h6>
                            <div class="d-flex align-items-center">
                                <a class="app-image" href="#">
                                    <img src="{{asset('frontend/images/logo.png')}}" alt="play-store"  width="160" height="60">
                                </a><br>
                                <a class="ml-3 app-image" href="ehodcorp.com"><img src="{{asset('frontend/images/ehodcorp.png')}}" alt="app-store" width="60" height="60"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Address END -->
</footer>