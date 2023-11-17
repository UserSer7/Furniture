@extends('layouts.global')
@section('title')
    Tambah Data Barang
@endsection

@section('content')
<div class="h-screen bg-[#8194EB] w-screen flex justify-center">
    <div class="w-[450px] h-[596px] bg-sky-100 rounded-[30px] mx-2 my-6 flex items-center justify-center">
        <form action="{{route('admin.update', $barangs->id)}}" method="post" enctype="multipart/form-data" class="w-full flex flex-col items-start">
            @csrf
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-2 rounded-md">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <p class="text-black text-[25px] font-bold font-['Kantumruy'] mx-auto">Tambah Data Barang</p>
            <p class="text-left mb-1 mx-8">Nama Barang</p>
            <div>
                <input type="username" name="nama" placeholder="Username" value="{{$barangs->nama}}" class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
            </div>
            <p class="text-left mb-1 mx-8">Deskripsi</p>
            <div>
                <input type="text" name="deskripsi" placeholder="Deskripsi" value="{{$barangs->deskripsi}}" class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
            </div>
            <p class="text-left mb-1 mx-8">Harga</p>
            <div>
                <input type="number" name="harga" placeholder="Harga" value="{{$barangs->harga}}" class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
            </div>
            <p class="text-left mb-1 mx-8">Jumlah</p>
            <div>
                <input type="number" name="jumlah" placeholder="Jumlah" value="{{$barangs->jumlah}}" class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
            </div>
            <p class="text-left mb-1 mx-8">Jenis Product</p>
            <div>
                <select type="text" name="product_id" placeholder="Password" class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
                    <option value="" disabled selected>Jenis Product...</option>
                    @foreach ($products as $product1)
                        <option value="{{ $product1->id }}" {{ $barangs->product_id == $product1->id ? 'selected' : '' }}>{{ $product1->jenis }}</option>
                    @endforeach
                </select>
            </div>
            <p class="text-left mb-1 mx-8">File</p>
                <div>
                    <input type="file" name="file" placeholder="File" class="ml-8 pb-2" value="{{$barangs->file}}">
                </div>
                <button type="submit" class="w-[231px] h-[46px] bg-indigo-400 rounded-[11px] shadow border border-black flex items-center justify-center mx-auto">
                    <p class="text-black text-xl font-bold font-['Kantumruy']">UPDATE DATA</p>
                </button>
        </form>
    </div>
</div>
@endsection
