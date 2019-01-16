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
       <div class="profileIcon"> <i class="fas fa-forward"></i> </div>
       <div class="profileLabel">
               <strong>Upcoming match:</strong><p>
               @foreach($users_table as $key => $tableData)
                   {{$tableData->name}}@if(count($users_table) != $key+1),@endif
               @endforeach

               @isset($users_table[0]) @ Table {{$users_table[0]->table_id}}

               @else No upcoming match @endisset
               </p>

       </div>
   </div>
  <div class="cardBorder">
       <div class="profileIcon"> <i class="fas fa-plus-square"></i> </div>
       <div class="profileLabel"> 
                  <strong>Account created at:</strong><p> {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('d-m-Y') }}</p>
       </div>
    </div>

    <center><a href="{{url('/welcome')}}"><button class="btn btn-danger form-control">Watch Carcassonne Insights</button></a></center>
        @if(Auth::user()->isAdmin())
                        <center><a href="{{url('/admin')}}"><button class="btn btn-primary form-control">Admin Dashboard</button></a></center>
        @elseif(Auth::user()->isJudge() || Auth::user()->isAdmin())
                        <center><a href="{{url('/judge')}}"><button class="btn btn-primary form-control">Judge Page</button></a></center>
                    @endif

                        @if(Auth::user()->isAdmin() || Auth::user()->isJudge())
                            <center><a href="{{url('/scores')}}"><button class="btn btn-success form-control">Scores invoeren</button></a></center>
                        @endif
                </div>

            </div>
        </div>
    </div>
</div>