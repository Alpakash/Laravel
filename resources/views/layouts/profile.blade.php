<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4 mb-4">
                <div style="text-align: center;" class="card-header"><strong>Dashboard</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="cardBorder">
                 <div class="profileIcon"> <i class="fas fa-id-card"></i> </div>
                 
                 <div class="profileLabel"><strong>Name:</strong><p> {{ Auth::user()->name }} {{ Auth::user()->lastName }}</p></div>
                    </div>

  <div class="cardBorder">
                 <div class="profileIcon"> <i class="fas fa-trophy"></i></div>
                  <div class="profileLabel"><strong>Place:</strong><p> 6th out of the 120 players</p></div>
  </div>

  <div class="cardBorder">
      <div class="profileIcon"> <i class="fas fa-list-alt"></i> </div>
                 <div class="profileLabel"> <strong>Battles:</strong><p> 4 battles played </p></div>
  </div>

   <div class="cardBorder">
       <div class="profileIcon"> <i class="fas fa-forward"></i> </div>
       <div class="profileLabel"> 
                  <strong>Upcoming match:</strong><p> Henry, Sjaak, Willow and {{ Auth::user()->name }} @ Table 2</p>
       </div>
   </div>
  <div class="cardBorder">
       <div class="profileIcon"> <i class="fas fa-plus-square"></i> </div>
       <div class="profileLabel"> 
                  <strong>Account created:</strong><p> {{ Auth::user()->created_at }}</p>
       </div>
    </div>

    <center><a href='welcome'><button class="btn btn-danger form-control">Watch Carcassonne Insights</button></a></center>
        @if(Auth::user()->isAdmin())
                        <center><a href='admin'><button class="btn btn-primary form-control">Admin Dashboard</button></a></center>
        @elseif(Auth::user()->isJudge() || Auth::user()->isAdmin())
                        <center><a href='judge'><button class="btn btn-primary form-control">Judge Page</button></a></center>
                    @endif

                        @if(Auth::user()->isAdmin() || Auth::user()->isJudge())
                            <center><a href='scores'><button class="btn btn-success form-control">Scores invoeren</button></a></center>
                        @endif
                </div>

            </div>
        </div>
    </div>
</div>