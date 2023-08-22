<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\rs_location;

class RsLocation extends Component
{
    public $long, $lat;
    public $geoJson;

    private function loadLocations(){
        $locations = rs_location::orderBy('created_at', 'desc')->get();

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
