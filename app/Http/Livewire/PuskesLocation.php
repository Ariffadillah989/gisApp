<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Puskesmas;

class PuskesLocation extends Component
{
    public $long, $lat;
    public $geoJsonPus;

    private function loadLocations(){
        $locations = Puskesmas::orderBy('created_at', 'desc')->get();

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

        $geoJsonPus = collect($geoLocation)->toJson();
        $this->geoJsonPus = $geoJsonPus;
    }

    public function render()
    {
        $this->loadLocations();
        return view('livewire.puskesmas-location');
    }
}
