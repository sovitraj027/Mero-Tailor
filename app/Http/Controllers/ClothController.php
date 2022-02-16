<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClothRequest;
use App\Models\Category;
use App\Models\Cloth;
use App\Models\Color;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class ClothController extends Controller
{
    use FileUploadTrait;
   
    public function index()
    {
        return view('cloth.index',[
            'clothes'=>Cloth::latest()->get()

        ]);
    }

 
    public function create()
    {
        return view('cloth.create',[
            'categories'=>Category::latest()->get(),
            'colors' => Color::latest()->get()
        ]);
    }

    public function store(ClothRequest $request)
    {

        $cloth =Cloth::create($request->except('image','_token'));

        if ($request->hasFile('image')) {
            $this->fileUpload($cloth, 'image', 'cloth-image', false);
        }

        foreach($request->category_id as $category){

            $cloth->categories()->attach($category);

        } 
        foreach($request->color_id as $color){

            $cloth->colors()->attach($color);

        }

        return redirect()->route('clothes.index')->with('success', 'Cloth Added Successfully!');
    
    }


    public function show($id)
    {
      
        return view('cloth.show',[
            'cloth'=>Cloth::where('id',$id)->first()
        ]);
    }

 
    public function edit($id)
    {

        $clothes=Cloth::where('id',$id)->first();
        $selected_category = array();
        foreach ($clothes->categories as $cloth) {
             array_push($selected_category, $cloth->id);
        }
   
        return view('cloth.edit',[
            'cloth'=>Cloth::where('id',$id)->first(),
            'categories'=>Category::latest()->get(),
            'colors' => Color::latest()->get(),
            'selected_category'=>$selected_category
        ]);
    }


    public function update(ClothRequest $request, $id)
    {
        $cloth=cloth::where('id',$id)->first();
        
      Cloth::where('id',$id)->update($request->except('image','_token','_method','category_id','color_id'));
  
        if ($request->hasFile('image')) {
            $this->fileUpload($cloth, 'image', 'cloth-image', false);
        }
        foreach($request->category_id as $category){

            $cloth->categories()->sync($category);

        } 
        foreach($request->color_id as $color){

            $cloth->colors()->sync($color);

        }

        return redirect()->route('clothes.index')->with('success', 'Cloth Updated Successfully!');
    }


    public function destroy($id)
    {
    
        $cloth=Cloth::where('id',$id)->first();
        $cloth->delete();
        return redirect()->route('clothes.index')->with('error', 'Cloth Delete Successfully!');

    }

  
}
