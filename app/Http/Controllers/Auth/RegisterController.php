<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); 
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
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    
    //insert to the database for the users table 
    public function store(Request $request){
        
        //validate fields 
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = new User;
        $user->name = $request->name; 
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Alert::success('Éxito', 'administrador creado');
        return redirect()->route('administrators');
     }


     //show users
     public function index(){
        $user = User::all();
        return view('dashboard.pages.admin.show' , ['user'=> $user]);
     }


     //display a specific user
     public function show($id){
        $user = User::find($id);
        return view('dashboard.pages.admin.update' ,  ['user' => $user]);
     }

     
     //update a specific user 
     public function update(Request $request , $id){
         
        $incoming = $request->all();
        $user = User::find($id);
        //validate fields 
         $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        //In case of changing the password, it will save it in the database 
        //and validate the entered email does not exist. 
        if(!$incoming['password'] == null){
           $request->validate(['password' => ['required', 'string', 'min:8', 'confirmed'],]);
           $user->password = Hash::make($request->password);
        }
        $user->save();
        Alert::success('Éxito', 'administrador actualizado');
        return redirect()->route('showadmin');
}


     //delete a specific user
     public function destroy($id){
        $user = User::find($id);
        $user->delete();
        Alert::success('Éxito', 'administrador eliminado');
        return redirect()->route('showadmin');
    }


}
