 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
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
                                        <p> {{ $news->desc }}</p>
                                        @if(Auth::user()->isAdmin() || Auth::user()->isJudge())

                                        <span style="display: inline-block">
                                            <a href='{{url("/admin/news/{$news->id}/edit")}}'>
                                                    <button style="display: inline-block" class="float-left btn btn-warning">Edit artikel</button>
                                                </a>

                                               <form style="display: inline-block" action="{{url("/admin/news/{$news->id}")}}" method="post">
                                                    @csrf
                                                   @method('delete')
                                                    <input type="submit" value="DELETE" class="btn mt-2 btn-sm btn-danger">
                                                </form>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                    @endforeach
                            </div>
                        </div>
                </div>
                </div>
            </div>

        </div>
            @if(Auth::user()->isAdmin() || Auth::user()->isJudge())
     <center><a href="{{url('/admin/news/create')}}"><button class="mt-5 btn btn-primary">Creëer artikel</button></a></center>
            @endif
 </div>

</div>