<x-layouts.dashboard>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Modifier slide</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="{{ route('dashboard.updateSavingSlide', ['id' => $slide->id]) }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <input type="text" class="form-control" name="nom" placeholder="Nom" value="{{$slide->nom}}">
                                        </div>
                                        
                                        <div class="col-6 form-group">
                                            <input type="text" class="form-control" name="lien" placeholder="Lien" value="{{$slide->lien}}">
                                        </div>
                                        <div class="col-2 form_gallery form-group">
                                        <!-- <label id="gallery2" for="form_gallery-upload">Image actuel</label> -->
                                        <img src="{{ asset('assets/slider/'.$slide->image) }}" alt="{{ $slide->image }}" class="img-fluid mb-3"  onclick="showModal(this)">
                                        </div>
                                        <div class="col-10 form_gallery form-group">
                                            <label id="gallery2" for="form_gallery-upload">Image</label>
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