<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index(Request $request) {

        $slides=Slider::all();

        return view('dashboard.slider.sliderList',compact('slides')); 
    }

    public function addSlide()
    {
        
        return view('dashboard.slider.addSlide');
    }

    public function store (Request $request){

        $slide=new Slider;
        $slide->nom=$request->input('nom');
        $slide->lien=$request->input('lien');
        if (!empty($file2 = $request->file('image'))) 
        {
            $filename2 = 'image-' . time() . '.' . $file2->getClientOriginalExtension();
        
            $fichier2=public_path('/assets/slider');
            $slide->image=$filename2;
        
            $path2 = $file2->move($fichier2, $filename2);
        }

       
        $slide->save();

        return redirect('/dashboards/slider')->with('success','Votre slide a été ajouté avec succès');
    }

    public function update($id)
    {

        $slide = Slider::findOrFail($id);
        return view('dashboard.slider.editSlide', compact( 'slide'));
    }

    public function updateSaving(Request $request, $id) {

        // On récupère le slider à mettre à jour
        $slider = Slider::findOrFail($id);
    
        // On met à jour les champs
        $slider->nom = $request->input('nom');
        $slider->lien = $request->input('lien');
    
        // On vérifie si un nouveau fichier image a été envoyé
        if ($request->hasFile('image')) {
            // On supprime l'ancienne image si elle existe
            if ($slider->image && file_exists(public_path('/assets/slider/' . $slider->image))) {
                unlink(public_path('/assets/slider/' . $slider->image));
            }
            // On enregistre la nouvelle image
            $file = $request->file('image');
            $filename = 'image-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/assets/slider'), $filename);
            $slider->image = $filename;
        }
    
        // On enregistre les modifications
        $slider->save();
    
        return redirect('/dashboards/slider')->with('success', 'Le slide a été mis à jour avec succès');
    
    }

    public function deleteSlide($id) {
        $slide = Slider::findOrFail($id);
        if ($slide->image && file_exists(public_path('/assets/slider/' . $slide->image))) {
            unlink(public_path('/assets/slider/' . $slide->image));
        }
        $slide->delete();
        return redirect('/dashboards/slider')->with('success', 'Le slide a été supprimé avec succès');
    }
    
    

}
