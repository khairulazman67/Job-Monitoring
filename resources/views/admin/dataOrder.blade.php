@extends('admin/main_admin')
@section('head')

@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Order Telkom Akses</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <form action="{{route('dataorder')}}" method="POST">
                                @csrf
                                <div class="col-md-5 d-inline">
                                    <select name="waktu"class="select2_single form-control @error('tahun') is-invalid @enderror"
                                        tabindex="-1">
                                        <option disabled selected>Filter</option>
                                        <option value="all">Semua</option>
                                        <option value="hari">Hari Ini</option>
                                        <option value="bulan">Bulan Ini</option>
                                        <option value="tahun">Tahun Ini</option>
                                    </select>
                                </div>
                                <div class="col-md-5 d-inline">
                                    <select name="status"class="select2_single form-control @error('tahun') is-invalid @enderror"
                                        tabindex="-1">
                                        <option disabled selected>Filter</option>
                                        <option value="kendala">Kendala</option>
                                        <option value="reschedule">Reschedule</option>
                                        <option value="close">Close</option>
                                    </select>
                                </div>
                                <div class="col-md-2 d-inline">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </div>
                        <a href="{{url('/insertorder')}}">
                            <button class="btn btn-primary my-3">Tambah Data</button>
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
                                                <th>No Tiket</th>
                                                <th>Sektor</th>
                                                <th>Crew</th>
                                                <th>STO</th>
                                                <th>ND</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Tipe Tiket</th>
                                                <th>Status</th>
                                                <th>Tanggal Create</th>
                                                <th>Tanggal Close</th>
                                                {{-- <th>DATEK</th>
                                                <th>Status</th> --}}
                                                <th style="width: 40%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $i=>$dat)
                                                <tr>
                                                    <td>{{$dat->no_Tiket}}</td>
                                                    <td>{{$dat->sectors->nama}}</td>
                                                    <td>{{$dat->crews->nama}}</td>
                                                    <td>{{$dat->STO->nama}}</td>
                                                    <td>{{$dat->ND}}</td>
                                                    <td>{{$dat->nm_pelanggan}}</td>
                                                    <td>{{$dat->types->nama}}</td>
                                                    <td>{{$dat->status}}</td>
                                                    <td>{{$dat->created_at->format('d/m/Y')}}</td>
                                                    <td>{{$dat->close_date}}</td>
                                                    {{-- <td>{{$dat->DATEK}}</td>
                                                    <td>{{$dat->status}}</td> --}}
                                                    <td class="aksi">
                                                        <button type="submit" id="select" class="btn btn-primary d-inline" 
                                                            data-toggle="modal" 
                                                            data-target="#detailModal"
                                                            data-whatever="@mdo" 
                                                            data-notiket="{{$dat->no_Tiket}}"
                                                            data-namasector="{{$dat->sectors->nama}}"
                                                            data-namacrew="{{$dat->crews->nama}}"
                                                            data-sto="{{$dat->STO->nama}}"
                                                            data-nd="{{$dat->ND}}"
                                                            data-namapelanggan="{{$dat->nm_pelanggan}}"
                                                            data-namatype="{{$dat->types->nama}}"
                                                            data-datek="{{$dat->DATEK}}"
                                                            data-status="{{$dat->status}}"
                                                        >Detail</button>
                                                        <form class="d-inline" action="{{url('dataorder/'.$dat->id)}}" method="post">
                                                            @csrf
                                                            <Button type="submit" class="btn btn-warning">Edit</Button>
                                                        </form>
                                                        <form class="d-inline" action="{{url('dataorder/'.$dat->id)}}" method="post">
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
    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Data Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">No Tiket</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" name="noTiket" id="noTiket" value="noTiket" disabled class="form-control" >
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Nama Sektor</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" name="namaSector" id="namaSector" value="namaSector" disabled class="form-control" >
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Nama Crew</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" name="namaCrew" id="namaCrew" value="namaCrew" disabled class="form-control" >
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">STO</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" name="sto" id="sto" value="sto" disabled class="form-control" >
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">ND</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" name="nd" id="nd" value="nd" disabled class="form-control" >
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Nama Pelanggan</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" name="namaPelanggan" id="namaPelanggan" value="namaPelanggan" disabled class="form-control" >
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Nama Type</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" name="namaType" id="namaType" value="namaPelanggan" disabled class="form-control" >
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">DATEK</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" name="datek" id="datek" value="datek" disabled class="form-control" >
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Status</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" name="status" id="status" value="status" disabled class="form-control" >
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
    <script type="text/javascript">        
        $(document).ready(function () {
            var noTiket=null;
            var namaSector=null;
            var namaCrew=null;
            var sto=null;
            var nd=null;
            var namaPelanggan=null;
            var namaType=null;
            var datek=null;
            var status=null;

            $(document).on('click', '#select', function () {  
                this.noTiket=$(this).data('notiket');
                this.namaSector=$(this).data('nosector');
                this.namaCrew=$(this).data('namacrew');
                this.sto=$(this).data('sto');
                this.nd=$(this).data('nd');
                this.namaPelanggan=$(this).data('namapelanggan');
                this.namaType=$(this).data('namatype');
                this.datek=$(this).data('datek');
                this.status=$(this).data('status');

                $('#noTiket').val(this.noTiket);
                $('#namaSector').val(this.namaCrew);
                $('#namaCrew').val(this.sto);
                $('#sto').val(this.sto);
                $('#nd').val(this.nd);
                $('#namaPelanggan').val(this.namaPelanggan);
                $('#namaType').val(this.namaType);
                $('#datek').val(this.datek);
                $('#status').val(this.status);
            })
        });
    </script>
