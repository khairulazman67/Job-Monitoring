<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Crew;
use App\Models\Labor;
use App\Models\Order;
use App\Models\Sector;
use App\Models\Type;
use App\Models\Sto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = Order::get();
        return view('admin.home',['data'=>$data]);
    }
    public function cekindex(Request $request){
        // dd( date('m'));
        if($request->waktu==='tahun'){
            $data = Order::whereYear('created_at',date('Y'))->where('status',$request->status)->get();
            return view('admin.home',['data'=>$data]);
        }elseif($request->waktu==='bulan'){
            $data = Order::whereMonth('created_at',date('m'))->where('status',$request->status)->get();
            return view('admin.home',['data'=>$data]);
        }elseif($request->waktu==='hari'){
            $data = Order::whereDay('created_at',date('d'))->where('status',$request->status)->get();
            return view('admin.home',['data'=>$data]);
        }else{
            $data = Order::where('status',$request->status)->get();
            return view('admin.home',['data'=>$data]);
        }
    }
    
    //view data order
    public function dataOrder(){
        $data = Order::get();
        return view('admin.dataOrder',['data'=>$data]);
    }
    public function cekSTO($id_sector){
        $data= Sto::where('id_sector',$id_sector)->get();
        return response()->json($data);
        // dd($id_sector);
    }
    public function cekdataorder(Request $request){
        // dd( date('m'));
        if($request->waktu==='tahun'){
            $data = Order::whereYear('created_at',date('Y'))->where('status',$request->status)->get();
            return view('admin.dataOrder',['data'=>$data]);
        }elseif($request->waktu==='bulan'){
            $data = Order::whereMonth('created_at',date('m'))->where('status',$request->status)->get();
            return view('admin.dataOrder',['data'=>$data]);
        }elseif($request->waktu==='hari'){
            $data = Order::whereDay('created_at',date('d'))->where('status',$request->status)->get();
            return view('admin.dataOrder',['data'=>$data]);
        }else{
            $data = Order::where('status',$request->status)->get();
            return view('admin.dataOrder',['data'=>$data]);
        }
    }
    //view insert order
    public function formOrder(){
        $types = Type::orderBy('id')->get();
        $sectors = Sector::orderBy('id')->get();
        $crews = Crew::orderBy('id')->get();
        $sto = Sto::orderBy('nama')->get();
        // dd($sto);   
        return view('admin.formInsertOrder',['types'=>$types,'sectors'=>$sectors,'crews'=>$crews, 'datasto'=>$sto]);
    }
    //process insert order
    public function insertOrder(Request $request){
        // dd($request);
        $request->validate([
            'no_Tiket'=> 'required|numeric',
            'id_sector'=> 'required',
            'id_crew'=> 'required',
            'id_STO'=> 'required',
            'ND'=> 'required|numeric',
            'nm_pelanggan'=> 'required',
            'id_tipeTiket'=> 'required',
            'DATEK'=> 'required',
        ]);
        $insert = Order::create([
            'no_Tiket'=> $request->no_Tiket,
            'id_sector'=> (int)$request->id_sector,
            'id_crew'=> (int)$request->id_crew, 
            'id_STO'=> (int)$request->id_STO,
            'ND'=> $request->ND,
            'nm_pelanggan'=> $request->nm_pelanggan,
            'id_tipeTiket'=> (int)$request->id_tipeTiket,
            'DATEK'=> $request->DATEK,
            'status'=> 'kendala'
        ]);
        if($insert){
            return redirect('/dataorder')->with('success', 'Data berhasil ditambahkan');
        }else{
            return redirect('/dataorder')->with('error', 'Terjadi kesalahan saat penambahan data');
        }
    }
    //edit data order
    public function formUpdateOrder($data){
        $types = Type::orderBy('id')->get();
        $sectors = Sector::orderBy('id')->get();
        $crews = Crew::orderBy('id')->get();
        $data = Order::where('id',$data)->first();
        $sto= STO::get();
        // dd($data);
        return view('admin.formUpdateOrder',['stos'=>$sto,'data'=>$data,'types'=>$types,'sectors'=>$sectors,'crews'=>$crews]);
    }
    public function updateOrder(Request $request){
        // echo $request->id_STO;
        $request->validate([
            'id'=>'required',
            'no_Tiket'=>'required|numeric',
            'id_sector'=>'required',
            'id_crew'=>'required',
            'id_STO'=>'required',
            'ND'=>'required|numeric',
            'nm_pelanggan'=>'required',
            'id_tipeTiket'=>'required',
            'DATEK'=>'required',
            'status'=>'required',
        ]);
        if($request->status==="Close"){
            $edit= Order::where('id',$request->id)
            ->update([
                'no_Tiket'=> $request->no_Tiket,
                'id_sector'=> $request->id_sector,
                'id_crew'=> $request->id_crew,
                'id_STO'=> $request->id_STO,
                'ND'=> $request->ND,
                'nm_pelanggan'=> $request->nm_pelanggan,
                'id_tipeTiket'=> $request->id_tipeTiket,
                'DATEK'=> $request->DATEK,
                'status'=>$request->status,
                'close_date'=> date('Y-m-d')
            ]);
            if($edit){
                return redirect('/dataorder')->with('success', 'Data berhasil diedit');
            }else{
                return redirect('/dataorder')->with('error', 'Terjadi kesalahan saat edit data');
            }
        }else{
            $edit= Order::where('id',$request->id)
            ->update([
                'no_Tiket'=> $request->no_Tiket,
                'id_sector'=> $request->id_sector,
                'id_crew'=> $request->id_crew,
                'id_STO'=> $request->id_STO,
                'ND'=> $request->ND,
                'nm_pelanggan'=> $request->nm_pelanggan,
                'id_tipeTiket'=> $request->id_tipeTiket,
                'DATEK'=> $request->DATEK,
                'status'=>$request->status
            ]);
            if($edit){
                return redirect('/dataorder')->with('success', 'Data berhasil diedit');
            }else{
                return redirect('/dataorder')->with('error', 'Terjadi kesalahan saat edit data');
            }
        }
        
        
    }   
    public function deleteOrder($data){
        $delete = DB::table('orders')->where('id',$data)->delete();
        if($delete){
            return redirect('/dataorder')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect('/dataorder')->with('error', 'Terjadi kesalahan saat menghapus data');
        }
    }

    //crew
    public function dataCrew(){
        $data = Crew::orderBy('id_sector')->get();
        return view('admin.dataCrew',['data'=>$data]);
    }
    //insert crew
    public function formInsertCrew(){
        $sector = Sector::get();
        $crew = Crew::get();
        return view('admin.forminsert',['sectors'=>$sector,'crews'=>$crew]);
    }
    public function prosInsertCrew(Request $request){
        $request->validate([
            'nama' => 'required',
            'id_sector'=> 'required|numeric',
        ]);
        $getnama= Crew::where('nama',$request->nama)->first();
        if($getnama){
            return redirect('/forminsert')->with('error', 'Nama crew sudah digunakan');
        }else{
            $insert = Crew::create([
                'nama'=> $request->nama,
                'id_sector'=> $request->id_sector,
            ]);
            if($insert){
                return redirect('/forminsert')->with('success', 'Data berhasil ditambahkan');
            }else{
                return redirect('/forminsert')->with('error', 'Terjadi kesalahan saat penambahan data');
            }
        }
    }
    public function formUpdateCrew($data){
        $data = Crew::where('id',$data)->first();
        $sector = Sector::get();
        return view('admin.formupdatecrew',['data'=>$data, 'sectors'=>$sector]); 
    }
    public function prosUpdateCrew(Request $request){
        $request->validate([
            'nama' => 'required',
            'id_sector'=> 'required|numeric',
        ]);
        $edit= Crew::where('id',$request->id)
        ->update([
            'nama'=> $request->nama,
            'id_sector'=> $request->id_sector,
        ]);
        if($edit){
            return redirect('/datacrew')->with('success', 'Data berhasil diupdate');
        }else{
            return redirect('/datacrew')->with('error', 'Terjadi kesalahan saat update data');
        }
    }
    public function deleteCrew($data){
        $ceklabor = Labor::where('id_crew',$data)->first();
        if($ceklabor){
            return redirect('/datacrew')->with('error', 'Crew tidak dapat dihapus, terdapat labor yang masih terdaftar!!');
        }else{
            $delete = DB::table('crews')->where('id',$data)->delete();
            if($delete){
                return redirect('/datacrew')->with('success', 'Data berhasil dihapus');
            }else{
                return redirect('/datacrew')->with('error', 'Terjadi kesalahan saat menghapus data');
            }
        }
    }

    //labor
    public function dataLabor(){
        $data=Labor::get();
        return view('admin.dataLabor',['data'=>$data]);
    }
    public function insertLabor(Request $request){
        $request->validate([
            'NIK'=>'required|numeric',
            'id_crew'=>'required',
            'nama'=>'required',
            'email'=>'required|email'
        ]);
        
        $cek=User::where('NIK',$request->NIK)->first();
        $email=User::where('email',$request->email)->first();
        if($cek || $email){
            return redirect('/datalabor')->with('error', 'NIK atau email Sudah digunakan');
        }else{
            try{
                $insert = Labor::create([
                    'NIK'=> $request->NIK,
                    'id_crew' => $request->id_crew,
                    'nama'=> $request->nama
                ]);
                $akun = User::create([
                    'NIK'=> $request->NIK,
                    'email'=> $request->email,
                    'nama'=> $request->nama,
                    'password'=> Hash::make($request->NIK),
                    'level'=> 'labor',
                    'id_crew' => $request->id_crew,
                    'nama'=> $request->nama
                ]);
                if($insert and $akun){
                    return redirect('/datalabor')->with('success', 'Data berhasil diinputkan');
                }else{
                    return redirect('/datalabor')->with('error', 'Terjadi kesalahan saat menghapus data');
                }
            }catch (Exception $e){
                return redirect('/datalabor')->with('error', 'Terjadi kesalahan saat menghapus data');
            };
        }
    }
    public function formupdateLabor($data){
        $dataview = Labor::where('NIK',$data)->first();
        $user = User::where('NIK',$data)->first();
        $crew = Crew::get();
        return view('admin.formUpdateLabor',['data'=>$dataview,'crews'=>$crew,'user'=>$user]);
    }
 
    public function prosUpdateLabor(Request $request){
        $edit= Labor::where('NIK',$request->NIK)
        ->update([
            'id_crew'=> $request->id_crew,
            'nama'=> $request->nama,
        ]);
        $edituser= User::where('NIK',$request->NIK)
        ->update([
            'email'=> $request->email
        ]);
        if($edit and $edituser){
            return redirect('/datalabor')->with('success', 'Data berhasil diupdate');
        }else{
            return redirect('/datalabor')->with('error', 'Terjadi kesalahan saat update data');
        }
    }
    public function deleteLabor($data){
        $delete = DB::table('labors')->where('NIK',$data)->delete();
        $user = DB::table('user')->where('NIK',$data)->delete();
        if($delete && $user){
            return redirect('/datalabor')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect('/datalabor')->with('error', 'Terjadi kesalahan saat menghapus data');
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
                return redirect('/formgantipassadmin')->with('success', 'Password berhasil diperbaharui');
            }else{
                return redirect('/formgantipassadmin')->with('error', 'Terjadi kesalahan saat memperbaharui password');
            }
        }else{
            return redirect('/formgantipassadmin')->with('error', 'Terjadi kesalahan saat memperbaharui password');
        }
    }
}
