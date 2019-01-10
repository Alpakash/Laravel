<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar-fixed position-fixed">

        <a href="/" class=" pt-0  pb-4 pr-4 pl-4 waves-effect">
            <img src="https://upload.wikimedia.org/wikipedia/it/3/38/Carcassonne_Logo.png" class="img-fluid" alt=""  width="200px">
        </a>
        <hr class="w-100 mt-0 mb-0" />
        <div id="sidebar-user" class="d-flex profile-wrap">
            <div class="d-flex flex-row w-100 align-items-center" style="padding: 1.25rem .75rem;">
                <div class="d-flex">
                   <span class="ft-30">
                         <i class="far fa-user-circle"></i>
                   </span>
                </div>
                <div class="d-flex flex-column ml-3">
                    <span class="ft-18"><b>{{ Auth::user()->name}}</b></span>
                    <span>{{ Auth::user()->Role->role }}</span>
                </div>
            </div>
        </div>
        <hr class="w-100 mt-0 mb-4" />
        <div id="sidebar-list" class="list-group list-group-flush">

            <a href="/admin" class="list-group-item bg-home pt-2 pb-2 no-radius text-white box-shadow">
                <i class="fa fa-pie-chart mr-3"></i>Admin Dashboard
            </a>
            <a href="/admin/deelnemers" class="list-group-item list-group-item-action">
                <i class="fa fa-user mr-3"></i>Deelnemers</a>
            <a href="#" class="list-group-item list-group-item-action ">
                <i class="fa fa-table mr-3"></i>Judges</a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="fa fa-money mr-3"></i>Permissies</a>
            <a href="/admin/news/create" class="list-group-item list-group-item-action">
                <i class="fa fa-newspaper mr-3"></i>Post creëren</a>
        </div>

        <div class="position-absolute w-100" style="bottom:0;left:0;">
            <div class="d-flex w-100 justify-content-between align-items-center mt-4 p-3 flex-row">
                <div class="d-flex justify-content-between align-items-center flex-row-reverse  w-100">
                    <span class="mb-2">Nacht modus</span>
                    <label id="toggle-modus" class="bs-switch toggle-nav ml-3">
                        <input id="toggle-input" type="checkbox" value="0"  /><span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a class="border-light  home-hover d-flex justify-content-center align-items-center w-100 p-4 toggle-text" href="/info">
                    <i class="fas fa-info"></i>
                </a>
                <a class="border-light home-hover d-flex justify-content-center align-items-center w-100 p-4 toggle-text" href="">
                    <i class="fas fa-cog"></i>
                </a>
                <a class="border-light home-hover d-flex justify-content-center align-items-center w-100 p-4 toggle-text" href="/logout">
                    <i class="fas fa-power-off"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Sidebar -->

</header>
<!--Main Navigation-->
