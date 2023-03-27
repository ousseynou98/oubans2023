<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Détails du film</h4>
                        <a href="" class="btn btn-danger">Retour</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/films/couvertures/'.$movie[0]->image) }}" alt="{{ $movie[0]->titre }}" class="img-fluid mb-3">
                            </div>
                            <div class="col-md-8">
                                <h2 class="mb-3">{{ $movie[0]->titre }}</h2>
                                <p><strong>Catégorie :</strong> {{ $movie[0]->nom_cat }}</p>
                                <p><strong>Producteur :</strong> {{ $movie[0]->producteur }}</p>
                                <p><strong>Année :</strong> {{ $movie[0]->annee }}</p>
                                <p><strong>Langue :</strong> {{ $movie[0]->nom_langue }}</p>
                                <p><strong>Durée :</strong> {{ $movie[0]->duree }}</p>
                                <p><strong>Description :</strong></p>
                                <p>{{ $movie[0]->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Vidéo</h4>
</div>
<div class="card-body">
<div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src="{{ $movie[0]->video }}" allowfullscreen></iframe>
</div>
</div>
</div>
</div>
</div>
</div>
</x-layouts.dashboard>
