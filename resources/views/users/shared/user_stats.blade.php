<div class="d-flex justify-content-start">
    {{-- da usersController --}}
    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
        </span> {{ $user->followers()->count() }}
        {{-- Followers --}}
    </a>
    <a href="#" class="fw-light nav-link fs-6 me-3"><span class="far fa-light fa-message ">
        </span>
        {{ $user->messages()->count() }}
        {{-- Messaggi --}}
    </a>
    <a href="#" class="fw-light nav-link fs-6 me-3"><span class="far fa-light fa-comment  ">
        </span>
        {{ $user->comments()->count() }}
         {{-- Commenti --}}
         </a>
    <a href="#" class="fw-light nav-link fs-6 me-3"><span class="far fa-light fa-thumbs-up  ">
        </span>{{ $user->likes()->count() }}
         {{-- Likes --}}
        </a>
</div>
