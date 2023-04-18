<x-layouts.frontend>

<body>
    <div class="video-container iq-main-slider" >
        <video id="myVideo" controls>
           <source src="{{asset('assets/films/videos/'.$movie->video)}}" type="video/mp4">
        </video>
     </div>
     <!-- Banner End -->
     <!-- MainContent -->
     <div class="main-content">
        <section class="movie-detail container-fluid">
           <div class="row">
              <div class="col-lg-12">
                 <div class="trending-info season-info g-border">
                    <h4 class="trending-text big-title text-uppercase mt-0">{{$movie->titre}}</h4>
                    <div class="d-flex align-items-center text-white text-detail episode-name mb-0">
                       <!-- <span>S1E01</span>
                       <span class="trending-year">Lorem Ipsum is dummy text</span> -->
                    </div>
                    <button class="buy" onclick="buy(this)" data-item-id="88" >Acheter iphone (450000 XOF)</button>
                    <p class="trending-dec w-100 mb-0"><br>{{$movie->description}}</p>
                    <br><br><br><br>
                    <!-- <ul class="list-inline p-0 mt-4 share-icons music-play-lists">
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
                    </ul> -->
                 </div>
              </div>
           </div>
        </section>
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