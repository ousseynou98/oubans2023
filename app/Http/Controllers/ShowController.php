<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Show;
use Illuminate\Http\Request;
use App\Models\User;

class ShowController extends Controller
{
    private $cat ;
    private $show ;
    private $user ;


    public function __construct() {

        $this->cat = new Categorie();
        $this->show = new Show();
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
        $users = $this->user->all();


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
}
