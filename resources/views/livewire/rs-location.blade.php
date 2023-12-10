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
                <div class="card-body">
                    <label>Fasilitas Kesehatan yang tersedia:</label>
                    @forEach($datas as $data)
                    <li>{{$data ['title']}}</li>
                    @endforeach
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
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

            mapboxgl.accessToken = 'pk.eyJ1IjoiYzB3c2FyIiwiYSI6ImNsbmJmaXZnMjA0NnoycXRkOGFuMm5teWcifQ.hdWGWLolEvFZNJapdTyTCg';
            var map = new mapboxgl.Map({
            container: 'map',
            center: defaultLocation,
            zoom: 12
            });

            const loadLocations = (geoJsonRs) => {
                geoJsonRs.features.forEach((location) => {
                    const {geometry, properties} = location
                    const {iconSize, locationId, title, image, description, type} = properties

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
                                <a type="button" class="btn btn-primary" href="${type}" text-align="center">Lihat Detail</a>
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

            loadLocations({!!$geoJsonRs!!})

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
