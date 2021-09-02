@extends('admin/main_admin')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- labor --}}
        <div class="row">
            <div class="col">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Insert Labor</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{url('prosupdateLabor')}}" method="POST"  class="form-horizontal form-label-left">
                            @csrf
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">NIK</label>
                                <div class="col-md-9 col-sm-9  ">
                                    <input type="text" name="NIK" value="{{$data?$data->NIK:''}}" class="form-control @error('NIK') is-invalid @enderror" placeholder="Input NIK">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Nama</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="nama" value="{{$data?$data->nama:''}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Inputkan Nama Labor">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="email" name="email" value="{{$data?$user->email:''}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Inputkan Nama Labor">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Crew</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="id_crew" class="select2_single form-control @error('id_crew') is-invalid @enderror" tabindex="-1">
                                        <option value="{{$data?$data->id_crew:''}}">{{$data?$data->crews->nama:''}}</option>
                                        @foreach ($crews as $crew)
                                        <option value="{{$crew->id}}">{{$crew->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button type="reset" class="btn btn-primary">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection