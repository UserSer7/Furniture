<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\product;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    public function push(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required|string|max:40',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'required|string|max:120',
            'file' => 'required',
            'file.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:4000'
        ]);
        if ($request->hasFile('file')) {
            // dd($request->all());
            $file = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('file')->getClientOriginalName());
            $request->file('file')->move(public_path('images/barang'), $file);
            Barang::create(
                [

                    'nama' => $request->nama,
                    'harga' => $request->harga,
                    'jumlah' => $request->jumlah,
                    'deskripsi' => $request->deskripsi,
                    'file' => $file,
                ]
            );
            return redirect()->route('admin.barang')->with('success', 'Data
            Barang Berhasil Ditambahkan');
        } else {
            // return ($request);
            echo 'Gagal';
            return response()->json(['errors' => 'Gagal'], 422);
        }
        // return redirect()->route('admin.barang')->with('success', 'Data
        //     Barang Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        return view('admin.crud.editData', [
            'barangs' => barang::all()->where('id', $id)->first(),
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:40',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'required|string|max:120',
            'file' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        ]);
        // dd($request->all());
        $barang = barang::findOrFail($id);

        if ($request->hasFile('file')) {
            $file = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('file')->getClientOriginalName());
            $request->file('file')->move(public_path('images/barang'), $file);

            $barang->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah,
                'deskripsi' => $request->deskripsi,
                'file' => $file,
            ]);
        } else {
            echo 'Gagal';
            return response()->json(['errors' => 'Gagal'], 422);
        }
        return redirect()->route('admin.barang')->with('success', 'Data Barang
            Berhasil Diubah');
    }
    public function delete($id)
    {
        $barangs = barang::findOrFail($id);
        $file = public_path('images/barang/') . $barangs->file;
        $file = str_replace('\\', '/', $file);

        if (file_exists($file)) {
            unlink($file);
        } else {
            dd($file);
        }
        $barangs->delete();
        return redirect()->route('admin.barang')->with('success', 'Data Barang
        Berhasil Dihapus');
    }
    public function download_excel()
    {

        $arsip = barang::get();

        //Lampiran Excel
        $content_kepala = "<table width='1000' border='1'>
      <tr>
        <td colspan='7'><div align='center'><strong><h2>Daftar List Barang</h2></strong></div></td>
      </tr>
      </table>";

        $content_header = "<table border='1'>
        <tr>
        <th>No</th>
        <th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th colspan='2'>Nama File</th>
        </tr>";
        $content_dalam = "";
        $i = 1;
        foreach ($arsip as $data_arsip) {

            $data = "<tr>
            <td align='center'>" . $i++ . "</td>
            <td align='left'>" . $data_arsip->id . "</td>
            <td align='left'>" . $data_arsip->nama . "</td>
            <td align='left'>" . $data_arsip->harga . "</td>
            <td align='left'>" . $data_arsip->jumlah . "</td>
            <td colspan='2'>" . $data_arsip->file . "</td>
            </tr>";
            $content_dalam = $content_dalam . "\n" . $data;
        }
        $content_footer = "</table>";

        $content_sheet = "" . $content_kepala . "\n" . $content_header . "\n" . $content_dalam . "\n" . $content_footer . "";

        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Daftar Barrang.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        print $content_sheet;
    }
}
