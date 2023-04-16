<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Modifier film</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="{{ route('dashboard.updateSavingMovie', ['id' => $movie[0]->id]) }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                    <div class="col-6 form-group">
                                        <input type="text" class="form-control" name="titre" placeholder="Title" value="{{ $movie[0]->titre }}">
                                    </div>
                                    <div class="col-6 form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="producteur">
                                            <option selected disabled="">Choose Producer</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}" @if($user->id == $movie[0]->producteur) selected @endif >{{ Str::ucfirst($user->first_name ." ". $user->last_name)}}</option>
                                                @endforeach
                                            </select>
                                        <!-- <input type="text" class="form-control" name="producteur" placeholder="Producteur" value="{{ $movie[0]->producteur }}"> -->
                                    </div>
                                    
                                    <div class="col-2 form_gallery form-group">
                                    <?php
                                        $couverture = explode(',', $movie[0]->image)[0];
                                    ?>
                                        <!-- <label id="gallery2" for="form_gallery-upload">Image actuel</label> -->
                                        <img src="{{ asset('assets/films/couvertures/'.$couverture) }}" alt="{{ $couverture }}" class="img-fluid mb-3"  onclick="showModal(this)">
                                    </div>
                                    <div class="col-10 form_gallery form-group">
                                        <label id="gallery2" for="form_gallery-upload">Charger couverture</label>
                                        <input data-name="#gallery2" id="form_gallery-upload" name="image" class="form_gallery-upload"
                                            type="file" accept=".png, .jpg, .jpeg">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="categorie">
                                            <option disabled="">Catégorie</option>
                                            @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}}" @if($categorie->id == $movie[0]->id_categorie) selected @endif>{{$categorie->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-12 form-group">
                                        <textarea id="text"  rows="5" name="description" class="form-control"
                                            placeholder="Description">{{ $movie[0]->description }}</textarea>
                                    </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="d-block position-relative">
                                    <div class="form_video-upload">
                                        <input type="file" accept="video/mp4,video/x-m4v,video/*" name="video" >
                                        <p>Charger  video</p>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="d-block position-relative">
                                    <div class="form_video-upload">
                                    <iframe class="embed-responsive-item" src="{{ asset('assets/films/videos/'.$movie[0]->video) }}" allowfullscreen></iframe>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <input type="text" name="annee" class="form-control" placeholder="Release year" value="{{ $movie[0]->annee }}">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <select class="form-control" id="exampleFormControlSelect3" name="langue">
                                    <option selected disabled="">Langue</option>
                                    @foreach($langues as $langue)
                                        <option value="{{$langue->id}}"  @if($langue->id == $movie[0]->id_langue) selected @endif>{{$langue->nom}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <input type="time" class="form-control" placeholder="Movie Duration" name="duree" value="{{ $movie[0]->duree }}">
                                </div>
                                <div class="col-12 form-group ">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    <button type="reset" class="btn btn-danger">Annulé</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fenêtre modale -->

</x-layouts.dashboard>

