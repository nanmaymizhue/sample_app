<?php 

namespace App\Services\User;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Exception;

class UserService implements UserServiceInterface{
    public function store($request){

        try{
            DB::transaction(function() use($request){
                $user = User::create($request);
                $user->assignRole("New");
                return $user;
            });           

        }catch(Exception $e){
            return redirect()->back()->withErrors(["errorMessage"=>$e->getMessage()]);
        }
    }
}