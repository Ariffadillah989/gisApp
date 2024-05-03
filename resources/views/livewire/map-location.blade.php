<div class="container-fluid">
{{-- tes navigasi --}}
    
{{--  --}}
        <div id="kotak1" class="col-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white">
                Navigasi
                </div>
                    <div class="w3-bar-block" style="width: 120%; left: 30px;" >
                      <a href="/" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
                      <a href="/rs-location" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Rumah Sakit</a> 
                      <a href="/puskesmas" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Puskesmas</a> 
                      <a href="/apotek" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Apotek</a> 
                    </div>
            </div>
        </div> 
        <div id="kotak2" class="col-md-6"  >
            <div class="card">
                <div class="card-header bg-dark text-white">
                 Home
                </div>
                <div class="card-body">
                    <div wire:ignore id='map' style="width: 100%; height: 70vh;" position="fixed"></div>
                </div>
            </div>
        </div>    

        <div id="kotak3" class="col-md-3"> 
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Form
                </div>
                <div class="card-body">
                    <form
                        @if($isEdit)
                        wire:submit.prevent="updateLocation"
                        @else
                        wire:submit.prevent="saveMapLocation"
                        @endif
                        >
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input wire:model="long" type="text" class="form-control">
                                    @error('long') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input wire:model="lat" type="text" class="form-control">
                                    @error('lat') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                        </div> 
                        @if(!Auth::guest())
                        <div class="form-group">
                            <label>Title</label>
                            <input wire:model="title" type="text" class="form-control">
                            @error('title') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea wire:model="description" class="form-control"></textarea>
                            @error('description') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <textarea wire:model="type" class="form-control"></textarea>
                            @error('type') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <textarea wire:model="jenis" class="form-control"></textarea>
                            @error('jenis') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label>Picture</label>
                            <div class="custom-file">
                                <input wire:model="image"  type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('image') <small class="text-danger">{{$message}}</small> @enderror
                            @if($image)
                                <img src="{{$image->temporaryUrl()}}" class="img-fluid">
                            @endif

                            @if($imageUrl && !$image)
                                <img src="{{asset('/storage/images/'.$imageUrl)}}" class="img-fluid">
                            @endif

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark text-white btn-block"> Submit Lokasi Baru</button>
                        </div>
                        @endif
                    </form>
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

<style>
#kotak1{
    position: fixed;
    top: 70px;
}
#kotak2{
    position: fixed;
    top: 70px;
    left:25%;
}
#kotak3{
    position: relative;
    top: 60%;
    left:75%;

}

</style>    
@push('scripts')
    <script>
        document.addEventListener('livewire:load', () => {
            const defaultLocation = [95.95766809519847, 5.3817439090802]

            mapboxgl.accessToken = 'pk.eyJ1IjoiYzB3c2FyIiwiYSI6ImNsbmJmaXZnMjA0NnoycXRkOGFuMm5teWcifQ.hdWGWLolEvFZNJapdTyTCg';
            let map = new mapboxgl.Map({
            container: 'map',
            center: defaultLocation,
            zoom: 12
            });



            const loadLocations = (geoJson) => {

                geoJson.features.forEach((location) => {
                    const {geometry, properties} = location
                    const {iconSize, locationId, title, image, description, type, jenis} = properties

                    let markerElement = document.createElement('div');
                    markerElement.className = 'marker' + locationId;
                    markerElement.id = locationId;

                    if (jenis == 'rumahsakit') {
                        markerElement.style.backgroundImage = 'url(https://cdn-icons-png.flaticon.com/256/3448/3448546.png)'
                    } else if (jenis == 'puskesmas') {
                        markerElement.style.backgroundImage = 'url(https://cdn-icons-png.flaticon.com/512/3304/3304549.png)'
                    } else {
                        markerElement.style.backgroundImage = 'url(https://cdn-icons-png.flaticon.com/512/6395/6395633.png)'
                    };
    
                    markerElement.style.backgroundSize = 'cover';
                    markerElement.style.width = '50px';
                    markerElement.style.height = '50px';


                    const imageStorage = '{{asset("/storage/images")}}'+'/'+image

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
                                            <td><img src="${imageStorage}" loading="lazy" class="img-fluid"></td>              
                                        </tr>
                                        <tr>
                                            <td>Description</td> 
                                            <td>${description}</td>              
                                        </tr>
                                    </tbody>
                                </table>
                                <a type="button" class="btn btn-primary" href="${type}" text-align="center">Lihat Detail</a>
                            </div>`

                    markerElement.addEventListener('click', (e) => {  
                        const locationId = e.toElement.id
                        @this.findLocationById(locationId)
                        }
                    )

                    const popUp = new mapboxgl.Popup({
                        offset:25
                    }).setHTML(content).setMaxWidth("250px")

                    
                    new mapboxgl.Marker(markerElement)
                    .setLngLat(geometry.coordinates)
                    .setPopup(popUp) 
                    .addTo(map)
                });
            }

            loadLocations({!! $geoJson !!})

            window.addEventListener('locationAdded', (e) =>{
                loadLocations(JSON.parse(e.detail))
            })

            window.addEventListener('updateLocation', (e) =>{
                loadLocations(JSON.parse(e.detail))
                $('.mapboxgl-popup').remove()
            })

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

            @this.image = image
        });
        
    </script>

@endpush
