@extends('layout.layout')
@section('content')
    {{-- left navbar --}}
    <div class="container py-4">
        <div class="row">
            {{-- left navbar --}}
            <div class="col-3">
                @include('shared.left_sidebar')
            </div>
            {{-- center area --}}
            <div class="col-6">
                <div class="mt-3">
                    @include('messages.shared.success_message')
                </div>
                <div class="mt-3">
                    @include('users.shared.user_edit_card')
                </div>
                @forelse ($messages as $message)
                    <div class="mt-3">
                        @include('messages..message_card')
                    </div>
                @empty
                    <p class="text-center mt-4">Nessun risultato trovato </p>
                @endforelse
                <div class="mt-3">
                    {{ $messages->withQueryString()->links() }}
                </div>
            </div>
            {{-- right navbar --}}
            <div class="col-3">
                @include('shared.search_box')
                @include('messages.shared.follow_box')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
@endsection
