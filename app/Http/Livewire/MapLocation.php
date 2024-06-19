<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Location;
use Illuminate\Support\Facades\Storage;

class MapLocation extends Component
{
    use WithFileUploads;

    public $locationId, $long, $lat, $title, $image, $description, $type, $datas, $jenis;
    public $geoJson;
    public $imageUrl;
    public $isEdit = false;
    

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
                    'locationId' => $location->id,
                    'title'=> $location->title,
                    'image'=> $location->image,
                    'type'=> $location->type,
                    'jenis'=> $location->jenis,
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
        $this->jenis = '';
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
            'jenis' => 'required',
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
            'jenis' => $this -> jenis,
            'type' => $this -> type,
            'image' => $imagename,
        ]);

        session()->flash('info', 'Product Created Successfully');

        $this -> clearForm();
        $this -> loadLocations();
        $this -> dispatchBrowserEvent('locationAdded', $this->geoJson);
    }

    public function findLocationById($id){
        $location = Location::findOrFail($id);

        $this->long = $location->long;
        $this->lat = $location->lat;
        $this->title = $location->title;
        $this->jenis = $location->jenis;
        $this->description = $location->description;
        $this->imageUrl = $location->image;
        $this->type = $location->type;
        $this->locationId = $id;
        $this->isEdit = true;
    }

    public function updateLocation(){
        $this->validate([
            'long' => 'required',
            'lat' => 'required',
            'description' => 'required',
            'title' => 'required',
            'jenis' => 'required',
            'type' => 'required',
        ]);

        $location = Location::findOrFail($this->locationId);

        if($this->image){
            $imagename = md5($this->image.microtime()).'.'.$this->image->extension();
            Storage::putFileAs(
                'public/images',
                $this->image,
                $imagename
            );
            
            $updateData = [
                'title' => $this->title,
                'description' => $this->description,
                'image' => $imagename,
            ];
        }else{
            $updateData = [
                'title' => $this->title,
                'description' => $this->description,
            ];
        }
        $location->update($updateData);
        session()->flash('info', 'Product Updated Successfully');
        $this->imageUrl = "";
        $this->clearForm();
        $this->loadLocations();
        $this -> dispatchBrowserEvent('locationUpdated', $this->geoJson);


    }

    public function deleteLocation(){
        $location = Location::findOrFail($this->locationId);
        $location->delete();

        $this->imageUrl = "";
        $this->clearForm();
        $this->dispatchBrowserEvent('deleteLocation', $location->id);
    }

    public function render()
    {
        $this->loadLocations();
        return view('livewire.map-location');
    }
}
