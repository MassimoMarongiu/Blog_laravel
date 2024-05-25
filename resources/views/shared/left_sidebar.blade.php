<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }} nav-link"
                    href="{{ route('dashboard') }}">
                    <span>Home</span></a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Esplora</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Contenuti</span></a>
            </li> --}}
            <li class="nav-item">
                <a class="{{ Route::is('feed') ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ route('feed') }}">
                    <span>@lang('message.feed')</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('terms') ? 'text-white bg-primary rounded' : '' }} nav-link"
                    href="{{ route('terms') }}">
                    <span>@lang('message.terms')</span></a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Supporto</span></a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Impostazioni</span></a>
            </li> --}}
        </ul>
    </div>

    <div class="card-footer text-center py-2">
        <p>@lang('message.language')</p>
        <hr>
        <a class="btn btn-link btn-sm" href="{{ route('lang', 'en') }}"><img
                src="{{ asset('images/flag/eng_flag.png') }}" style="width: 20px; height: 20px;">
            En</a>
        <a class="btn btn-link btn-sm" href="{{ route('lang', 'it') }}">
            <img
                src="{{ asset('images/flag/ita_flag_1.png') }}" style="width: 20px; height: 13px;">
            It</a>
        {{-- <a class="btn btn-link btn-sm" href="{{route('profile')}}">@lang('message.view_profile')</a>
        <a class="btn btn-link btn-sm" href="{{route('profile')}}">@lang('message.view_profile')</a> --}}
    </div>
</div>
