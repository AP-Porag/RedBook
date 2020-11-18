<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected function edit($id)
    {
        return view('admin.user.update-profile',[
            'id'=>$id,
        ]);
    }
    protected function update(Request $request, $id){
        return 'ok'.$id;
    }
}
