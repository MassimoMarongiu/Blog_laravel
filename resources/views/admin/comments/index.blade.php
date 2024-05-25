@extends('layout.layout')
@section('title', 'Comments | Admin Dashboard')
@section('content')
    <div class="row">
        {{-- left navbar --}}
        <div class="col-3">
            @include('admin.shared.left_sidebar')
        </div>
        {{-- center area --}}
        <div class="col-9">
            <h1>Comments</h1>
            <div >
                @include('messages.shared.success_message')
            </div>
            <table class=" table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Message id</th>
                        <th>Message</th>
                        <th>Content id</th>
                        <th>Content</th>
                        <th>Created at</th>
                        <th>#</th>
                        {{--  <th>#</th> --}}
                        {{-- <th>@lang('message.view')</th>
                    <th>@lang('message.edit')</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            {{-- <td>{{ $comment->user->name }}</td> --}}
                            <td>
                                <a href="{{ route('users.show', $comment->user) }}">{{ $comment->user->name }}</a>
                            </td>
                            <td><a href="{{ route('users.show', $comment->user) }}">{{ $comment->message->id }}</a> </td>
                            <td><a href="{{ route('users.show', $comment->user) }}">{{ $comment->message->content }}</a>
                            </td>
                            <td><a href="{{ route('messages.show', $comment->message) }}">{{ $comment->message->id }}</a>
                            </td>
                            <td><a href="{{ route('messages.show', $comment->message) }}">{{ $comment->content }}</a></td>
                            <td>{{ $comment->created_at->toDateString() }}</td>
                            <td>
                                <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    {{-- <a href="#" onclick="this.closest('form').submit();return false;">@lang('message.delete')"></a> --}}
                                    <button class="btn btn-danger" type="submit">@lang('message.delete')</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
        {{ $comments->links() }}
    </div>
    {{-- </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
@endsection
