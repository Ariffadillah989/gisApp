<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;

class MapLocation extends Component
{
    public $long, $lat;
    public $geoJson;

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

    public function render()
    {
        $this->loadLocations();
        return view('livewire.map-location');
    }
}
