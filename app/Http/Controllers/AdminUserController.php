<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Traits\StorageDeleteModelTrail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    use StorageDeleteModelTrail;
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
       $this->user =$user; 
       $this->role =$role;
    }
    public function index(){
        $users =$this->user->latest()->paginate(5);
        return view('admin.user.index',compact('users'));
    }
    public function create(){
        $roles=$this->role ->all();
        return view('admin.user.add',compact('roles'));
    }
    public function store(Request $request){
        try{
            DB::beginTransaction();
            $users= $this->user->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
            $users->roles()->attach($request->role_id);
            DB::commit();
            return  redirect()->route('user.index');
        }catch(\Exception $excep){
            DB::rollBack();
            Log::error('Lỗi: '. $excep->getMessage() . 'Line: '.$excep->getLine());
        };
        
    }
    public function edit($id){
        $roles=$this->role ->all();
        $users =$this->user->find($id);
        $roleUser = $users->roles;
        return view('admin.user.edit',compact('roles','users','roleUser'));
    }
    public function update($id, Request $request){
        try{
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
            $users =$this->user->find($id);
            $users->roles()->sync($request->role_id);
            DB::commit();
            return  redirect()->route('user.index');
        }catch(\Exception $excep){
            DB::rollBack();
            Log::error('Lỗi: '. $excep->getMessage() . 'Line: '.$excep->getLine());
        };
    }
    public function delete($id){
        return $this->deleteTrait($id, $this->users);
    }


}
