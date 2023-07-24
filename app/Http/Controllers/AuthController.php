<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        if (Auth::check()){
            $user_role=Auth::user()->role;
            switch($user_role){
                case 1:
                    return redirect('/own');
                    break;
                case 2:
                    return redirect('/man');
                    break;
                case 3:
                    return redirect('/rest');
                    break;
                case 4:
                    return redirect('/emp');
                    break;
                default:
                    Auth::logout();
                    return redirect('/login')->with('error','oops!, Something went wrong');
            }
        }
        return view('auth.login');
    } // END Function (Login View)

    public function login(Request $request){
        $credintials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($credintials)){
            $user_role=Auth::user()->role;

            switch($user_role){
                case 1:
                    return redirect('/own');
                    break;
                case 2:
                    return redirect('/man');
                    break;
                case 3:
                    return redirect('/rest');
                    break;
                case 4:
                    return redirect('/emp');
                    break;
                default:
                    Auth::logout();
                    return redirect('/login')->with('error','oops!, Something went wrong');
            }
        } else {
            return view('auth.login');
        }
    } // END Function (Login Fucntion)

    public function register(){
        return view('auth.register');
    } // END Function (Register View)

    public function signUp(){
        $formFeilds =  request()->validate([
            'name'=> 'required|string|unique:users',
            'email'=> 'required|string|unique:users',
            'password'=> 'required|min:5',

            'fullname' => 'required|string',
            'phone'=> 'required|string|unique:profiles',
            'country' => 'required',
            'state' => 'required',
            'address' => 'required',
        ],

        [
            'email.unique' => 'This Email Is Already Registered',
            'name.unique' => 'This Name Is Taken',
            'phone.unique' => 'This Phone Number Is Already Signed',
            'password.min' => 'Password Must Be 6+ Charechters',
        ]
    );

        $formFeilds['brand_type'] = (request('brand_type')) ? implode(',',request('brand_type')) : null;
        $formFeilds['status'] = '1';
        $formFeilds['role'] = '3';
        // to hash password
        //$request['password'] = bcrypt($request['password']);
        $formFeilds = collect($formFeilds);
        $user = User::create($formFeilds->only('name','password','email','role','status')->toArray());
        $user->profile()->create($formFeilds->only('fullname','state','country','address','phone','brand_type')->toArray());
        // $user->subscribe(1);
        auth()->login($user);
        return redirect('/rest');
    } // END Function (Register New)

    public function logout(){
        auth()->logout();
        return back();
    } // END Function (Logout)

    public function changePassword()
    {
        return view('dashboard.rest.pages.profile.changePassword');
    } // END Function (Change Password View)

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8', // Add any other password validation rules as needed
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Old Password is incorrect.');
        }

        $this->updateUserPassword($request->new_password);

        return redirect()->route('change-password')->with('success', 'Password changed successfully!');
    }

    protected function updateUserPassword($newPassword)
    {
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($newPassword)
        ]);
    } // END Function (Change Password Function)
}
