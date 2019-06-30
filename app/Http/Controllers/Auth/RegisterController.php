<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }


    // Custom rgistration method

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'organization' => $data['organization'],
            'bin' => $data['bin'],
            'dolzhnost' => $data['dolzhnost'],
            'address' => $data['address'],
            'contact' => $data['contact'],

        ]);

        if (file_exists(request('rekvizit'))) {
            $file = request('rekvizit');
            $name = date("Y-m-d-H-i-s").request('rekvizit')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/user/', $name);
            $user->update(['rekvizit' => '/public/uploads/user/'.$name]);
        }
        if (file_exists(request('svidetelstvo'))) {
            $file = request('svidetelstvo');
            $name = date("Y-m-d-H-i-s").request('svidetelstvo')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/user/', $name);
            $user->update(['svidetelstvo' => '/public/uploads/user/'.$name]);
        }
        if (file_exists(request('nds'))) {
            $file = request('nds');
            $name = date("Y-m-d-H-i-s").request('nds')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/user/', $name);
            $user->update(['nds' => '/public/uploads/user/'.$name]);
        }
        if (file_exists(request('ustav'))) {
            $file = request('ustav');
            $name = date("Y-m-d-H-i-s").request('ustav')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/user/', $name);
            $user->update(['ustav' => '/public/uploads/user/'.$name]);
        }

        if (file_exists(request('prikaz'))) {
            $file = request('prikaz');
            $name = date("Y-m-d-H-i-s").request('prikaz')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/user/', $name);
            $user->update(['prikaz' => '/public/uploads/user/'.$name]);
        }

        if (file_exists(request('reshenie'))) {
            $file = request('reshenie');
            $name = date("Y-m-d-H-i-s").request('reshenie')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/user/', $name);
            $user->update(['reshenie' => '/public/uploads/user/'.$name]);
        }
        

        return $user;
    }
}
