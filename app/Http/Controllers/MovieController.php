<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Langue;
use App\Models\Movies;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use App\Models\User;


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
        $users = User::where('user_type', 'producteur')->get();
        return view('dashboard.movie.movieList', compact('categories','langues','movies','users'));
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
            $extension = $file2->getClientOriginalExtension();
            $filename = 'image_' . uniqid() . '_'.$movie->id;
            $fichier2 = public_path('/assets/films/couvertures');
            $image = (new ImageManager)->make($file2);
            $image_small = $image->resize(320, 180);
            $image_small_filename = $filename . '_small';
            $image_small->save($fichier2 . '/' . $image_small_filename.'_'. $image_small->getWidth() .'x'. $image_small->getHeight().'.'.$extension);
            $image_sizes = $image_small_filename .'_'. $image_small->getWidth() .'x'. $image_small->getHeight().'.'.$extension;
            $image_large = $image->resize(1280, 720);
            $image_large_filename = $filename . '_large';
            $image_large->save($fichier2 . '/' . $image_large_filename.'_'. $image_small->getWidth() .'x'. $image_small->getHeight().'.'.$extension);
            $image_sizes .= ',' . $image_large_filename .'_'. $image_large->getWidth() .'x'. $image_large->getHeight().'.'.$extension;
            $movie->image = $image_sizes;
        }

       
       $movie->save();

      return redirect('/dashboards/movie-list')->with('success','Votre film a été ajouté avec succès');
    }

    // public function updateSaving(Request $request ,$id){
   
    //     $movie= Movies::find($id);
    //     $movie->titre=$request->input('titre');
    //    $movie->producteur=$request->input('producteur');
    //    $movie->id_categorie=$request->input('categorie');
    //    $movie->description=$request->input('description');
    //    $movie->id_langue=$request->input('langue');
    //    $movie->duree=$request->input('duree');
    //    $movie->annee=$request->input('annee');

    //    if (!empty($file = $request->file('video'))) {

    //        $filename = 'movie-' . time() . '.' . $file->getClientOriginalExtension();
    //        $fichier=public_path('/assets/films/videos');
    //        $movie->video=$filename;
    //        $path = $file->move($fichier, $filename);
           
    //    }
    //    //couverture
    //    if (!empty($file2 = $request->file('image'))) {
    //         $extension = $file2->getClientOriginalExtension();
    //         $filename = 'image_' . uniqid() . '_'.$movie->id;
    //         $fichier2 = public_path('/assets/films/couvertures');
    //         $image = (new ImageManager)->make($file2);
    //         $image_small = $image->resize(320, 180);
    //         $image_small_filename = $filename . '_small';
    //         $image_small->save($fichier2 . '/' . $image_small_filename.'_'. $image_small->getWidth() .'x'. $image_small->getHeight().'.'.$extension);
    //         $image_sizes = $image_small_filename .'_'. $image_small->getWidth() .'x'. $image_small->getHeight().'.'.$extension;
    //         $image_large = $image->resize(1280, 720);
    //         $image_large_filename = $filename . '_large';
    //         $image_large->save($fichier2 . '/' . $image_large_filename.'_'. $image_small->getWidth() .'x'. $image_small->getHeight().'.'.$extension);
    //         $image_sizes .= ',' . $image_large_filename .'_'. $image_large->getWidth() .'x'. $image_large->getHeight().'.'.$extension;
    //         $movie->image = $image_sizes;
    //     }
       
    //    $movie->update();

    //    return redirect('/dashboards/movie-list')->with('success','Votre film a été modifié avec succès');
        
    // }

    public function updateSaving(Request $request, $id){
        $movie= Movies::find($id);
        $movie->titre=$request->input('titre');
        $movie->producteur=$request->input('producteur');
        $movie->id_categorie=$request->input('categorie');
        $movie->description=$request->input('description');
        $movie->id_langue=$request->input('langue');
        $movie->duree=$request->input('duree');
        $movie->annee=$request->input('annee');
    
        // Update video file
        if (!empty($file = $request->file('video'))) {
            $filename = 'movie-' . time() . '.' . $file->getClientOriginalExtension();
            $fichier=public_path('/assets/films/videos');
            $movie->video=$filename;
            $path = $file->move($fichier, $filename);
            // Delete old video file if checkbox is checked
            if ($request->has('delete_video') && $request->input('delete_video')) {
                $old_file = public_path('/assets/films/videos/') . $movie->video;
                if (file_exists($old_file)) {
                    unlink($old_file);
                }
                $movie->video = null;
            }
        }
    
        // Update image files
        if (!empty($file2 = $request->file('image'))) {
            $extension = $file2->getClientOriginalExtension();
            $filename = 'image_' . uniqid() . '_'.$movie->id;
            $fichier2 = public_path('/assets/films/couvertures');
            $image = (new ImageManager)->make($file2);
            $image_small = $image->resize(320, 180);
            $image_small_filename = $filename . '_small';
            $image_small->save($fichier2 . '/' . $image_small_filename.'_'. $image_small->getWidth() .'x'. $image_small->getHeight().'.'.$extension);
            $image_sizes = $image_small_filename .'_'. $image_small->getWidth() .'x'. $image_small->getHeight().'.'.$extension;
            $image_large = $image->resize(1280, 720);
            $image_large_filename = $filename . '_large';
            $image_large->save($fichier2 . '/' . $image_large_filename.'_'. $image_small->getWidth() .'x'. $image_small->getHeight().'.'.$extension);
            $image_sizes .= ',' . $image_large_filename .'_'. $image_large->getWidth() .'x'. $image_large->getHeight().'.'.$extension;
            $movie->image = $image_sizes;
            // Delete old image files if checkbox is checked
            if ($request->has('delete_image') && $request->input('delete_image')) {
                $old_files = explode(',', $movie->image);
                foreach ($old_files as $old_file) {
                    $old_file = public_path('/assets/films/couvertures/') . $old_file;
                    if (file_exists($old_file)) {
                        unlink($old_file);
                    }
                }
                $movie->image = null;
            }
        }
    
        $movie->update();
    
        return redirect('/dashboards/movie-list')->with('success','Votre film a été modifié avec succès');
    }
    


    public function addMovie()
    {
        $categories=Categorie::all();
        $langues=Langue::all();
        $users = User::where('user_type', 'producteur')->get();
        return view('dashboard.movie.addMovie', compact('categories','langues','users'));
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

    public function update($id)
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
        $categories=Categorie::all();
        $langues=Langue::all();
        $users = User::where('user_type', 'producteur')->get();
        return view('dashboard.movie.editMovie', compact( 'movie','categories','langues','users'));
    }

    public function indexFront()
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
        return view('frontend.movie', compact('categories','langues','movies'));
    }

    public function showdetails($id)
    {

        $movie = DB::table("movies")
        ->join('categories', 'movies.id_categorie', '=', 'categories.id')
        ->join('langues', 'movies.id_langue', '=', 'langues.id')
        ->where('movies.id', $id)
        ->select("movies.*", "categories.nom as nom_cat", "langues.nom as nom_langue")
        ->first();

        $categories=Categorie::all();
        $langues=Langue::all();

        return view('frontend.showdetails', compact('categories','langues','movie'));
    }
}
