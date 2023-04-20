<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Episode;
use App\Models\Show;
use Illuminate\Http\Request;
use App\Models\User;

class ShowController extends Controller
{
    private $cat ;
    private $show ;
    private $user ;
    private $episode ;



    public function __construct() {

        $this->cat = new Categorie();
        $this->show = new Show();
        $this->episode = new Episode();
        $this->user = new User();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->cat->all();
        $shows = $this->show->join($this->cat->getTable(), $this->cat->getTable().".id", "=", $this->show->getTable().".cat")
        ->get([
            $this->show->getTable().".*",
            $this->cat->getTable().".id as cid",
            $this->cat->getTable().".nom"
        ]);
        $this->user->all();

// dd($shows);

        return view("dashboard.show.showList", compact("shows"));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cats = $this->cat->all();
        //$users = $this->user->all();
        $users = $this->user->where('user_type', 'producteur')->get();



        return view("dashboard.show.addShow", compact("cats", "users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if ($request) {
            # code...
            $this->show->cat = $request->cat ;
            $this->show->producteur = $request->producer ;
            $this->show->name = $request->title ;
            $this->show->quality = $request->quality ;
            $this->show->description = $request->description ;

            if ($request->img_url) {

                $imgFilename = time().'.'.request()->img_url->getClientOriginalExtension();
                request()->img_url->move(public_path('images'), $imgFilename);
                $this->show->img_url=$imgFilename;

            }
            if ($request->banner_url) {

                $bannerFilename = time().'.'.request()->banner_url->getClientOriginalExtension();
                request()->banner_url->move(public_path('banners'), $bannerFilename);
                $this->show->banner_url=$bannerFilename;
            }

            if ($this->show->save()) {
                # code...
                $message = "OK";
            }else {

                $message = "Error";

            }
            return redirect("dashboards/list-show")->with("message", $message);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $show =  $this->show
        ->join($this->cat->getTable(), $this->cat->getTable().".id", "=", $this->show->getTable().".cat")
        ->join("users", "users.id", "=", $this->show->getTable().".producteur")
        ->findOrFail($id);
        // dd($show);
        return view("dashboard.show.show-details", compact("show"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $show =  $this->show
        ->join($this->cat->getTable(), $this->cat->getTable().".id", "=", $this->show->getTable().".cat")
        ->join("users", "users.id", "=", $this->show->getTable().".producteur")
        ->where($this->show->getTable().".id", "=", $id)->get([
            $this->show->getTable().".*",

            $this->user->getTable().".first_name",
            $this->user->getTable().".last_name",
            $this->user->getTable().".id as uid",


            $this->cat->getTable().".id as cid",
            $this->cat->getTable().".nom"
        ])[0];
        // dd($show);
        $cats = $this->cat->all();
        $users = $this->user->all();
        return view("dashboard.show.edit-show", compact("show", "cats", "users"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $show =  $this->show->findOrFail($id);
        if ($request) {
            # code...
            $show->cat = $request->cat ;
            $show->producteur = $request->producer ;
            $show->name = $request->title ;
            $show->quality = $request->quality ;
            $show->description = $request->description ;

            if ($request->img_url) {

                $imgFilename = time().'.'.request()->img_url->getClientOriginalExtension();
                request()->img_url->move(public_path('images'), $imgFilename);
                $show->img_url=$imgFilename;

            }
            if ($request->banner_url) {

                $bannerFilename = time().'.'.request()->banner_url->getClientOriginalExtension();
                request()->banner_url->move(public_path('banners'), $bannerFilename);
                $show->banner_url=$bannerFilename;
            }

            if ($show->update()) {
                # code...
                $message = "OK";
            }else {

                $message = "Error";

            }
            return redirect("dashboards/list-show")->with("message", $message);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function frontSeries()
    {
        # code...

        $categories = $this->cat->all();
        $shows = $this->show->join($this->cat->getTable(), $this->cat->getTable().".id", "=", $this->show->getTable().".cat")
        ->get([
            $this->show->getTable().".*",
            $this->cat->getTable().".id as cid",
            $this->cat->getTable().".nom"
        ]);
        $this->user->all();

        // dd($categories);

        return view("frontend.show", compact("shows",   "categories"));
    }
    public function showdetails($id)
    {

        $show =  $this->show
        ->join($this->cat->getTable(), $this->cat->getTable().".id", "=", $this->show->getTable().".cat")
        ->join("users", "users.id", "=", $this->show->getTable().".producteur")
        ->findOrFail($id);

        $episodes = $this->episode
        ->join($this->show->getTable(), $this->show->getTable().".id", "=", $this->episode->getTable().".serie")
        ->join($this->cat->getTable(), $this->cat->getTable().".id", "=", $this->show->getTable().".cat")
        ->join("users", "users.id", "=", $this->show->getTable().".producteur")
        ->where($this->episode->getTable().".serie", "=", $id)->get([
            $this->episode->getTable().".*",
            $this->episode->getTable().".id as eid",
            $this->show->getTable().".*",
            $this->cat->getTable().".*",
            "users.*",
            "users.id as uid"
        ]);
        // dd($episodes);
        // return view("dashboard.show.show-details", compact("show"));
        # code...
        return view("frontend.showdetails", compact("show", "episodes"));
    }

    public function watchShow($show, $episode)
    {
        # code...
        // $show =  $this->show
        // ->join($this->cat->getTable(), $this->cat->getTable().".id", "=", $this->show->getTable().".cat")
        // ->join("users", "users.id", "=", $this->show->getTable().".producteur")
        // ->findOrFail($show);
        // dd($episode);
        $episodes = $this->episode
        ->join($this->show->getTable(), $this->show->getTable().".id", "=", $this->episode->getTable().".serie")
        ->join($this->cat->getTable(), $this->cat->getTable().".id", "=", $this->show->getTable().".cat")
        ->join("users", "users.id", "=", $this->show->getTable().".producteur")
        ->where([
                [$this->episode->getTable().".serie", "=", $show],
                [$this->episode->getTable().".id", "=", $episode]
                ])
        ->get();

        // dd($episodes);
        return view("frontend.watchshow", compact("show", "episodes"));
    }
}
