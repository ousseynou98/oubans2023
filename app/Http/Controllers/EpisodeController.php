<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EpisodeController extends Controller
{
    protected $episode;

    public function __construct() {
        $this->episode = new Episode();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $serie = $id;
        $episodes = $this->episode->where($this->episode->getTable().".serie", "=", $id)->get();
        // dd($episodes);
        return view("dashboard.episodes.episode-list", compact("serie","episodes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //


        return view("dashboard.episodes.add-episode", compact("id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        if ($request) {
            # code...
            $this->episode->serie = $id ;
            $this->episode->title = $request->title ;
            $this->episode->duration = $request->duration ;
            $this->episode->season = $request->season ;
            $this->episode->filename = $request->filename ;
            $this->episode->img_ep = $request->img_ep ;
            // $this->show->quality = $request->quality ;
            // $this->show->description = $request->description ;

            if ($request->img_ep) {

                $imgFilename = time().'.'.request()->img_ep->getClientOriginalExtension();
                request()->img_ep->move(public_path('images'), $imgFilename);
                $this->episode->img_ep=$imgFilename;

            }
            if ($request->filename) {

                $vidFilename = time().'.'.request()->filename->getClientOriginalExtension();
                request()->filename->move(public_path('episodes'), $vidFilename);
                $this->episode->filename=$vidFilename;

            }


            if ($this->episode->save()) {
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
        $episode = $this->episode->findorFail($id);
        return view("dashboard.episodes.show-episode", compact("id", "episode"));

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
        $episode = $this->episode->findorFail($id);
        return view("dashboard.episodes.edit-episode", compact("id", "episode"));

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
        $episode = $this->episode->findorFail($id);

        if ($request) {
            # code...
            $episode->serie = $id ;
            $episode->title = $request->title ;
            $episode->duration = $request->duration ;
            $episode->season = $request->season ;
            $episode->filename = $request->filename ;
            $episode->img_ep = $request->img_ep ;
            // $this->show->quality = $request->quality ;
            // $this->show->description = $request->description ;

            if ($request->img_ep) {

                $imgFilename = time().'.'.request()->img_ep->getClientOriginalExtension();
                request()->img_ep->move(public_path('images'), $imgFilename);
                $episode->img_ep=$imgFilename;

            }
            if ($request->filename) {

                $imgFilename = time().'.'.request()->filename->getClientOriginalExtension();
                request()->filename->move(public_path('episodes'), $imgFilename);
                $this->episode->filename=$imgFilename;

            }

            if ($episode->update()) {
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

        $episode = $this->episode->findorFail($id);

        if ($episode->delete()) {
            # code...
            $message = "OK";
        }else {

            $message = "Error";

        }
        return redirect("dashboards/list-show")->with("message", $message);
    }
}
