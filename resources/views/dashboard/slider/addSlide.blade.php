<x-layouts.dashboard>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Ajout slide</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="{{ route('dashboard.storeSlide') }}" method="post" enctype="multipart/form-data" >
                        @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                    <div class="col-6 form-group">
                                        <input type="text" class="form-control" name="nom" placeholder="Nom">
                                    </div>
                                    <div class="col-6 form-group">
                                        <input type="text" class="form-control" name="lien" placeholder="Lien">
                                    </div>
                                    <div class="col-12 form_gallery form-group">
                                        <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                        <input data-name="#gallery2" id="form_gallery-upload" name="image" class="form_gallery-upload"
                                            type="file" accept=".png, .jpg, .jpeg">
                                    </div>
                                    
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                
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