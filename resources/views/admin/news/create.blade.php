<form method="POST" action="{{ route('news.store') }}">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

        <div class="col-md-6">
            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" required autofocus>

            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>

        <div class="col-md-6">
           <textarea style="width: 100%;height: 90%;" name="desc"></textarea>
            @if ($errors->has('desc'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('desc') }}</strong>
                </span>
            @endif
        </div>
    </div>




 
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Nieuw News</button>
        </div>
    </div>
</form>