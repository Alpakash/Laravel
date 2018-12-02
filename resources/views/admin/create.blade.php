@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <form class="needs-validation" novalidate method="POST" action="/admin/users/create">
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label>Voornaam</label>
                    <input type="text" name="fName" class="form-control" id="validationCustom01" placeholder="voornaam" value="Tuan"
                           required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Last name</label>
                    <input type="text" name="lName" class="form-control" id="validationCustom02" placeholder="Achternaam" value="Nguyen"
                           required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                        </div>
                        <input type="text" name="email" class="form-control" id="validationCustomUsername" placeholder="email"
                               aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="invalidCheck" required>
                    <label class="custom-control-label" for="invalidCheck">Agree to terms and conditions</label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
    </div>


@endsection