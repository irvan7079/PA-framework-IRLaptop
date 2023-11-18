<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Laptop;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LaptopController extends Controller
{
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'merk_laptop' => 'required|string',
            'spesifikasi_laptop' => 'required|string',
            'stok_laptop' => 'required|integer',
            'harga_laptop' => 'required|integer',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $lastlaptop = (int) Laptop::max('id');
        $newlaptopId = $lastlaptop + 1;

        if ($request->File('image_path')) {
            // dd($request->file('image_path'));
            $image = $request->file('image_path');
            $imageName = $newlaptopId . '.' . $image->getClientOriginalExtension();
            $tujuan_upload = public_path('assets/images/laptop');
            $image->move($tujuan_upload, $imageName);

            $validatedData['image_path'] = "assets/images/laptop/".$imageName;
        }

        laptop::create($validatedData);

        return redirect()->route('admin.laptop')->with('success', 'Laptop berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('admin.editlaptop', [
            'laptops' => laptop::all()->where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merk_laptop' => 'required|string',
            'spesifikasi_laptop' => 'required|string',
            'stok_laptop' => 'required|integer',
            'harga_laptop' => 'required|integer',
        ]);
        $pd = laptop::findOrFail($id);
        $pd->update([
            'merk_laptop' => $request->merk_laptop,
            'spesifikasi_laptop' => $request->spesifikasi_laptop,
            'stok_laptop' => $request->stok_laptop,
            'harga_laptop' => $request->harga_laptop,
        ]);
        return redirect()->route('admin.laptop')->with('success', 'Laptop berhasil diupdate.');
    }


    public function delete($id)
    {
        $laptop = laptop::findOrFail($id);

        $imagePath = $laptop->image_path;

        if (!empty($imagePath)) {
            $imagePath = public_path('assets/images/laptop/') . $imagePath;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $laptop->delete();

        return redirect()->route('admin.laptop')->with('success', 'Laptop berhasil dihapus.');
    }

    public function deleteakun($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.akun')->with('success', 'Akun berhasil dihapus.');
    }

    public function searchlaptop(Request $request){
        if ($request->has('searchlaptop')) {
            $laptop = laptop::where('merk_laptop', 'LIKE', "%".$request->searchlaptop."%")->get();
        } else {
            $laptop = laptop::all();
        }
        return view("admin.laptop", ['laptop'=> $laptop]);
    }

    public function filterwelcome(Request $request){
        $filter = $request->input('filter');
        if ($filter === '<10jt') {
            $laptop = Laptop::where('harga_laptop', '<', 10000000)->get();
        } else if ($filter === '10jt-20jt') {
            $laptop = Laptop::whereBetween('harga_laptop', [10000000, 20000000])->get();
        } else if ($filter === '>20jt') {
            $laptop = Laptop::where('harga_laptop', '>', 20000000)->get();
        } else {
            $laptop = laptop::all();
        }
        return view("welcome", ['laptop'=> $laptop, 'comment'=> Comment::all()]);
    }

    public function filteruser(Request $request){
        $filter = $request->input('filter');
        if ($filter === '<10jt') {
            $laptop = Laptop::where('harga_laptop', '<', 10000000)->get();
        } else if ($filter === '10jt-20jt') {
            $laptop = Laptop::whereBetween('harga_laptop', [10000000, 20000000])->get();
        } else if ($filter === '>20jt') {
            $laptop = Laptop::where('harga_laptop', '>', 20000000)->get();
        } else {
            $laptop = laptop::all();
        }
        return view("user.usermenu", ['laptop'=> $laptop, 'comment'=> Comment::all()]);
    }

    public function searchakun(Request $request){
        if ($request->has('searchakun')) {
            $user = user::where('username', 'LIKE', "%".$request->searchakun."%")->get();
        } else {
            $user = user::all();
        }
        return view("admin.akun", ['user'=> $user]);
    }

    public function searchriwayat(Request $request){
        if ($request->has('searchriwayat')) {
            $user = user::where('username', 'LIKE', "%".$request->searchriwayat."%")->get();
        } else {
            $user = user::all();
        }
        return view("admin.riwayat", ['user'=> $user]);
    }

    public function pembelian($id)
    {
        return view('user.pembelian', [
            'laptops' => laptop::all()->where('id', $id)->first(),
        ]);
    }

    public function konfirmasi(Request $request, $id)
    {
        $validatedData = $request->validate([
            'merk_laptop_t' => 'required|string',
            'spesifikasi_laptop_t' => 'required|string',
            'harga_laptop' => 'required|integer',
            'jumlah_laptop' => 'required|integer',
        ]);

        $total_harga = $request->harga_laptop * $request->jumlah_laptop;

        $validatedData['total_harga'] = $total_harga;

        Transaksi::create($validatedData);

        return view('user.konfirmasi', [
            'transaksis' => transaksi::all()->where('id', $id)->first(),
        ]);
    }

    public function index(){
        $endpoint = env('BASE_ENV').'/api/admin/laptop';
        $data = Http::get($endpoint);
        return view('admin.laptop',[
            'laptop'=>$data
        ]);
    }

    public function givecomment(Request $request)
    {
        $validatedData = $request->validate([
            'username'=> 'required|string',
            'isi_komentar' => 'required|string'
        ]);

        Comment::create($validatedData);

        return redirect()->route('user.usermenu')->with('success', 'Komentar berhasil ditambahkan.');
    }
}
