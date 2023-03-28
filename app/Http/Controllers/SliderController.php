<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return response()->json(["data" => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $upload = new Slider();
        $upload->image = $data['image']->store('uploads/images', 'public');
        $upload->title_ru = $data['title_ru'];
        $upload->title_uz = $data['title_uz'];
        $upload->title_en = $data['title_en'];
        $upload->description_ru = $data['description_ru'];
        $upload->description_uz = $data['description_uz'];
        $upload->description_en = $data['description_en'];
        $upload->link = $data['link'];
        $upload->save($data);

        return response()->json([
            "status" => 'success',
            "data" => $upload
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
       return $slider;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $upload = Slider::find($id);
        $upload->image = $data['image']->store('uploads/images', 'public');
        $upload->title_ru = $data['title_ru'];
        $upload->title_uz = $data['title_uz'];
        $upload->title_en = $data['title_en'];
        $upload->description_ru = $data['description_ru'];
        $upload->description_uz = $data['description_uz'];
        $upload->description_en = $data['description_en'];
        $upload->link = $data['link'];
        $upload->save($data);

        return response()->json([
           "status" => 'success',
              "data" => $upload
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return response()->json([
            "status" => 'success',
            "data" => $slider
        ], 200);
    }
}
