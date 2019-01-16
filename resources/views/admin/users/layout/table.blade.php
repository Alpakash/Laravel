<div class="w-100">
    {{--class=""  width="100%" style="border-collapse: initial !important;"--}}
    <table id="userTable" class="table  mt-3" width="100%" style="border-collapse: initial !important;" >
        <thead>
        <tr>
            <th scope="col">voornaam</th>
            <th scope="col">achternaam</th>
            <th scope="col">email</th>
            <th scope="col">Geactiveerd</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)

            <tr>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['lastName'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>
                    <span class="checkIcon checkIcon{{ ($user->email_verified_at)? 'Green' : 'Red' }} round-btn">
                        <a class="btn d-flex justify-content-center align-items-center p-0">
                            <i class="fas fa-{{ ($user->email_verified_at)? 'check' : 'times' }}"></i>
                        </a>
                    </span>
                </td>
                <td class="d-flex justify-content-start">
                    <span class="pencilIcon round-btn mr-3">
                        <a href="{{route("admin.$name.show", $user->id) }}" class="btn d-flex justify-content-center align-items-center p-0">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </span>
                    <span class="trashIcon round-btn">
                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                           <i class="fas fa-trash-alt"></i>
                        </a>
                    </span>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>