<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    @if ($episode)

                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Edit Episode</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form method="POST" action="{{ route('episode.update', ["id"=> $id ]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" placeholder="Title" name="title" value="{{$episode->title}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="number" class="form-control" placeholder="Duration" name="duration" value="{{$episode->duration}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="number" class="form-control" placeholder="Saison" name="season" value="{{$episode->season}}">
                                    </div>
                                    {{-- <div class="col-md-6 form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="producer">
                                        <option selected disabled="">Choose Producer</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ Str::ucfirst($user->first_name ." ". $user->last_name)}}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    {{-- <div class="col-md-6 form-group">
                                        <select class="form-control" id="exampleFormControlSelect2" name="cat">
                                        <option selected disabled="">Choose Category</option>
                                            @foreach ($cats as $cat)
                                                <option value="{{$cat->cid}}">{{$cat->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    {{-- <div class="col-md-6 form-group">
                                        <select class="form-control" id="exampleFormControlSelect3" name="quality">
                                        <option selected disabled="">Choose quality</option>
                                        <option value="Full HD">Full HD</option>
                                        <option value="HD">HD</option>
                                        </select>
                                    </div> --}}

                                    <div class="col-md-6 form_gallery form-group">
                                        <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                        <input data-name="#gallery2" id="form_gallery-upload" name="img_ep" value="{{$episode->img_ep}}"
                                        class="form_gallery-upload" type="file" accept=".png, .jpg, .jpeg">
                                    </div>
                                    <div class="col-md-12 form_gallery form-group">
                                        <label id="gallery2" for="form_gallery-upload">File</label>
                                        <input data-name="#gallery2" id="form_gallery-upload" name="filename" value="{{$episode->filename}}"
                                        class="form_gallery-upload" type="file" accept=".png, .jpg, .jpeg .mp4">
                                    </div>
                                    {{-- <div class="col-md-6 form_gallery form-group">
                                        <label id="gallery3" for="show2">Upload Show Banner</label>
                                        <input data-name="#gallery3" id="show2" name="banner_url" class="form_gallery-upload"
                                        type="file" accept=".png, .jpg, .jpeg">
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea id="text1"  rows="5" class="form-control" name="description"
                                        placeholder="Description"></textarea>
                                    </div> --}}
                                </div>
                                {{-- <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-white mb-3">Add Seasons</h5>
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col-lg-7">
                                        <div class="row">
                                        <div class="col-md-6 form-group">
                                            <select class="form-control" id="exampleFormControlSelect5">
                                                <option disabled="">Select Seasons</option>
                                                <option>Season 1</option>
                                                <option>Season 2</option>
                                                <option>Season 3</option>
                                                <option>Season 4</option>
                                                <option>Season 5</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" placeholder="Episode No.">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" placeholder="Episode Name">
                                        </div>
                                        <div class="col-md-6 form_gallery form-group">
                                            <label id="gallery4" for="show3">Upload Image</label>
                                            <input data-name="#gallery4" id="show3" name="gallery"
                                                class="form_gallery-upload" type="file" accept=".png, .jpg, .jpeg">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" placeholder="Running Time in Minutes">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input class="form-control date-input basicFlatpickr" type="text"
                                                placeholder="Selete Date">
                                        </div>
                                        <div class="col-12 form-group">
                                            <textarea id="text" name="text" rows="5" class="form-control"
                                                placeholder="Description"></textarea>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="d-block position-relative">
                                        <div class="form_video-upload">
                                            <input type="file" accept="video/mp4,video/x-m4v,video/*" multiple>
                                            <p>Upload video</p>
                                        </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            {{-- <div class="col-md-6">
                                <img style="width: 50;height: 50" src="{{asset("images/".$episode->img_ep)}}" alt="">
                                 <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                <input data-name="#gallery2" id="form_gallery-upload" name="img_ep"
                                class="form_gallery-upload" type="file" accept=".png, .jpg, .jpeg">
                            </div> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
