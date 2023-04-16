<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                        <h4 class="card-title">Episode Lists</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('episode.create', ["id" => $serie]) }}" class="btn btn-primary">Add Episode</a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-view">
                            {{-- {{dd($shows)}} --}}
                            <table class="data-tables table movie_table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Episodes</th>
                                        <th>Duration</th>
                                        <th>Seasons</th>
                                        {{-- <th>Language</th>
                                        <th style="width:20%">Description</th>--}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($episodes as $episode)


                                    <tr>
                                        <td>
                                            <a href="#" target="_blank" rel="noopener noreferrer"></a>
                                            <div class="media align-items-center">
                                                <div class="iq-movie">
                                                    <a href="javascript:void(0);"><img src="{{ asset('images/'.$episode->img_ep) }}"
                                                        class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                                </div>
                                                <div class="media-body text-white text-left ml-3">
                                                    <p class="mb-0">{{ $episode->title }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$episode->duration}}</td>
                                        <td>{{$episode->season}}</td>

                                        {{-- <td>{{ date("d-m-Y H:m",strtotime($episode->created_at)) }}</td> --}}
                                        {{-- <td>3 Seasons</td>
                                        <td>English</td>
                                        <td>
                                            <p>{{$show->description}}</p>
                                        </td>>--}}

                                        <td>

                                        <div class="flex align-items-center list-user-action">
                                            <a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="View" href="{{route("episode.show",["id" => $episode->id ])}}"><i class="lar la-eye"></i></a>
                                            <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Edit" href="{{route("episode.edit",["id" => $episode->id ])}}"><i class="ri-pencil-line"></i></a>
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Delete" href="{{ route("episode.delete",["id"=>$episode->id])}}"><i
                                                    class="ri-delete-bin-line"></i></a>
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
