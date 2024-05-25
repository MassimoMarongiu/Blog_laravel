@auth
    <h4> @lang('message.logged_to_share') </h4>

<div class="row">
    <form action="{{route('messages.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            {{-- per le validazioni di array json ip address etc --}}
            {{-- https://laravel.com/docs/11.x/validation#available-validation-rules --}}
            @error('content')
            <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Invia </button>
        </div>
    </form>

</div>
@endauth
@guest
{{-- __ oppure trans  oppure @lang serve per entrare in lang --}}
    <h4>@lang('message.login_to_share')</h4>
    {{-- <h4>{{trans('message.login_to_share')}}</h4> --}}
    {{-- <h4>{{__('message.login_to_share')}}</h4> --}}
@endguest

