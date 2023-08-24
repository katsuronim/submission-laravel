@extends('layouts.appWriter')

@section('content')
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <table class="col-10" style="margin:20px">
        <tr>
            <td>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="align-right">
                            <a class="btn btn-primary" href="{{ route('kategori.index') }}"> ← Back</a>
                        </div>
                        <div class="pull-left">
                            <h1 class="display-2">Edit Category</h1>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group" >
                            <strong><label>Nama Kategori:</label></strong>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ $kategori->nama_kategori }}" name="nama_kategori">
                            @error('nama_kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </div>
                </form>
            </td>
        </tr>
    </table>
</div>
@endsection
