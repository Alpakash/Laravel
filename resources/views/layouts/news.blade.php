<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>News</strong>
                </div>

                <div class="card-body">

                    <!-- Countdown Timer JavaScript-->
                    @include('layouts.cd-buttons')   
                                                    
                    {{$news}}
                </div>
            </div>
        </div>
    </div>
</div>