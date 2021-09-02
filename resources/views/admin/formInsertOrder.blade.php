@extends('admin/main_admin')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Order</h3>
            </div>
        </div>
        <div class="clearfix"></div>
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
            <div class="col">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Insert Data Order</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{url('insertorder')}}" method="POST"  class="form-horizontal form-label-left">
                            @csrf
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3">No Tiket</label>
                                <div class="col-md-9 col-sm-9  ">
                                    <input type="number" value="{{old('no_Tiket')?old('no_Tiket'):""}}" name="no_Tiket"  class="form-control  @error('no_Tiket') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Tipe Tiket</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="id_tipeTiket" class="select2_single form-control  @error('id_tipeTiket') is-invalid @enderror" tabindex="-1">
                                        <option value="{{old('id_sector')?old('id_tipeTiket'):''}}" selected disabled></option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{$type->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">ND</label>
                                <div class="col-md-9 col-sm-9  ">
                                    <input type="number" name="ND" value="{{old('ND')?old('ND'):''}}" class="form-control @error('ND') is-invalid @enderror" >
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Nama Pelanggan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="nm_pelanggan" value="{{old('nm_pelanggan')?old('nm_pelanggan'):''}}" class="form-control @error('nm_pelanggan') is-invalid @enderror" >
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3">Waktu Booking<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" >
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Sektor</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select id="id_sector" onchange="updateSTO()" name="id_sector"  class="select2_single form-control @error('id_sector') is-invalid @enderror" tabindex="-1">
                                        <option value="{{old('id_sector')?old('id_sector'):''}}" selected disabled></option>
                                        @foreach ($sectors as $sector)
                                            <option value="{{$sector->id}}">{{$sector->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- {{dd($datasto[1]->nama)}} --}}
                            {{-- {{dd($datasto)}} --}}
                            {{-- {{dd($datasto)}} --}}
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">STO</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="id_STO" id="id_sto" class="select2_single form-control @error('STO') is-invalid @enderror" tabindex="-1" >
                                        
                                        {{-- <option value="" disabled selected></option> --}}
                                        
                                        {{-- @foreach ($datasto as $sto)
                                            <option value="{{$sto->id}}">{{$sto->nama}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Crew</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="id_crew" class="select2_single form-control @error('id_crew') is-invalid @enderror" tabindex="-1">
                                        <option value="{{old('id_crew')?old('id_crew'):''}}" selected disabled></option>
                                        @foreach ($crews as $crew)
                                        <option value="{{$crew->id}}">{{$crew->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">DATEK</label>
                                <div class="col-md-9 col-sm-9 @error('DATEK') is-invalid @enderror">
                                    <input name="DATEK" type="text" value="{{old('DATEK')?old('DATEK'):''}}" class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button type="reset" class="btn btn-primary">Reset</button>
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
<script src="{{asset('assets/vendors/jquery/dist/jquery.min.js')}} "></script>
<script>
    function updateSTO(){
        console.log("Update Guys")
        let sector = $("#id_sector").val()
        $("#id_sto").children().remove()
        $("#id_sto").val('')
        $("#id_sto").append('<option value=""></option>')
        $("#id_sto").prop('disabled',true)
        if(sector!='' && sector!=null){
            $.ajax({
                url:"{{url('')}}/cekstok/"+sector,
                success:function(res){
                    $("#id_sto").prop('disabled',false)
                    let tampilan_option='';
                    $.each(res,function(index,data){
                        tampilan_option+=`<option value="${data.id}">${data.nama}</option>`
                        console.log(data)
                    })
                    $("#id_sto").append(tampilan_option)
                }
            });        
        }
        
    }
</script>