@extends('layout.layout')
@section('title',"Messages | Admin Dashboard")
@section('content')
<div class="row">
    {{-- left navbar --}}
    <div class="col-3">
        @include('admin.shared.left_sidebar')
    </div>
    {{-- center area --}}
    <div class="col-9">
        <h1>Messages</h1>
        <table class=" table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Content</th>
                    <th>Created at</th>
                    <th>#</th>
                    <th>#</th>
                    {{-- <th>@lang('message.view')</th>
                    <th>@lang('message.edit')</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    {{-- <td>{{ $message->user->name }}</td> --}}
                    <td><a href="{{ route('users.show', $message->user)}}">{{ $message->user->name }}</a></td>
                    <td>{{ $message->content }}</td>
                    <td>{{ $message->created_at->toDateString() }}</td>
                    <td><a href="{{ route('messages.show', ['message' => $message->id]) }}">@lang('message.view')</a></td>
                    <td><a href="{{ route('messages.edit', ['message' => $message->id]) }}">@lang('message.modify')</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
    {{$messages->links()}}
        </div>
    {{-- </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
@endsection
