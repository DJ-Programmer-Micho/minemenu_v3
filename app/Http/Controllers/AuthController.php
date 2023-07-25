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
        // return redirect('/send-sms');
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
/*
    public function send_code_view(){
        return view('auth.sms.send_code');
    }
    public function send_code(){
        if(session('sms-sent') && session('sms-sent') > now()){
            return back()->with('denied','try again after 1 minute');
        }else{
            session()->put('sms-sent',now()->addMinutes(2));
            self::sendSms();
            return redirect('verify-sms');
        }
    }
    public function verify_code_view(){
        return view('auth.sms.verify_code');
    }
    public static function sendSms(){
        $URL = "https://verification.api.sinch.com/verification/v1/verifications";
        $METHOD = "POST";
        //The key from one of your Verification Apps, found here https://dashboard.sinch.com/verification/apps

        $applicationKey  = "d00712bb-fc2a-4cff-9ef5-9277ab96411a";

        
        //The secret from the Verification App that uses the key above, found here https://dashboard.sinch.com/verification/apps
        
        $applicationSecret = "YXZ5OjHGWUC0fvgUvF5mlA==";

        
        //The number that will receive the SMS PIN. Test accounts are limited to verified numbers.
        //The number must be in E.164 Format, e.g. Netherlands 0639111222 -> +31639111222
        
        $toNumber = auth()->user()->profile->phone;

        $smsVerificationPayload = [
            "identity" => [
                "type" => "number",
                "endpoint" => $toNumber
            ],
            "method" => "sms"
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Authorization: Basic " . base64_encode($applicationKey . ":" . $applicationSecret)
            ],
            CURLOPT_POSTFIELDS => json_encode($smsVerificationPayload),
            CURLOPT_URL => $URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $METHOD,
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($error) {
            // echo "cURL Error #:" . $error . "\n";
        } else {
            // echo $response . "\n";
            // echo $statusCode . "\n";
        }
    }

    public static function verify(){

         $METHOD = "PUT";

        
        //The key from one of your Verification Apps, found here https://dashboard.sinch.com/verification/apps
        
        $applicationKey  = "d00712bb-fc2a-4cff-9ef5-9277ab96411a";

        
        //The secret from the Verification App that uses the key above, found here https://dashboard.sinch.com/verification/apps
        
        $applicationSecret = "YXZ5OjHGWUC0fvgUvF5mlA==";

        
        //The number that will receive the SMS PIN. Test accounts are limited to verified numbers.
        //The number must be in E.164 Format, e.g. Netherlands 0639111222 -> +31639111222
        
        $toNumber = auth()->user()->profile->phone;

        
        //The code which was sent to the number.
        
        $code = request('code');

        $url = "https://verification.api.sinch.com/verification/v1/verifications/number/" . $toNumber;

        $smsVerificationPayload = [
            "method" => "sms",
            "sms" => [
                "code" => $code
            ]
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Authorization: Basic " . base64_encode($applicationKey . ":" . $applicationSecret)
            ],
            CURLOPT_POSTFIELDS => json_encode($smsVerificationPayload),
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $METHOD,
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($error) {
            echo "cURL Error #:" . $error . "\n";
        } else {
            // echo $response . "\n";
            // echo $statusCode . "\n";
            switch ($statusCode) {
                case '200':
                   User::find(auth()->user()->id)->update(['verified_at'=>now()]);
                   return redirect('/admin');
                    break;
                
                default:
                    echo  $response;
                    break;
            }
        }

    }
    */
}