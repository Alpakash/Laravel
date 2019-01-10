 <div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>News</strong>
                </div>

                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                    @foreach ($news as $news)
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#index{{ $news->id }}" aria-expanded="true" aria-controls="index{{ $news->id }}">
                                            {{ $news->title }}
                                        </button>
                                    </h5>
                                </div>


                                <div id="index{{ $news->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">

                                        <strong style="text-align: right">{{ $news->created_at }}</strong>
                                        <p> {{ $news->desc }}</p>                                    </div>
                                </div>
                    @endforeach




                            </div>
                        </div>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>