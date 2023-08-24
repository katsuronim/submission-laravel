@extends('layouts.appWriter')

@section('content')
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <table>
        <tr>
            <td>
                <div id="carouselExampleIndicators" class="carousel slide bg-dark" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" style="width:500px;height:350px">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="https://www.stockvault.net/data/2019/08/31/269064/preview16.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Headline 1</h5>
                            <p>Kalimat Headline 1</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="https://www.stockvault.net/data/2019/08/31/269064/preview16.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Headline 2</h5>
                            <p>Kalimat Headline 2</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="https://www.stockvault.net/data/2019/08/31/269064/preview16.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Headline 3</h5>
                            <p>Kalimat Headline 3</p>
                        </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </td>
            <td>
                <div id="titleText" style="margin-left:100px; margin-bottom:100px">
                    <h1 class="display-2">Project Laravel</h1>
                    <h1 class="display-4">Andreas Noah J. S.</h1>
                    </br>
                    <p>Pilihan website terbaik dengan artikel-artikel menarik dan informatif</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="align-items-center">
    <h1 class="display-4" style="margin-left:40px;margin-top:50px">
        Artikel
        <div class="float-right" style="margin-right:60px">
            <a class="btn btn-success" href="{{ route('artikel.create') }}"> Create Article</a>
        </div>
    </h1>
</div>
    <table class="table table-bordered table-dark col-11" style="margin:40px">
        <tbody>
            @forelse ($artikel as $item)
            <tr>
                <td><img src="/gambar_artikel/{{ $item->gambar_artikel }}" width="300px"></td>
                <td class="text-center">{{ $item->judul_artikel }}</td>
                <td class="text-center">{{ $item->kategori->nama_kategori }}</td>
                <td class="text-center">
                    <form action="{{ route('artikel.destroy',$item->id) }}" method="POST">
                        <a class="btn btn-outline-info" href="{{ route('artikel.show',$item->id) }}">Show</a>
                        <a class="btn btn-outline-primary" href="{{ route('artikel.edit',$item->id) }}">Edit</a>
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
                Data Artikel belum tersedia
                </div>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center" style="text-indent:10px;margin-bottom:30px">
        {!! $artikel->links() !!}
    </div>
@endsection
