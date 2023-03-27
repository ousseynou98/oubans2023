<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Langue;
use App\Models\Movies;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{

    public function index()
    {

        $movies = DB::table("movies")
        ->join('categories', 'movies.id_categorie', '=', 'categories.id')
        ->join('langues', 'movies.id_langue', '=', 'langues.id')
        ->get(
                [ "movies.*",
                "categories.nom as nom_cat",
                "langues.nom as nom_langue"
                ]
            );

        $categories=Categorie::all();
        $langues=Langue::all();
        return view('dashboard.movie.movieList', compact('categories','langues','movies'));
    }

    public function store (Request $request){

        $movie=new Movies;
       $movie->titre=$request->input('titre');
       $movie->producteur=$request->input('producteur');
       $movie->id_categorie=$request->input('categorie');
       $movie->description=$request->input('description');
       $movie->id_langue=$request->input('langue');
       $movie->duree=$request->input('duree');
       $movie->annee=$request->input('annee');

       if (!empty($file = $request->file('video'))) {

           $filename = 'movie-' . time() . '.' . $file->getClientOriginalExtension();
           $fichier=public_path('/assets/films/videos');
           $movie->video=$filename;
           $path = $file->move($fichier, $filename);
           
       }
       //couverture
       if (!empty($file2 = $request->file('image'))) {
           $filename2 = 'image-' . time() . '.' . $file2->getClientOriginalExtension();
       
           $fichier2=public_path('/assets/films/couvertures');
           $movie->image=$filename2;
       
           $path2 = $file2->move($fichier2, $filename2);
       }
       
       $movie->save();

      return redirect('/dashboards/movie-list')->with('success','Votre film a été ajouté avec succès');
    }


    public function addMovie()
    {
        $categories=Categorie::all();
        $langues=Langue::all();
        return view('dashboard.movie.addMovie', compact('categories','langues'));
    }

    public function show($id)
    {

        $movie = DB::table("movies")
        ->join('categories', 'movies.id_categorie', '=', 'categories.id')
        ->join('langues', 'movies.id_langue', '=', 'langues.id')
        ->where('movies.id',$id)
        ->get(
                [ "movies.*",
                "categories.nom as nom_cat",
                "langues.nom as nom_langue"
                ]
            );

        return view('dashboard.movie.movieShow', compact( 'movie'));
    }
}
