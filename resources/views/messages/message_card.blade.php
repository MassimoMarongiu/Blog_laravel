<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $message->user->getImageURL() }}"
                    alt="{{ $message->user->name }}">
                {{-- {{$message->$user->getImageURL()}} --}}
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $message->user_id) }}">
                            {{ $message->user->name }}
                        </a></h5>
                </div>
            </div>
            {{-- <div class="ms-3 col"> --}}
            <div class="ms-3 col">
                <button class="btn btn-success btn-sm mb-1 ms-1 float-end">
                    <a href="{{ route('messages.show', $message->id) }}">@lang('message.view')</a>
                </button>
                @auth
                    {{-- @can('message.edit', $message) --}}
                    @can('update', $message)
                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm float-end ms-1"> @lang('message.delete') </button>
                            <button class="btn btn-info btn-sm mb-1 ms-1 float-end">
                                <a href="{{ route('messages.edit', $message->id) }}">@lang('message.modify')</a>
                            </button>
                        </form>
                    @endcan
                @endauth
            </div>
        </div>
    </div>
    {{-- modifica messaggio --}}
    <div class="card-body">
        @if ($editing1 ?? false)
            <form action="{{ route('messages.update', $message->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-control" id="content" name="content" rows="3">{{ $message->content }}</textarea>
                    {{-- per le validazioni di array json ip address etc --}}
                    {{-- https://laravel.com/docs/11.x/validation#available-validation-rules --}}
                    @error('content')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark mb-2"> @lang('message.update_btn') </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $message->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('messages.shared.like_button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $message->created_at->diffForHumans() }} </span>
                {{-- {{ $message->created_at->toDateString() }} </span> --}}
            </div>
        </div>
        @include('messages.shared.comment_box')
    </div>
</div>
