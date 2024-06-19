<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ApotekLocation extends Component
{
    use WithFileUploads;
    
    public $long, $lat, $locationId, $title, $image, $description, $type, $datas, $jenis, $resep;
    public $geoJsonApt;
    public $isEdit = false;
    public $imageUrl;

    public function mount()
    {
        $this->datas = Location::all()->where('jenis', 'apotek');

    }

    private function loadLocations(){
        $locations = Location::orderBy('created_at', 'desc')->get();

        $customsLocations = [];

        foreach($locations as $location){
            if($location->jenis == 'apotek'){
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
                            'resep'=> $location->resep,
                            'description'=> $location->description
                        ]
                    ];
                }
            }

        $geoLocation = [
            'type' => 'FeaturesCollection',
            'features' => $customsLocations
        ];

        $geoJsonApt = collect($geoLocation)->toJson();
        $this->geoJsonApt = $geoJsonApt;
    }

    private function clearForm(){
        $this->long = '';
        $this->lat = '';
        $this->title = '';
        $this->jenis = '';
        $this->description = '';
        $this->image = '';
        $this->type = '';
        $this->resep = '';
    }
    
    public function saveMapLocation(){
        $this->validate([
            'long' => 'required',
            'lat' => 'required',
            'description' => 'required',
            'title' => 'required',
            'jenis' => 'required',
            'resep' => 'required',
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
            'resep' => $this -> resep,
            'image' => $imagename,
        ]);

        session()->flash('info', 'Product Created Successfully');

        $this -> clearForm();
        $this -> loadLocations();
        $this -> dispatchBrowserEvent('locationAdded', $this->geoJsonApt);
    }

    public function findLocationById($id){
        $location = Location::findOrFail($id);

        $this->long = $location->long;
        $this->lat = $location->lat;
        $this->title = $location->title;
        $this->jenis = $location->jenis;
        $this->resep = $location->resep;
        $this->description = $location->description;
        $this->imageUrl = $location->image;
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
            'resep' => 'required'
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
        $this -> dispatchBrowserEvent('locationUpdated', $this->geoJsonApt);

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
        return view('livewire.apotek-location');
    }
}
