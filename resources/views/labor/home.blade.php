@extends('labor/main_labor')
@section('head')

@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pekerjaan Harian Telkom Akses</h3>
            </div> 
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h5>Pekerjaan Crew Anda Hari</h5>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered"
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
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $i=>$dat)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{$dat->no_Tiket}}</td>
                                                    <td>{{$dat->sectors->nama}}</td>
                                                    <td>{{$dat->crews->nama}}</td>
                                                    <td>{{$dat->STO->nama}}</td>
                                                    <td>{{$dat->ND}}</td>
                                                    <td>{{$dat->nm_pelanggan}}</td>
                                                    <td>{{$dat->types->nama}}</td>
                                                    <td>{{$dat->DATEK}}</td>
                                                    <td>{{$dat->created_at->format('d/m/Y')}}</td>
                                                    <td>{{$dat->status}}</td>
                                                    <td>
                                                        <button class="btn btn-primary" 
                                                        id="select"
                                                        data-target="#statusModal"
                                                        data-toggle="modal" 
                                                        data-ida="{{$dat->id}}"
                                                        >Update Status</button>
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
<!-- Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Status Pengerjaan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{url('/updatestatus')}}" method="post">
                @csrf
                <label class="control-label col-md-3 col-sm-3 ">ID Order</label>
                    <div class="input-group mb-3">
                        <input type="text" value="id" id="id" name="id" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                <div class="form-group row">
                    <div class="col-md-12 col-sm-12 ">
                        {{-- <input type="hidden" value="ida" id="ida" name="id"> --}}
                        <label class="control-label col-md-3 col-sm-3 ">Status</label>
                        <select name="status" class="select2_single form-control @error('id_crew') is-invalid @enderror" tabindex="-1">
                            {{-- <option value="Kendala">Kendala</option> --}}
                            <option value="Reschedule">Reschedule</option>
                            <option value="Close">Close</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
</div>
@endsection
<script src="{{asset('assets/vendors/jquery/dist/jquery.min.js')}} "></script>
<script type="text/javascript">        
    $(document).ready(function () {
        var ida=null;

        $(document).on('click', '#select', function () {  
            this.ida=$(this).data('ida');
            $('#id').val(this.ida);
        })
    });
</script>