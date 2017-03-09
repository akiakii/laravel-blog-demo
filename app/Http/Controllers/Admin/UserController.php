<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
class UserController extends Controller
{
    //
    protected $fields = [
        'name' => '',
        'email' => '',
        'status' => '',
    ];
    public function index()
    {
        $user = User::all();
        return view('admin.user.index')->withUsers($user);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $user->$field);
        }
        return view('admin.user.edit', $data);
    }
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        foreach (array_keys(array_except($this->fields, ['tag'])) as $field) {
            $user->$field = $request->get($field);
        }
        $user->save();

        return redirect("/admin/user/$id/edit")
            ->withSuccess("Changes saved.");
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin/user')
            ->withSuccess("The '$user->name' tag has been deleted.");
    }
}
