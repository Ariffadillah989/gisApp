<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Location;
use Illuminate\Support\Facades\Storage;

class MapLocation extends Component
{
    use WithFileUploads;

    public $long, $lat, $title, $image, $description, $type, $datas;
    public $geoJson;

    public function mount()
    {
        $this->datas = Location::all();

    }

    private function loadLocations(){
        $locations = Location::orderBy('created_at', 'desc')->get();

        $customsLocations = [];

        foreach($locations as $location){
            $customsLocations[] = [
                'type' => 'Features',
                'geometry' => [
                    'coordinates' => [$location->long, $location->lat],
                    'type' => 'Point'
                ],
                'properties'=> [
                    'locationId' => $location->Id,
                    'title'=> $location->title,
                    'image'=> $location->image,
                    'type'=> $location->type,
                    'description'=> $location->description
                ]
            ];
        }

        $geoLocation = [
            'type' => 'FeaturesCollection',
            'features' => $customsLocations
        ];

        $geoJson = collect($geoLocation)->toJson();
        $this->geoJson = $geoJson;
    }

    
    private function clearForm(){
        $this->long = '';
        $this->lat = '';
        $this->title = '';
        $this->description = '';
        $this->image = '';
        $this->type = '';
    }


    public function saveMapLocation(){
        $this->validate([
            'long' => 'required',
            'lat' => 'required',
            'description' => 'required',
            'title' => 'required',
            'type' => 'required',
            'image' => 'image|max:2048|required',
        ]);

        $imagename = md5($this->image.microtime()).'.'.$this->image->extension();

        Storage::putFileAs(
            'public/images',
            $this->image,
            $imagename
        );

        Location::create([
            'long' => $this -> long,
            'lat' => $this -> lat,
            'description' => $this -> description,
            'title' => $this -> title,
            'type' => $this -> type,
            'image' => $imagename,
        ]);

        $this -> clearForm();
        $this -> loadLocations();
        $this -> dispatchBrowserEvent('locationAdded', $this->geoJson);
    }

    public function render()
    {
        $this->loadLocations();
        return view('livewire.map-location');
    }
}
