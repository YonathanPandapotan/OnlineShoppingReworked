<?php

namespace App\Http\Controllers;
use App\UserModel;
use App\BarangModel;
use App\KeranjangModel;
use App\AlamatModel;
use App\TransaksiModel;
use App\StockModel;
use App\DetailTransaksiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        //
        // $this->middleware('auth');
        //exclude login page
        $this->middleware('auth', ['except' => ['login', 'daftarBaru']]);
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
            ]);
        $user = UserModel::where('email', $request->input('email'))->first();
        if($user == null){
            return response('user not found');
        }

        if($request->input('password') == $user->password){
            $auth_token = base64_encode(str_random(40));
            UserModel::where('email', $request->input('email'))->update(['auth_token' => $auth_token]);;
            $cookie = Cookie::forever('auth_token', $auth_token);
            return redirect('listBarang')->withCookie($cookie);
        }else{
            return response()->json(['status' => 'fail'],401);
        }
  

    }

    public function listBarang(){
        $dataBarang = BarangModel::all();
        $dataStock = StockModel::join('Kantor', 'Stock.idKantor', '=', 'Kantor.idKantor')->get();
        return view('ListBarang', ['barang'=>$dataBarang, 'stock'=>$dataStock]);
    }

    public function tambahKeranjang(Request $request){
        if($request->input('submit') == 'Tambah Keranjang'){
            $input = new KeranjangModel();
            $input->idBarang = $request->input('idBarang');
            $input->idUser = $request->user('api')['idUser'];
            $input->jumlah = $request->input('jumlahBarang');
            $input->save();
            return redirect('/listBarang');
        }
        else{
            return response('meh');
        }
    }

    public function lihatKeranjang(Request $request){
        $data = KeranjangModel::join('Barang', 'Keranjang.idBarang', '=', 'Barang.idBarang')->where(['idUser'=> $request->user('api')['idUser']])->get();
        return view('KeranjangUser', ['barang' => $data]);
        // return response($data);
    }

    public function prosesTransaksi(Request $request){
        if($request->input('submit') == 'Tambah Alamat'){
            $baru = new AlamatModel();
            $baru->idAlamat = base64_encode(str_random(10));
            $baru->idUser = $request->user('api')['idUser'];
            $baru->alamat = $request->input('alamat');
            $baru->save();
            return redirect('/prosesTransaksi');
        }
        else if($request->input('submit') == 'Beli Barang'){
            // buat transaksi baru
            $baru = new TransaksiModel();
            $baru->idTransaksi = base64_encode(str_random(10));
            $baru->idUser = $request->user('api')['idUser'];
            $baru->hargaTotal = $request->input('hargaTotal');
            $baru->jumlahTotal = 2;
            $baru->idAlamat = $request->input('valueAlamat');
            $baru->statusPembayaran = 0;
            $baru->save();

            //pindahkan seluruh barang yang ada di keranjang ke detail transaksi
            $keranjang = KeranjangModel::join('Barang', 'Keranjang.idBarang', '=', 'Barang.idBarang')->where(['idUser'=> $request->user('api')['idUser']])->get();
            foreach($keranjang as $data){
                $anotherBaru = new DetailTransaksiModel();
                $anotherBaru->idTransaksi = $baru->idTransaksi;
                $stockBarang = StockModel::where('idBarang', $data['idBarang'])->where('idKantor', $request->input('valueKantor'))->value('idStockBarang');
                $anotherBaru->idStockBarang = $stockBarang;
                $anotherBaru->jumah = $data['jumlah'];
                $anotherBaru->save();                
            }
            
            //hapus keranjang user
            $data = KeranjangModel::where('idUser', $request->user('api')['idUser']);
            $data->delete();
            return redirect('/keranjangAnda');

        }

    }

    public function persiapkanTransaksi(Request $request){
        $dataKeranjang = KeranjangModel::join('Barang', 'Keranjang.idBarang', '=', 'Barang.idBarang')->where(['idUser'=> $request->user('api')['idUser']])->get();
        $dataAlamat = AlamatModel::where('idUser', $request->user('api')['idUser'])->get();
        $hargaTotal = null;
        foreach($dataKeranjang as $barang){
            $hargaTotal = $barang->harga + $hargaTotal;

        }
        
        return view('PageTransaksi', ['barang' => $dataKeranjang, 'alamat' =>$dataAlamat]);
    }

    public function daftarBaru(Request $request){
        if($request->method() == 'GET')
            return view('daftarBaru');
        else{
            $user = new UserModel();
            $user->idUser = base64_encode(str_random(10));
            $user->namaUser = $request->input('username');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $auth_token = base64_encode(str_random(40));
            $user->auth_token = $auth_token;
            $user->save();
            $cookie = Cookie::forever('auth_token', $auth_token);
            return redirect('/listBarang')->withCookie($cookie);
        }
    }

    public function hapusKeranjang(Request $request){
        $hapus = KeranjangModel::where('idBarang', $request->input('idBarang'))->where('idUser', $request->user('api')['idUser'])->delete();
        return redirect('keranjangAnda');
    }

    public function listTransaksi(){
        return view('ListTransaksi');
    }

    public function logOut(Request $request){
        $user = new UserModel();
        $user = $request->user('api');
        $user->auth_token = '';
        $user->save();
        return redirect('login');

    }

    public function test(){
        return response('yep');
    }

    //
}
