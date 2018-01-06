<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'institution' => 'required|string|max:150',
            'lattes' => 'required',
            'academicTitle' => 'required|string|max:50',
            'typeAccount' => 'required|string|max:50',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'institution' => $data['institution'],
            'lattes' => $data['lattes'],
            'academicTitle' => $data['academicTitle'],
            'typeAccount' => $data['typeAccount'],
        
        ]);
    }

    /*public function updateAccount(Request $resquest){
        $data = array();
        $this.

        $validator = $request->validate($data);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->institution = $request->password;
        $user->lattes = $request->lattes;
        $user->academicTitle = $request->academicTitle;
        $user->typeAccount = $request->typeAccount;
        if($user->save())
            return response()->json(['updateAccountOk']);
        else
            return response()->json(['updateAccountFailed']);
    }
    */
}
