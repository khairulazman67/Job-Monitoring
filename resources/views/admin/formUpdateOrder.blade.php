@extends('admin/main_admin')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Orderan</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        
        <div class="row">
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
            <div class="col">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Update Data Order</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="POST" action="{{url('/updateorder')}}"   class="form-horizontal form-label-left">
                            {{-- @method('post') --}}
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3">No Tiket</label>
                                <div class="col-md-9 col-sm-9  ">
                                    <input type="text" value="{{$data?$data->no_Tiket:''}}" name="no_Tiket"  class="form-control  @error('no_Tiket') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Tipe Tiket</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="id_tipeTiket" class="select2_single form-control  @error('id_tipeTiket') is-invalid @enderror" tabindex="-1">
                                        <option value="{{$data?$data->id_tipeTiket:''}}">{{$data?$data->types->nama:'Input Tipe TIket'}}</option>
                                        {{-- <option value="AK" selected disabled>Input Tipe Tiket</option> --}}
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{$type->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">ND</label>
                                <div class="col-md-9 col-sm-9  ">
                                    <input type="text" name="ND" value="{{$data?$data->ND:''}}" class="form-control @error('ND') is-invalid @enderror" >
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Nama Pelanggan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="nm_pelanggan" value="{{$data?$data->nm_pelanggan:''}}" class="form-control @error('nm_pelanggan') is-invalid @enderror" >
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
                                    <select name="id_sector" onchange="updateSTO()" id="id_sector" class="select2_single form-control @error('id_sector') is-invalid @enderror" tabindex="-1">
                                        <option value="{{$data?$data->id_sector:''}}">{{$data?$data->sectors->nama:""}}</option>
                                        @foreach ($sectors as $sector)
                                            <option value="{{$sector->id}}">{{$sector->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">STO</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="id_STO" id="id_sto" class="select2_single form-control @error('STO') is-invalid @enderror" tabindex="-1" >
                                        <option value="{{$data?$data->id_STO:''}}">{{$data?$data->STO->nama:''}} </option>
                                        
                                        {{-- @foreach ($stos as $sto)
                                        <option value="{{$sto->id}}">{{$sto->nama}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Crew</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="id_crew" class="select2_single form-control @error('id_crew') is-invalid @enderror" tabindex="-1">
                                        <option value="{{$data?$data->id_crew:""}}" >{{$data?$data->crews->nama:""}}</option>
                                        @foreach ($crews as $crew)
                                        <option value="{{$crew->id}}">{{$crew->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">DATEK</label>
                                <div class="col-md-9 col-sm-9 @error('DATEK') is-invalid @enderror">
                                    <input name="DATEK" type="text" value="{{$data?$data->DATEK:''}}" class="form-control" placeholder="Input Datek">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Status</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="status" class="select2_single form-control @error('id_crew') is-invalid @enderror" tabindex="-1">
                                        <option value="{{$data?$data->status:''}}">{{$data?$data->status:''}}</option>
                                        <option value="Kendala">Kendala</option>
                                        <option value="Reschedule">Reschedule</option>
                                        <option value="Close">Close</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
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