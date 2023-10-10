<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\property;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request){
        $query= Property::query()->orderBy('create_at','desc');
        if($price=$request->validated('price')){
            $query = $query->where('price', '<=', $price);
        }
        if($surface=$request->validated('surface')){
            $query = $query->where('surface', '>=', $surface);
        }
        if($rooms=$request->validated('rooms')){
            $query = $query->where('rooms', '>=', $rooms);
        }
        if($title=$request->validated('title')){
            $query = $query->where('title', 'like', "%{$title}%");
        }
        return view('property.index',[
            'properties'=>$query->paginate(16),
            'input'=> $request->validated()
        ]) ;
    }
    //pour visualiser un seul biens
    public function show(string $slug, Property $property)
{
    // if ($slug === $property->getSlug()) {
    //     return redirect()->route('property.show', ['slug' => $property->getSlug(), 'property' => $property]);
    // }

    return view('property.show', ['property' => $property]);
}
    public function contact(Property $property, PropertyContactRequest $request){
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'votre demande de contact a bien ete envoye');

    }
}
