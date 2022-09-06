<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Slider;
use  App\Models\Backend\Multi;
use Image;
use File;
class SliderController extends Controller
{
    public function add(){
        return view("backend.pages.slider.add");
    }
    public function store(Request $request){
        // dd($request->pic);
        if($request->pic){
            $image = $request->file('pic');
            $customName = rand().".".$image->getClientOriginalExtension();
            $location = public_path('backend/slider/'.$customName);
            Image::make($image)->save($location);
        }
        
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->category = $request->category;
        $slider->description = $request->description;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider->pic = $customName;
        $slider->save();
        return redirect()->route("slider.show");

    }
    public function show(){
        $sliders = Slider::all();

        return view("backend.pages.slider.manage", compact("sliders"));
    }
    public function delete($id){
        $sliders = Slider::find($id);
        if(File::exists('backend/slider/'.$sliders->pic)){
            File::delete('backend/slider/'.$sliders->pic);
        }
        $sliders->delete();
        return redirect()->route("slider.show");
    }

    public function multi(){
        $sliders = Slider::all();
        return view("backend.pages.slider.multi", compact("sliders"));
    }
    public function multistore(Request $request){
        if($request->pics){ 
            
            foreach($request->file('pics') as $image){
                $customName = rand().".".$image->getClientOriginalExtension();
                $location = public_path('backend/slider/images/'.$customName);
                Image::make($image)->save($location);
                $multi = new Multi;
                $multi->s_id = $request->s_id;
                $multi->picture = $customName;
                $multi->save();
            }
        }
        return redirect()->route("slider.show");
    }
    public function view($id){
        $slider = Slider::find($id);
        $multis = Multi::where("s_id",$id)->get();
        return view("backend.pages.slider.view", compact("slider","multis"));
    }
    public function edit($id){
        $slider = Slider::find($id);
        $multis = Multi::where("s_id",$id)->get();
        return view("backend.pages.slider.edit", compact("slider","multis"));
    }
    
    public function deleteimage($id){
        $multi = Multi::find($id);
        if(File::exists('backend/slider/images/'.$multi->picture)){
            File::delete('backend/slider/images/'.$multi->picture);
        }
        $multi->delete();
        return back();
    }
}
