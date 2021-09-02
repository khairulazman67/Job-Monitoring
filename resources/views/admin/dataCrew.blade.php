@extends('admin/main_admin')
@section('head')

@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Crew Telkom Akses</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <a href="{{url('forminsert')}}">
                            <button class="btn btn-primary">Tambah Data</button>
                        </a>
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('error')}}
                                </div>
                            @endif
                        <div class="row">
                            
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-keytable" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Sektor</th>
                                                {{-- <th>DATEK</th>
                                                <th>Status</th> --}}
                                                <th style="width: 40%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $i=>$dat)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{$dat->nama}}</td>
                                                    <td>{{$dat->sectors->nama}}</td>
                                                    <td class="aksi">
                                                        <button type="submit" id="select" class="btn btn-primary d-inline">Lihat Labor</button>
                                                        <form class="d-inline" action="{{url('formupdatecrew/'.$dat->id)}}" method="post">
                                                            @csrf
                                                            <Button type="submit" class="btn btn-warning ">Edit</Button>
                                                        </form>
                                                        <form class="d-inline" action="{{url('datacrew/'.$dat->id)}}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <Button type="submit" class="btn btn-danger ">Hapus</Button>
                                                        </form>
                                                    </td>
                                                </tr>    
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <style>
        .aksi {
            text-align: center;
        }

    </style>
    <script src="{{asset('assets/vendors/jquery/dist/jquery.min.js')}} "></script>
    
