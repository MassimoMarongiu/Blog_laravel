@extends('layout.layout')
@section('title',"Users | Admin Dashboard")
@section('content')
<div class="row">
    {{-- left navbar --}}
    <div class="col-3">
        @include('admin.shared.left_sidebar')
    </div>
    {{-- center area --}}
    <div class="col-9">
        <h1>Users</h1>
        <table class=" table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joined at</th>
                    <th>@lang('message.view')</th>
                    <th>@lang('message.edit')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->toDateString() }}</td>
                    <td><a href="{{ route('users.show', ['user' => $user->id]) }}">@lang('message.view')</a></td>
                    <td><a href="{{ route('users.edit', ['user' => $user->id]) }}">@lang('message.modify')</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}


            </div>
        </div>
    {{-- </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
@endsection
