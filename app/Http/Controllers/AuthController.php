<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\traits\HttpResponses;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakeDAta =[
            'id' => '1',
            'name' => 'testname',
            'email' => 'testemail@gmail.com'
        ];
        return response()->json([
          $fakeDAta
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Login(LoginRequest  $request)
    {

      $request->validated($request->all());

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Bad Credentials'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    //    $request->validated($request->all());

    //    if(auth()->attempt(['email', 'password'])) {
    //         return $this->error('', 'credentials do not match', 401);
    //    }

    //    $user = User::where('email', $request->email)->first();
    //    return $this->success([
    //     'user'=> $user,
    //     'token' => $user->createToken('Api Token of' . $user->name)->plainText
    //    ]);


    /**
     * Store a newly created resource in storage.
     */
    public function Register(AuthRequest $request)
    {
        $request->validated($request->all());

        $user = User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ]);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of' . $user->name)->plainTextToken
        ]);
    }


    public function Logout(Request $request)

    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'you have been logged out'
        ]);
    }
}
