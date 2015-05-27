<?php namespace App\Http\Controllers;

use Request;
use DB;
use App\User;
use App\Blog;
use input;
use Hash;

class BlogController extends Controller{
    public function getIndex(){
        
        $blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
        
        return view('index')->with('blogs', $blogs);
    }
    
    public function getSignup($error_message = '') {
        $username = "";
        $password = "";
        $verifyPw = "";
        $email = "";
        return view('signup')->with('error_message', $error_message)->with('username', $username)->with('password', $password)->with('verifyPw', $verifyPw)->with('email', $email);
    }
    
    public function getLogin($error_message = '') {
        return view('login')->with('error_message', $error_message);
    }
    
    public function getNewpost() {
        return view('newpost');
    }
    
    public function postSignup($error_message = '') {
        $username = Request::input('username');
        $password = Request::input('password');
        $verifyPw = Request::input('verifyPw');
        
        $users = DB::table('users')->get();
        $areErrors = false;
        if($username == "" || $password == "" || $email == "") {
	    $error_message = "Empty field";
	    $errors = true;
	}
        elseif(in_array($username, $users)) {
	    $error_message = "Username taken";
            $errors = true;
	}
	elseif($password != $verifyPw) {
	    $error_message = "Passwords don't match";
	    $errors = true;
	}
        
	if($areErrors = false) {
	    $blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
            Session::set('username',$username);
	    $passhash = Hash::make($password);
            
	    $user = new User;
	    $user->username = $username;
	    $user->password = $passhash;
	    $user->email = $email;                        
	    $user->push();
	    
	    return view('index')->with('blogs',$blogs);
	    }
	    else{
		return view('signup')->with('error_message',$error_message)->with('email',$email)->with('username',$username)->with('password',$password)->with('verifyPw',$verifyPw);;
	    }        
    }
	public function postLogIn($error_message = '') {
		$username = Request::input('username');
		$password = Request::input('password');
                
		if($username == "" || $password == "") {
			$error_message = "Empty field";
			return view('login')->with('error_message',$error_message);
		}
		else {
			$allUsers = DB::table('users')->where('username',$username)->get();
			if(!$allUsers){
				$error_message = "Invalid Username/Password";
				return view('login')->with('error_message',$error_message);
			}
			else {
				$user = $allUsers[0];
				$dbpassword = $user->password;
				if(Hash::check($password, $dbpassword) == false) {
					$error_message = "Invalid Username/Password";
					return view('login')->with('error_message',$error_message);
				}
				else {
					Session::set('username',$username);
					$blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
					return view('index')->with('blogs',$blogs);
				}
			}
		}
	}
	public function postNewpost($error_message = '') {
		$flavor = Request::input('flavor');
		$size = Request::input('size');
		$comments = Request::input('comments');
		if($flavor = "" || $comments = "" || $size = "") {
			$error_message = "Empty field";
			return view('newpost')->with('error_message',$error_message)->with('subject',$subject)->with('content',$content);
		}
		else {
			$blog = new Blog;
			$blog->flavor = $flavor;
			$blog->size = $size;
			$blog->comments = $comments;
			$blog->push();
			$blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
			return redirect('/');
		}
	}
	public function logout() {
		if(Session::get('username')) {
			Session::forget('username');
		}
		$blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
		return redirect('/');
	}        
}
