<?php
namespace  App\Http\Controllers;

use App\Http\Requests\RegisterAuthRequest;
use App\User;
use Illuminate\Http\Request;
use  JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class  AuthController extends  Controller {
    public  $loginAfterSignUp = true;

    public  function  register(Request  $request) {
        $user = new  User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($this->loginAfterSignUp) {
            return  $this->login($request);
        }

        return  response()->json([
            'status' => 'ok',
            'data' => $user
        ], 200);
    }

    public  function  login(Request  $request) {
        $input = $request->only('email', 'password');
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return  response()->json([
                'status' => 'invalid_credentials',
                'message' => 'Email o Password Incorrectos.',
            ], 401);
        }

        return  response()->json([
            'status' => 'ok',
            'token' => $jwt_token,
        ]);
    }

    public  function  logout(Request  $request) {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);
            return  response()->json([
                'status' => 'ok',
                'message' => 'Se cerró la sesión.'
            ]);
        } catch (JWTException  $exception) {
            return  response()->json([
                'status' => 'unknown_error',
                'message' => 'Error desconocido, No se cerro la sesión.'
            ], 500);
        }
    }

    public  function  getAuthUser(Request  $request) {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);
        return  response()->json(['user' => $user]);
    }
}