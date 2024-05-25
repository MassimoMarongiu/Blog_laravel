<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : '' }} nav-link"
                    href="{{ route('admin.dashboard') }}">
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('admin.users.index') ? 'text-white bg-primary rounded' : '' }} nav-link"
                    href="{{ route('admin.users.index') }}">
                    <span>Users</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('admin.messages.index') ? 'text-white bg-primary rounded' : '' }} nav-link"
                    href="{{ route('admin.messages.index') }}">
                    <span>Messages</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('admin.comments.index') ? 'text-white bg-primary rounded' : '' }} nav-link"
                    href="{{ route('admin.comments.index') }}">
                    <span>Comments</span></a>
            </li>

        </ul>
    </div>

    <div class="card-footer text-center py-2">
        <p>@lang('message.language')</p>
        <hr>
        <a class="btn btn-link btn-sm" href="{{ route('lang', ['lang' => 'en']) }}"><img
                src="{{ asset('images/flag/eng_flag.png') }}" style="width: 20px; height: 20px;">
            En</a>
        <a class="btn btn-link btn-sm" href="{{ route('lang', ['lang' => 'it']) }}">
            <img
                src="{{ asset('images/flag/ita_flag_1.png') }}" style="width: 20px; height: 15px;">
            It</a>
    </div>
</div>
