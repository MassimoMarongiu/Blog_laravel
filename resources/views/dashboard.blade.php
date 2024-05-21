@extends('layout.layout')
@section('content')
    {{-- navbar --}}
    {{-- @include('layout.navbar') --}}
    {{-- left navbar --}}
    {{-- <div class="container py-4"> --}}
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
                    @include('messages.shared.submit_message')
                </div>
                <hr>
                <div>
                    @forelse ($messages as $message)
                        <div class="mt-3">
                            @include('messages.message_card')
                        </div>
                    @empty
                        <p class="text-center mt-4">Nessun risultato trovato </p>
                    @endforelse

                    {{-- paginazione --}}
                    {{-- <div class="mt-3">
                        {{ $messages->withQueryString()->links() }}
                    </div> --}}

                </div>
                <div class="mt-3">
                    {{ $messages->links() }}
                    {{-- go to app/providers/appserviceproviders --}}
                </div>
            </div>
            {{-- right navbar --}}
            <div class="col-3" style="position:absolute; right:0;">
                @include('shared.search_box')
                @include('shared.follow_box')
            </div>
        </div>
    {{-- </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
@endsection
