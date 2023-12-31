<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Http\Requests\AuthRequest;




class AuthController extends BaseController
{
    /**
     * Register api
     * @return \Illuminate\Http\Response
     */

    public function register(AuthRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $success['token'] =  $user->createToken('NeuroNation')->accessToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }


    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            $user = Auth::user();

            $success['token'] =  $user->createToken('NeuroNation')->accessToken;
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    /**
     * logout api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
