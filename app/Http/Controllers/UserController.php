<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller
{
    //
    public function signup(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'category' => 'required|string',
        //     'quantity' => 'required|string',
        // ]);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;


        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => $role,
        ]);
        $token =$user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user'=>$user,
            'token'=>$token
        ];

        // return response()->json('added successfully');
        return response($response,202);


    }
    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return response([
                'message'=>['login failed']
            ],403);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token'=>$token
        ];
        return response($response,201);
    }

    public function updateData(Request $request){

        $user = auth()->user();

        $name =$request->name;
        $email = $request->email;
        $password = $request->password;


        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);

        $user->save();

        // $plant->name=$name;
        // $plant->category=$category;
        // $plant->quantity=$quantity;
        // $plant->path=$path;


        return $user;

    }

    public function logout(){
        $user = Auth::user();

        $user->tokens()->delete();
        return response()->json('logout successfully');    }
    
}
