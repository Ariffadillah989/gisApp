<div class="container-fluid">
    @include('layouts/sideBar')
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Rumah Sakit
                </div>
                <div class="card-body">
                    <div wire:ignore id='map' style="width: 100%; height: 70vh;" position="fixed"></div>
                </div>
            </div>
        </div>    
        <div class="col-md-3"> 
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Form
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Longitude</label>
                                <input wire:model="long" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Latitude</label>
                                <input wire:model="lat" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

    
@push('scripts')
    <script>
        document.addEventListener('livewire:load', () => {
            const defaultLocation = [95.95766809519847, 5.3817439090802]

            mapboxgl.accessToken = '{{env('MAPBOX_KEY')}}';
            var map = new mapboxgl.Map({
            container: 'map',
            center: defaultLocation,
            zoom: 12
            });

            const geoJSon = {
            "type": "FeatureCollection",
            "features": [
                {
                "type": "Feature",
                "geometry": {
                    "coordinates": [
                    "95.958415",
                    "5.379468"
                    ],
                    "type": "Point"
                },
                "properties": {
                    "message": "Rumah Sakit",
                    "iconSize": [
                    50,
                    50
                    ],
                    "locationId": 30,
                    "title": "Rumah Sakit Umum Sigli",
                    "image": "https://images.unsplash.com/photo-1533042789716-e9a9c97cf4ee?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mjl8fGhvc3BpdGFsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60",
                    "description": "Rumah Sakit"
                }
                },
                {
                "type": "Feature",
                "geometry": {
                    "coordinates": [
                    "95.961821",
                    "5.379162"
                    ],
                    "type": "Point"
                },
                "properties": {
                    "message": "oke mantap Edit",
                    "iconSize": [
                    50,
                    50
                    ],
                    "locationId": 29,
                    "title": "Puskesmas",
                    "image": "https://images.unsplash.com/photo-1583953458882-302655b5c376?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OTV8fGhvc3BpdGFsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60 ",
                    "description": "Puskesmas Sigli"
                }
                }
            ]
            }

            const loadLocations = () => {
                geoJSon.features.forEach((location) => {
                    const {geometry, properties} = location
                    const {iconSize, locationId, title, image, description} = properties

                    let markerElement = document.createElement('div')
                    markerElement.className = 'marker' + locationId
                    markerElement.id = locationId
                    markerElement.style.backgroundImage = 'url(https://cdn-icons-png.flaticon.com/512/3448/3448513.png)'
                    markerElement.style.backgroundSize = 'cover'
                    markerElement.style.width = '50px'
                    markerElement.style.height = '50px'

                    const content = `
                            <div style="overflow-y, auto;max-height:250px,width:100%">
                                <table class="table table-sm mt-2">
                                    <tbody>
                                        <tr>
                                            <td>Title</td> 
                                            <td>${title}</td>              
                                        </tr>
                                        <tr>
                                            <td>Picture</td> 
                                            <td><img src="${image}" loading="lazy" class="img-fluid"></td>              
                                        </tr>
                                        <tr>
                                            <td>Description</td> 
                                            <td>${description}</td>              
                                        </tr>
                                    </tbody>
                                </table>
                                <a type="button" class="btn btn-primary" href="/RumahSakit" text-align="center">Lihat Detail</a>
                            </div>`

                    const popUp = new mapboxgl.Popup({
                        offset:25
                    }).setHTML(content).setMaxWidth("250px")

                    new mapboxgl.Marker(markerElement)
                    .setLngLat(geometry.coordinates)
                    .setPopup(popUp) 
                    .addTo(map)
                })
            }

            loadLocations()

            const style = "satellite-v9"
            // light-v10, outdoor-v11, dark-v10, street-v11 
            map.setStyle(`mapbox://styles/mapbox/${style}`)

            map.addControl(new mapboxgl.NavigationControl())

            map.on('click', (e) =>{
                const longitude = e.lngLat.lng
                const lattidude = e.lngLat.lat

                @this.long = longitude
                @this.lat = lattidude
            })
        });
        
    </script>

@endpush
