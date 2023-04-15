<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                        <h4 class="card-title">Liste des slides</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('dashboard.addSlide') }}" class="btn btn-primary">Ajouter slide</a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-view">
                            <table class="data-tables table movie_table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Lien</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($slides as $slide)
                                        <tr>
                                            <td>
                                            <div class="media align-items-center">
                                                <div class="iq-movie">
                                                    <a href="javascript:void(0);"><img src="{{ asset('dashboard/images/movie-thumb/06.jpg') }}" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                                </div>
                                                <div class="media-body text-white text-left ml-3">
                                                    <p class="mb-0">{{$slide->nom}}</p>
                                                    <!-- <small>{{$slide->duree}}</small> -->
                                                </div>
                                            </div>
                                            </td>
                                            <td>{{$slide->lien}}</td>
                                            <td>{{$slide->nom_langue}}</td>
                                            </td>
                                            <td>
                                            <div class="flex align-items-center list-user-action">
                                                <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('dashboard.editSlide', ['id' => $slide->id]) }}"><i class="ri-pencil-line"></i></a>
                                                <!-- <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a> -->
                                                <form id="delete-slide-form-{{ $slide->id }}" action="{{ route('dashboard.deleteSlide', $slide->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <a class="iq-bg-primary" href="#" onclick="event.preventDefault(); document.getElementById('delete-slide-form-{{ $slide->id }}').submit();" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="ri-delete-bin-line"></i></a>


                                            </div>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>