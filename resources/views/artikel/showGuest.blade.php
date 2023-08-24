@extends('layouts.app')

@section('content')
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
<table class="col-10" style="margin:20px">
        <tr>
            <td>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="align-right">
                            <a class="btn btn-primary" href="{{ route('artikel.dashboard') }}"> ← Back</a>
                        </div>
                        <div class="pull-left">
                            <h1 class="display-2">{{ $artikel->judul_artikel }}</h1>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Kategori:</strong>
                            {{ $artikel->kategori->nama_kategori }}
                            <strong>| Tags:</strong>
                            @foreach($tags as $tag)
                                <span class="badge badge-info">{{$tag->nama_tags }}</span>
                            @endforeach
                            <strong>| Penulis:</strong>
                            {{ $artikel->user->name }}
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <img src="/gambar_artikel/{{ $artikel->gambar_artikel }}" width="700px">
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group text-justify">
                            {{ $artikel->teks_artikel }}
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
@endsection
