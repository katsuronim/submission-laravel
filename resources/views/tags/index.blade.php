@extends('layouts.appWriter')

@section('content')
<div class="card" style="margin:30px">
    <div class="card-header">
        <div class="align-items-center">
            <h1 class="display-4" style="margin-left:40px;margin-top:20px;margin-bottom:20px">
                Tags
                <div class="float-right" style="margin-right:60px">
                    <a class="btn btn-success" href="{{ route('tags.create') }}"> Create Tags</a>
                </div>
            </h1>
        </div>
    </div>
    <div class="card-body">

        <table class="table table-bordered table-dark col-11" style="margin:40px">
            <thead>
                <tr>
                    <td class="text-center">No.</td>
                    <td class="text-center">Nama</td>
                    <td class="text-center">Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0 ?>
                @forelse ($tags as $item)
                <?php $i++ ?>
                <tr>
                    <td class="text-center">{{ $i }}</td>
                    <td class="text-center">{{ $item->nama_tags }}</td>
                    <td class="text-center">
                        <form action="{{ route('tags.destroy',$item->id) }}" method="POST">
                            <a class="btn btn-outline-primary" style="margin-right:20px" href="{{ route('tags.edit',$item->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <br>
                    <div class="alert alert-danger" style="width:fit-content; margin-left:20px">
                    Data Tags belum tersedia
                    </div>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center" style="text-indent:10px;margin-bottom:30px">
            {!! $tags->links() !!}
        </div>
    </div>
</div>
@endsection
