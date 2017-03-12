<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordReset;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Snowfire\Beautymail\Beautymail;
use Snowfire;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public $email;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function showLinkRequestForm(Request $request) {
        $email = $request->input('email');
        $token = $request->input('token');
        $password = $request->input('password');
        $date = (new \DateTime())->format('Y-m-d H:i:s');
        $message = [ 'error' => true ];
        $pw_reset = DB::table('password_resets')->where('email', $email)->first();
        if($pw_reset->created_at > $date){
            if($pw_reset->token == $token) {
                DB::table('usuarios')->where('email', $email)->update(['password' => bcrypt($password)]);
                $message["error"] = false;
            } else {
                $message["error"] = true;
            }
        }else{
            $message["error"] = 'token_expired';
        }
        $message = json_encode($message, true);
        return json_decode($message, JSON_PRETTY_PRINT);
    }

    /**
     * @param Request $request
     * @return mixed
     * @method POST
     */
    public function sendResetLinkEmail(Request $request) {
        $this->email = $request->input('email');
        $msj = [ 'token' => null ];
        $token = str_random(255);
        $pw_exists = DB::table('password_resets')->where('email', '=', $this->email)->exists();
        if(!$pw_exists){
            DB::table('password_resets')->insert(['email' => $this->email, 'token' => $token, 'created_at' => date('Y-m-d H:i:s', strtotime("+20 minutes"))]);
        } else {
            DB::table('password_resets')->where('email', $this->email)->update(['token' => $token, 'created_at' => date('Y-m-d H:i:s', strtotime("+20 minutes"))]);
        }

        $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
        $logo = [
            'path'      => "http://www.caribbeanconnection.mx/img/logo.png",
            'width'     => '180',
            'height'    => '140'
        ];
        //dd($this->email);
        //dd(DB::table('users')->where('email','=', $this->email)->exists());
        $userData = User::all()->where('email', $this->email)->first();
        if($userData->count() >= 1) {
            $beautymail->send('emails.password-reset', ['token' => $token, 'color' => '#26344B', 'logo' => $logo, 'name' => $userData->uname, 'lastname' => $userData->lastname, 'email' => $userData->email], function($message)
            {
                $message
                    ->from('support@caribbeanconnection.mx', 'Caribbean Connection')
                    ->to($this->email, 'Horacio Espinosa')
                    ->subject('Recuperación de contraseña');
            });
            $msj["token"] = $token;
        }else{
            $msj["token"] = null;
        }

        $msj = json_encode($msj, true);
        return json_decode($msj, JSON_PRETTY_PRINT);
    }
}
