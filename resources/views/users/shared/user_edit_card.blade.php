<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                        alt="{{ $user->name }}">
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center flex-column">
                    <input name="user" value="{{ $user->name }}" type="text" class="form-control">
                    @error('name')
                        <span class="text-danger fs-6">{{ $message }}</span>
                    @enderror
                </div>
                @auth
                    @if (Auth::id() === $user->id)
                        <div>
                            <button type="button" class="btn btn-info"><a
                                    href="{{ route('users.show', $user->id) }}">Annulla
                                    modifica</a></button>
                        </div>
                    @endif
                @endauth
            </div>
            <div class="mt-2">
                <label for="">Foto del profilo:</label>
                <input class="form-control" name="image" type="file">
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5">Biografia: </h5>
                <div class="mb-3">
                    <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user->bio }}</textarea>
                    {{-- per le validazioni di array json ip address etc --}}
                    {{-- https://laravel.com/docs/11.x/validation#available-validation-rules --}}
                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-dark btn-sm mb-3">Salva</button>
                @include('users.shared.user_stats')

            </div>
        </form>
    </div>
</div>
<hr>
