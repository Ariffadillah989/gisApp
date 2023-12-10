<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;

class PuskesLocation extends Component
{
    public $long, $lat, $datas;
    public $geoJsonPus;

    public function mount()
    {
        $this->datas = Location::all()->where('jenis', 'puskesmas');

    }

    private function loadLocations(){
        $locations = Location::orderBy('created_at', 'desc')->get();

        $customsLocations = [];

        foreach($locations as $location){
            if($location->jenis == 'puskesmas'){
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
            }

        $geoLocation = [
            'type' => 'FeaturesCollection',
            'features' => $customsLocations
        ];

        $geoJsonPus = collect($geoLocation)->toJson();
        $this->geoJsonPus = $geoJsonPus;
    }

    public function render()
    {
        $this->loadLocations();
        return view('livewire.puskesmas-location');
    }
}
