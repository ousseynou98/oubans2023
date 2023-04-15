<x-layouts.dashboard>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Ajouter film</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="{{ route('dashboard.storeMovie') }}" method="post" enctype="multipart/form-data" >
                        @csrf
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="row">
                                    <div class="col-6 form-group">
                                        <input type="text" class="form-control" name="titre" placeholder="Title">
                                    </div>
                                    <div class="col-6 form-group">
                                        <input type="text" class="form-control" name="producteur" placeholder="Producteur">
                                    </div>
                                    <div class="col-12 form_gallery form-group">
                                        <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                        <input data-name="#gallery2" id="form_gallery-upload" name="image" class="form_gallery-upload"
                                            type="file" accept=".png, .jpg, .jpeg">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="categorie">
                                            <option disabled="">Catégorie</option>
                                            @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-12 form-group">
                                        <textarea id="text" name="text" rows="5" name="description" class="form-control"
                                            placeholder="Description"></textarea>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="d-block position-relative">
                                    <div class="form_video-upload">
                                        <input type="file" accept="video/mp4,video/x-m4v,video/*" name="video" >
                                        <p>Upload video</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <input type="text" name="annee" class="form-control" placeholder="Release year">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <select class="form-control" id="exampleFormControlSelect3" name="langue">
                                    <option selected disabled="">Langue</option>
                                    @foreach($langues as $langue)
                                        <option value="{{$langue->id}}">{{$langue->nom}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <input type="time" class="form-control" placeholder="Movie Duration" name="duree">
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
</x-layouts.dashboard>