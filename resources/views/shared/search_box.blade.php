{{-- da dashboardcontroller --}}
<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">{{trans('message.search')}}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard') }}" method="GET">
            <input value="{{request('search','')}}" name ="search" placeholder="..." class="form-control w-100" type="text"id="search">
            <button class="btn btn-dark mt-2"> @lang('message.search')</button>
        </form>
    </div>
</div>
