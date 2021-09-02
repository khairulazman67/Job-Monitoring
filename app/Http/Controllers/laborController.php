<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class laborController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = Order::where('status','kendala')->orwhere('status','reschedule')->get();
        // dd($data);
        return view('labor.home',['data'=>$data]);
    }
    public function updatestatus(Request $request){
        // dd($request);
        $request->validate([
            'status'=> 'required'
        ]);
        if($request->status==="Close"){
            $update=Order::where('id',$request->id)->update([
                'status'=>$request->status
            ]);
            if($update){
                return redirect('/daslabor')->with('success', 'Status berhasil diupdate');
            }else{
                return redirect('/daslabor')->with('error', 'Terjadi kesalahan saat update status');
            }
        }else{
            $update=Order::where('id',$request->id)->update([
                'status'=>$request->status,
                'close_date'=> date('Y-m-d')
            ]);
            if($update){
                return redirect('/daslabor')->with('success', 'Status berhasil diupdate');
            }else{
                return redirect('/daslabor')->with('error', 'Terjadi kesalahan saat update status');
            }
        }
    }
    public function gantiPass(Request $request){
        $user= User::where('NIK',Auth::user()->NIK)->first();
        $lama = Hash::make($request->oldpass);
        if (Hash::check($request->oldpass, $user->password)) {
            $edit= user::where('NIK',Auth::user()->NIK)->update([
                'password' => Hash::make($request->newpass)
            ]);
            if ($edit){
                return redirect('/formgantipasslabor')->with('success', 'Password berhasil diperbaharui');
            }else{
                return redirect('/formgantipasslabor')->with('error', 'Terjadi kesalahan saat memperbaharui password');
            }
        }else{
            return redirect('/formgantipasslabor')->with('error', 'Terjadi kesalahan saat memperbaharui password');
        }
    }
}
