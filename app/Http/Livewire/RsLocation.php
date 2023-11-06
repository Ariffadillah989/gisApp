<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\rs_location;

class RsLocation extends Component
{
    public $long, $lat;
    public $geoJsonRs;

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
                    'type'=> $location->type,
                    'description'=> $location->description
                ]
            ];
         }

        $geoLocation = [
            'type' => 'FeaturesCollection',
            'features' => $customsLocations
        ];

        $geoJsonRs = collect($geoLocation)->toJson();
        $this->geoJsonRs = $geoJsonRs;
    }

    public function render()
    {
        $this->loadLocations();
        return view('livewire.rs-location');
    }
}
