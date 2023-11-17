@extends('layouts.global')
@section('title')
    Tambah Data Barang
@endsection

@section('content')
    <div class="h-screen bg-[#8194EB] w-screen flex justify-center">
        <div class="w-[450px] h-[636px] bg-sky-100 rounded-[30px] mx-2 my-6 flex items-center justify-center">
            <form action="{{ route('admin.push') }}" method="post" enctype="multipart/form-data"
                class="w-full flex flex-col items-start">
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
                    <input type="username" name="nama" placeholder="Username"
                        class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
                </div>
                <p class="text-left mb-1 mx-8">Deskripsi</p>
                <div>
                    <input type="text" name="deskripsi" placeholder="Deskripsi"
                        class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
                </div>
                <p class="text-left mb-1 mx-8">Harga</p>
                <div>
                    <input type="number" name="harga" placeholder="Harga"
                        class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
                </div>
                <p class="text-left mb-1 mx-8">Jumlah</p>
                <div>
                    <input type="number" name="jumlah" placeholder="Jumlah"
                        class="w-[381px] h-[46px] bg-indigo-50 rounded-[11px] shadow border border-black mx-8 mb-4">
                </div>
                <p class="text-left mb-1 mx-8">File</p>
                <div>
                    <input type="file" name="file" placeholder="Gambar" class="ml-8 pb-2">
                </div>
                <button type="submit"
                    class="w-[231px] h-[46px] bg-indigo-400 rounded-[11px] shadow border border-black flex items-center justify-center mx-auto">
                    <p class="text-black text-xl font-bold font-['Kantumruy']">TAMBAH DATA</p>
                </button>
            </form>
        </div>
    </div>
@endsection
