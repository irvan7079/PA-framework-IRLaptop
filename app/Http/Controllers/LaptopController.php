<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\User;
use Illuminate\Http\Request;

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
        $newlaptopId = $lastlaptop + 1; // ID laptop terakhir + 1

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
}
