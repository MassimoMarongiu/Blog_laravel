{{-- da seeders/photocontroller --}}
{{-- le foto si trovano in public/img --}}
{{-- content che sta all'interno di resources/view/layout/layout-bootstrap --}}

@extends('layout.app')
{{-- @extends('layout.layout-bootstrap') precedente all'installazione del login--}}
@section('content')

    @if (count($photos) == 0)
        {{-- //da seeders/photocontroller --}}
        <h1 class ="text-center"> You have 0 photos</h1>
    @else
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>url</th>
                    <th>Preview</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($photos as $photo)
                    <tr>
                        <td>{{ $photo->id }}</td>
                        <td>{{ $photo->title }}</td>
                        <td>{{ $photo->url }}</td>
                        <td><img class="photo-preview" src="{{ $photo->url }}" alt="" srcset=""
                                style="width:100px;height:100px;object-fit:cover;"></td>
                        <td>
                            <a class="btn btn-info" href="{{ route('photos.show', ['photo' => $photo->id]) }}">DETAILS</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('photos.edit', ['photo' => $photo->id]) }}">EDIT</a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('photos.destroy',['photo'=>$photo->id])}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="DELETE" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif
@endsection

