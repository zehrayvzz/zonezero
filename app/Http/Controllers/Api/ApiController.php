<?php

namespace App\Http\Controllers\Api;


use App\Models\User;
use JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * @var bool
     */
    public $loginAfterSignUp = true;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $input = $request->only('tckn', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        $user = User::where('tckn',$request->tckn)->first();
        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    /**
     * @param RegistrationFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tckn' => 'required|min:11|max:11',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birth_year' => 'required|min:4|max:4',
            'phone_number' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "code" => "validation",
                "message" => json_encode($validator)

            ]);
        }

        $user = new User();
        $user->tckn = $request->tckn;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birth_year = $request->birth_year;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            'success'   =>  true,
            'data'      =>  $user
        ], 200);
    }

    public function me()
    {
        $user = Auth::user();

        return response()->json([
            'success'   =>  true,
            'data'      =>  $user
        ], 200);
    }
}
