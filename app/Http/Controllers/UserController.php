<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Exists;
use Spatie\Permission\Models\Role;
use TheSeer\Tokenizer\Exception;

class UserController extends Controller
{
    private $userService;   
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService=$userService;
        $this->middleware('permission:userList', ['only' => ['index,create,store,show,edit,update,delete']]);
        $this->middleware('auth');
    }

    public function index()
    {
        $result = User::all();
        return view('backend.authorization.user.index', compact('result'));
    }

    public function create()
    {
        $role = Role::all();
        return view('backend.authorization.user.create', compact('role'));
    }


    public function store(UserRequest $request)
    {
        $validData = $request->validated();
        $validData['password'] = Hash::make($validData['password']);
        
        $this->userService->store($validData);
        return redirect()->route('user.index');

        // try {
        //     DB::transaction(function () use($request) {
        //         $validData = $request->validated();
        //         $validData['password'] = Hash::make($validData['password']);
        //         $user = User::create($validData);

        //         // $user = User::create([
        //         //     'name' => $validData['name'],
        //         //     'email' => $validData['email'],
        //         //     'password' => $encryptPassword,
        //         // ]);

        //         // $role = Role::where('id', $request->input('role'))->get();

        //         $user->assignRole($validData['role']);
               
        //     });
        // } catch (Exception $e) {
        //     // Log::channel('web_daily_error')->error("Admin Create", [$e->getMessage()]);
        //     return Redirect::back()->withErrors($e->getMessage());
        // }

       // return redirect()->route('user.index');
}

    public function show($id)
    {
        $result = User::where('id', $id)->first();
        return view('backend.authorization.user.show', compact('result'));
    }


    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $role = Role::all();
        return view('backend.authorization.user.edit', compact('user', 'role'));
    }


    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required'

        ]);

        $user = User::where('id', $id)->first();

        $user->update($validData);

        // $user->update([
        //     'name' => $validData['name'],
        //     'email' => $validData['email'],
        // ]);

        $user->syncRoles($validData['role']);
        return redirect()->route('user.index');
    }


    public function destroy($id)
    {
        $result = User::where('id', $id)->first();
        $result->delete();
        return redirect()->route('user.index');
    }
}
