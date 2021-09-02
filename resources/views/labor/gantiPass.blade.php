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
        
        <div class="row">
            <div class="col">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Ganti Password Labor</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
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
                        <br/>
                        <form action="{{url('gantipasslabor')}}" method="POST"  class="form-horizontal form-label-left">
                            @csrf
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Password terakhir</label>
                                <div class="col-md-9 col-sm-9  ">
                                    <input type="password"  name="oldpass" class="form-control @error('oldpass') is-invalid @enderror" placeholder="Input Password Terakhir">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Password Baru</label>
                                <div class="col-md-9 col-sm-9  ">
                                    <input type="password"  name="newpass" class="form-control @error('oldpass') is-invalid @enderror" placeholder="Input Password Baru">
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