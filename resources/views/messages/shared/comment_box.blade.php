<div>
    <form action="{{ route('messages.comments.store', $message->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> @lang('message.write_comment') </button>
            @error('content')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

    </form>
    <hr>
    @forelse ($message->comments as $key => $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageURL() }}"
                alt="{{ $comment->user->name }}">
            {{-- {{$comment->$user->getImageURL()}} --}}
            <div class="w-100">
                <div class="d-flex justify-content-between">

                    <h6 class=""><a href="{{ route('users.show', $comment->user_id) }}"> {{ $comment->user->name }}
                        </a> {{-- {{$message->user->name}} --}}
                    </h6>
                    <small class="fs-6 fw-light text-muted"> {{ $comment->created_at->diffForHumans() }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
        @empty
        <p class="text-center mt-4">Nessun Commento</p>
    @endforelse

</div>
