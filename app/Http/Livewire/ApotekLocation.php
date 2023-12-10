<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Apotek;

class ApotekLocation extends Component
{
    public $long, $lat;
    public $geoJsonApt;
    public $datas;

    public function mount()
    {
        $this->datas = Apotek::all()->where('jenis', 'apotek');
    }

    private function loadLocations(){
        $locations = Apotek::orderBy('created_at', 'desc')->get();

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
                            'locationId' => $location->Id,
                            'title'=> $location->title,
                            'image'=> $location->image,
                            'type'=> $location->type,
                            'Resep'=> $location->Resep,
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

    public function render()
    {
        $this->loadLocations();
        return view('livewire.apotek-location');
    }
}
