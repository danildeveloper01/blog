<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __invoke()
    {
        $users = User ::all();

        return view('admin.main.users', compact('users'));
    }

    public function create()
    {
        $roles = User::getRoles();

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $password = Str::random(6);
        $data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email'=>$data['email']],$data);
        Mail::to($data['email'])->send(new PasswordMail($password));
        event(new Registered($user));

        return redirect()->route('admin.user');
    }

    public function show(User $show)
    {
        return view('admin.users.show', compact('show'));
    }

    public function edit(User $show)
    {
        $roles = User::getRoles();

        return view('admin.users.update', compact('show', 'roles'));
    }

    public function  update(UpdateRequest $request, User $show)
    {
        $update_data = $request->validated();
        $show->update($update_data);

        return view('admin.users.show', compact('show'));
    }

    public function delete(User $show)
    {
        $show->delete();

        return redirect()->route('admin.user');
    }
}
