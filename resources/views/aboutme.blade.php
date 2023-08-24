@extends('layouts/app')

@section('content')
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <table style="border: 1px solid black; width:85%;margin-top:20px">
        <tr>
            <td colspan="3" style="text-align:center">
                <h1 class="display-1" style="margin-bottom:55px">About Me<h1>
            </td>
        </tr>
        <tr>
            <td style="text-align:center">
                <img style="width:350px;height:200px;" src="https://wallpapers.com/images/hd/cool-profile-picture-1ecoo30f26bkr14o.jpg" class="img-thumbnail" alt="profilePicture">
            </td>
            <td style="vertical-align:top">
                <p style="margin:10px 50px">Nama</p>
                <p style="margin:10px 50px">Universitas</p>
                <p style="margin:10px 50px">Program Studi</p>
                <p style="margin:10px 50px">Divisi</p>
                <p style="margin:10px 50px">Daerah Asal</p>
            </td>
            <td style="vertical-align:top">
                <p style="margin-right: 50px;margin-top: 10px">: Andreas Noah Jati Sesoca</p>
                <p style="margin-right: 25px;margin-top: 10px">: Universitas Atma Jaya Yogyakarta</p>
                <p style="margin-right: 50px;margin-top: 10px">: Informatika</p>
                <p style="margin-right: 50px;margin-top: 10px">: Fullstack Web Developer</p>
                <p style="margin-right: 50px;margin-top: 10px">: Jawa Barat/Bogor</p>
            </td>
        </tr>
        <tr>
            <td>
                <h2 class="display-4" style="margin:20px">Description</h2>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p style="margin:10px 20px; text-align:justify">
                    Saya merupakan sebuah mahasiswa jurusan informatika di Universitas Atma Jaya Yogyakarta. Saya sangat gemar dalam melakukan sebuah
                    project coding. Karena dengan setiap error yang saya lalui, merupakan sebuah tantangan yang harus bisa saya selesaikan. Saya saat ini sedang
                    melakukan kegiatan magang di PT. Indi Teknokreasi Internasional di posisi Fullstack Web Developer. Dengan mengikuti kegiatan magang tersebut,
                    harapannya saya bisa mendapatkan pengalaman yang sangat berharga. Kemudian juga bisa membantu saya dalam melatih kemampuan saya di bidang Fullstack.
                </p>
            </td>
        </tr>
    </table>
</div>
@endsection