<form action="{{ route('products.search') }}" class="d-flex  mr-2" method="get">

    <div class="form-group mb-0 mr-1" >
        <input type="text" name="q" class="form-control" value="{{ request()->q ?? '' }}">

    </div>
    <button class="btn btn-info" type="sublit"> <i class="fa fa-search" aria-hidden="true"></i>Search </button>
</form>
