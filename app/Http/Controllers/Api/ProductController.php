<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
/** 
 * Ambil semua produk
 * 
 * Endpoint ini mengembalikan seluruh data produk yang tersedia.
*/
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'status' => true,
            'data' => $products
        ]);
    }
/** 
 * Tampilkan Detail Produk
 * 
 * Menampilkan detail lengkap dari satu produk berdasarkan ID yang diberikan. Jika produk dengan ID tersebut tidak ditemukan, API akan mengembalikan pesan error 404.
*/
    public function show($id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product tidak ditemukan',
            ], 404);
        }
        
        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }
/** 
 * Tambah Produk Baru
 * 
 * Menambahkan produk baru ke dalam database. Endpoint ini memerlukan data dalam format JSON yang dikirim melalui body request. Field nama, deskripsi, dan harga bersifat wajib (required), sedangkan foto bersifat opsional (nullable). Jika validasi gagal, API akan mengembalikan pesan error beserta field yang bermasalah.
*/
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);

        $product = Product::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Produk berhasil ditambahkan',
            'data' => $product
        ]);
    }
/** 
 * Update Data Produk
 * 
 * Memperbarui data produk yang sudah ada di database. Pengguna harus menyertakan ID produk pada URL. Semua field bersifat opsional (sometimes), artinya pengguna hanya perlu mengirim field yang ingin diubah. Jika produk tidak ditemukan, API mengembalikan error 404.
*/
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);

        $product->update($request->all());
        
        return response()->json([
            'status' => true,
            'message' => 'Produk berhasil diupdate',
            'data' => $product
        ]);
    }
/** 
 * Hapus Produk
 * 
 * Menghapus produk dari database berdasarkan ID yang diberikan. Setelah dihapus, data tidak dapat dikembalikan (permanen). Jika produk dengan ID tersebut tidak ditemukan, API mengembalikan error 404. Jika berhasil dihapus, API mengembalikan status 204 (No Content) tanpa body response.
*/
    public function destroy($id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        $product->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Produk berhasil dihapus'
        ]);
    }
}