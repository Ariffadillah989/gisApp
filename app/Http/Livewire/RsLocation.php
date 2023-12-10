<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;

class RsLocation extends Component
{
    public $long, $lat, $datas;
    public $geoJsonRs;

    public function mount()
    {
        $this->datas = Location::all()->where('jenis', 'rumahsakit');
    }

    private function loadLocations(){
        $locations = Location::orderBy('created_at', 'desc')->get();

        $customsLocations = [];
            foreach($locations as $location){
                if($location->jenis == 'rumahsakit'){
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

        $geoJsonRs = collect($geoLocation)->toJson();
        $this->geoJsonRs = $geoJsonRs;
    }

    public function render()
    {
        $this->loadLocations();
        return view('livewire.rs-location');
    }
}
