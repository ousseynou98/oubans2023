<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                        <h4 class="card-title">Movie Lists</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('dashboard.addMovie') }}" class="btn btn-primary">Add movie</a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-view">
                            <table class="data-tables table movie_table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Catégorie</th>
                                        <th>Année</th>
                                        <th>Language</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($movies as $movie)
                                        <tr>
                                            <td>
                                            <div class="media align-items-center">
                                                <div class="iq-movie">
                                                <?php
                                                    $couverture = explode(',', $movie->image)[0];
                                                ?>
                                                    <a href="javascript:void(0);"><img src="{{ asset('assets/films/couvertures/'.$couverture) }}" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                                </div>
                                                <div class="media-body text-white text-left ml-3">
                                                    <p class="mb-0">{{$movie->titre}}</p>
                                                    <small>{{$movie->duree}}</small>
                                                </div>
                                            </div>
                                            </td>
                                            <td>{{$movie->nom_cat}}</td>
                                            <td>{{$movie->annee}}</td>
                                            <td>{{$movie->nom_langue}}</td>
                                            </td>
                                            <td>
                                            <div class="flex align-items-center list-user-action">
                                                <a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="{{ route('dashboard.showMovie', ['id' => $movie->id]) }}"><i class="lar la-eye"></i></a>
                                                <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('dashboard.editMovie', ['id' => $movie->id]) }}"><i class="ri-pencil-line"></i></a>
                                                <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
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