<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateLoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(){
        $data['title'] = 'Register';
        return view('user/register',$data);
    }

    public function register_action(ValidateLoginRequest $request){

        $user = new User([
            'name'=>$request->name,
            'username'=>$request->username,
            'password' =>Hash::make($request->password),
            'rolle'=>'user',
            'email'=>$request->email,
        ]);

        $user->save();
        return redirect()->route('user')->with('success','Enregister avec succes');
    }

    public function login(){
        $data['title'] = 'Login';
        return view('user/login',$data);
    }

    public function login_action(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

      if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
        $request->session()->regenerate();
        return redirect()->intended('/eleve');
      }
        return back()->withErrors('password','userneme ou password incorecte !');
    }

    public function password(){
        $data['title'] = 'Change Password';
        return view('user/password',$data);
    }

    public function password_action(Request $request){
        $request->validate([
            'old_password' => 'required||current_password',
            'new_password' => 'required||confirmed',
        ]);

        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return redirect('/eleve')->with('success','Password changer avec succes');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function listeuser(Request $request)
    {
        $data['title'] = 'Liste des Utilisateurs';
        $data['q'] = $request->get('q');
        $data['users'] = User::where('name','like','%'.$data['q'].'%')
        ->orwhere('username','like','%'.$data['q'].'%')
        ->orwhere('email','like','%'.$data['q'].'%')
        ->paginate(8);
        return view('user.index',$data);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->user_delete_id);
        if($user->user_id != Auth::id()){
            $user->delete();
            return redirect('/user')->with('success','Cette Utilisateur est supprimer avec success!');
        }
        else
       return redirect('/user')->with('success','impossible de supprimre l\'admin de l\'application!');
     
        
    }
    
}
