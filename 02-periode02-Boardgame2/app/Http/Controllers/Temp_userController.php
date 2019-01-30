<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Temp_userController extends Controller
{
    public function destroy($id)
    {
        // Controller to destroy the temporary user and redirect back to the players page with a success message
        DB::table('temp_users')->where('id', $id)->delete();
        return redirect(url('/players'))->with('message', 'The user with id: ' . $id . ' is deleted succesfully, good job!');
    }
}
