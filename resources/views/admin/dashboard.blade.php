@extends('layout.layout')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="row">
        {{-- left navbar --}}
        <div class="col-3">
            @include('admin.shared.left_sidebar')
        </div>
        {{-- center area --}}
        <div class="col-9">
            <h1>Admin Dashboard</h1>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    @include('shared.widget', [
                        'title' => 'Total Users',
                        'icon' => 'fas fa-users',
                        'data' => $totalUsers,
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include('shared.widget', [
                        'title' => 'Total Messages',
                        'icon' => 'fas fa-message',
                        'data' => $totalMessages,
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include('shared.widget', [
                        'title' => 'Total Comments',
                        'icon' => 'fas fa-comment',
                        'data' => $totalComments,
                    ])
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
@endsection
