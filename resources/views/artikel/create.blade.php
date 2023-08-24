@extends('layouts.appWriter')

@section('content')
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <table class="col-10" style="margin:20px">
        <tr>
            <td>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="align-right">
                            <a class="btn btn-primary" href="{{ route('artikel.index') }}"> ← Back</a>
                        </div>
                        <div class="pull-left">
                            <h1 class="display-2">Create Article</h1>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong><label>Judul:</label></strong>
                            <input type="text" class="form-control @error('judul_artikel') is-invalid @enderror" name="judul_artikel" placeholder="Masukkan Judul Artikel">
                            @error('judul_artikel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong><label>Kategori:</label></strong>
                            <select class="form-control" name="id_kategori" id="id_kategori" >
                                <option disabled selected value> -- select an option -- </option>
                                @foreach ($kategori as $ktg)
                                   <option value="{{ $ktg->id }}">{{ $ktg->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_artikel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong><label>Tags :  (gunakan tanda koma Ex = "Tags 1, Tags 2")<span class="text-danger">*</span></label></strong>
                            <input type="text" data-role="tagsinput" name="tags_artikel" class="form-control tags" placeholder="Masukkan Tags Artikel">
                            @if ($errors->has('tags_artikel'))
                                <span class="text-danger">{{ $errors->first('tags_artikel') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong><label>Isi Artikel:</label></strong>
                            <textarea class="form-control @error('teks_artikel') is-invalid @enderror" style="height:150px" name="teks_artikel" placeholder="Masukkan Isi Artikel"></textarea>
                            @error('teks_artikel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong><label>Image:</label></strong>
                            <input type="file" name="gambar_artikel" class="form-control @error('gambar_artikel') is-invalid @enderror" placeholder="Masukkan Thumbnail Artikel">
                            @error('gambar_artikel')
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
