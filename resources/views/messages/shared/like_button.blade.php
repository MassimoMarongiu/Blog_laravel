<div>
    @auth
        @if (Auth::user()->likesMessage($message))
            <form action="{{ route('messages.unlike', $message->id) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $message->likes()->count() }} </button>
            </form>
        @else
            <form action="{{ route('messages.like', $message->id) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                    </span> {{ $message->likes()->count() }} </button>
            </form>
        @endif
    @endauth
    @guest
        <a id="likebutton" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
            </span> {{ $message->likes()->count() }} </a>
    @endguest
</div>
{{-- <script>
     document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('likebutton').addEventListener('click', function(event) {
            event.preventDefault();
            alert('Accedi/registrati per mettere i like');
        });
    });
</script> --}}
