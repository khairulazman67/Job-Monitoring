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
                            <form action="{{route('cekdasadmin')}}" method="POST">
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
                        <div class="row">
                            
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Tiket</th>
                                                <th>Sektor</th>
                                                <th>Crew</th>
                                                <th>STO</th>
                                                <th>ND</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Tipe Tiket</th>
                                                <th>DATEK</th>
                                                <th>Tanggal Create</th>
                                                <th>Tanggal Close</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $i=>$dat)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$dat->no_Tiket}}</td>
                                                    <td>{{$dat->sectors->nama}}</td>
                                                    <td>{{$dat->crews->nama}}</td>
                                                    <td>{{$dat->sto->nama}}</td>
                                                    <td>{{$dat->ND}}</td>
                                                    <td>{{$dat->nm_pelanggan}}</td>
                                                    <td>{{$dat->types->nama}}</td>
                                                    <td>{{$dat->DATEK}}</td>
                                                    <td>{{$dat->created_at->format('d/m/Y')}}</td>
                                                    <td>{{$dat->close_date}}</td>
                                                    <td>{{$dat->status}}</td>
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
