<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


/**
 * 你是新的开头 诗的内容 童话的结尾
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','checkUser']]);
    }

    /**
     * Register a account then return token
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if($user->save()){
            return response()->json(self::respondJson(true,'When you pull out the sword, the end begins'));
        }else{
            return response()->json(self::respondJson(false,'「何度だって 立ち上がって」',null,'500'),500);
        }
    }

    public function checkUser(){
        $email = request(['email']);
        if(User::where('email',$email)->first()){
            return response()->json(self::respondJson(true,'',null));
        }else{
            return response()->json(self::respondJson(false,'',null));
        }

    }
    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
//        $credentials = request(['name', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(self::respondJson(false,'Unauthorized',null,401), 200);
        }

        return response()->json(self::respondJson(true,'Only my RAILGUN can shoot it 今すぐ',$this->respondWithToken($token)));
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(self::respondJson(true,'Successfully logged out'));
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return response()->json(self::respondJson(true,null,$this->respondWithToken(auth()->refresh())));
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return array
     */
    protected function respondWithToken($token)
    {
        return [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }

}
