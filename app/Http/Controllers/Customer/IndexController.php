<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\LoginRequest;
use App\Http\Requests\Customer\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function getHome()
    {
        return view('customer.pages.home');
    }

    public function getLogin()
    {
        return view('customer.pages.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            setSessionMessage('Login Successful !');

            return response()->json([
                'status' => true,
                'messages' => ['Login Successful !'],
                'data' => []
            ]);
        }

        setSessionMessage('User Not Found !', 'danger');

        return response()->json([
            'status' => false,
            'messages' => ['User Not Found !'],
            'data' => []
        ]);
    }

    public function getLogout()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('customer.home');
    }

    public function getRegister()
    {
        return view('customer.pages.auth.register');
    }

    /**
     * @throws \Throwable
     */
    public function postRegister(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $inputs = $request->validated();
        $inputs['password'] = bcrypt($inputs['password']);

        try {
            $user = User::query()->create($inputs);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'messages' => [$e->getMessage()],
                'data' => [],
            ]);
        }

        // Login User
        Auth::login($user);

        $responseMessage = 'Register Successful !';
        setSessionMessage($responseMessage);

        return response()->json([
            'status' => true,
            'messages' => [$responseMessage],
            'data' => [],
        ]);
    }
}
