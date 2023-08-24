@extends('layouts.appWriter')

@section('content')
<div class="card" style="margin:30px">
    <div class="card-header">
        <table class="col-12">
            <tr>
                <td>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="align-right" style="margin-top:20px">
                                <a class="btn btn-primary" href="{{ route('tags.index') }}"> ← Back</a>
                            </div>
                            <div class="pull-left" style="margin-bottom:40px">
                                <h1 class="display-2">Create Tags</h1>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group" >
                                <strong><label>Nama Tags:</label></strong>
                                <input type="text" class="form-control @error('') is-invalid @enderror" name="nama_tags" placeholder="Masukkan Tags">
                                @error('nama_tags')
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
</div>
@endsection
