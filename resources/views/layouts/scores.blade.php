
<div class="container">
    <center><h1 class="mt-4">Ronde 1</h1></center>
    <div class="row">
        @if(Auth::user()->isAdmin() || Auth::user()->isJudge())
       <div class="col-md-3">

            <div class="card mt-4">
                <a href="/score" class="tableLinks"> <div class="card-header"><center><strong>Tafel 1</strong></center>
                </div>

                <div class="card-body">
                        clickable tables for <b>Admins and Judges</b>
                </div>
                </a>
            </div>
            </div>

            <div class="col-md-3">
            <div class="card mt-4">
                <a href="#" class="tableLinks"> <div class="card-header"><center><strong>Tafel 2</strong></center>
                </div>

                <div class="card-body">
                        clickable tables for <b>Admins and Judges</b>
                </div>
                </a>
            </div>
            </div>

            <div class="col-md-3">
            <div class="card mt-4">
                <a href="#" class="tableLinks"> <div class="card-header"><center><strong>Tafel 3</strong></center>
                </div>

                <div class="card-body">
                        clickable tables for <b>Admins and Judges</b>
                </div>
                </a>
            </div>
            </div>

            <div class="col-md-3">
            <div class="card mt-4">
                <a href="#" class="tableLinks"> <div class="card-header"><center><strong>Tafel 4</strong></center>
                </div>

                <div class="card-body">
                        clickable tables for <b>Admins and Judges</b>
                </div>
                </a>
            </div>
            </div>
        @elseif(Auth::user()->isUser() || Auth::user()->isStores())
            <div class="col-md-3">
                <div class="card mt-4">
                    <div class="card-header"><center><strong>Tafel 1</strong></center>
                    </div>

                    <div class="card-body">

                        Non-clickable


                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
