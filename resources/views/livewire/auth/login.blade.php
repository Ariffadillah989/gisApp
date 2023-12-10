<div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Login</div>
                    <div class="card-body">
                        <form wire:submit.prevent="loginUser">
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                id="exampleFormControlInput1" placeholder="name@example.com" wire:model.defer="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                 id="exampleFormControlInput1" placeholder="**********" wire:model.defer="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" wire:model.defer="remember">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Ingat saya
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Masuk</button>
                            </div>
                            <a href="/register" class="text-primary">Belum punya akun?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>