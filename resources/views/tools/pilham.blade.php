@extends('layouts.temp')

@section('title', 'PilHam')
@section('breadcrumb', 'PilHam')
@section('title2', 'Robo Pilih Saham')

@section('page')
  <div class="page-section">
    <div class="container">
            <div class="d-flex justify-content-center">
              <img class="img-fluid" src="{{asset('assets/img/avatar100.png')}}" alt="">
            </div>
            <div class="body">
            @if($mode =="input")
              <div class="input-group-addon mb-3"> 
                  <a href="javascript:void(0)" class="btn btn-success addMore"><i class="fas fa-plus"></i></a>
              </div>
              <form method="post" action="{{url('robopilham')}}">
                @csrf
                <div class="form-group fieldGroup">
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="text" name="name[]" class="form-control" placeholder="Kode Saham" required/>
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="npm[]" class="form-control" placeholder="Net Profit Margin (NPM) contoh: 10,2" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="roa[]" class="form-control" placeholder="Return on Assets (ROA) contoh: 1,2" required/>
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="roe[]" class="form-control" placeholder="Return on Equity (ROE) contoh: 8,2" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="number" name="eps[]" class="form-control" placeholder="Earning Per Share (EPS) contoh: 200" required/>
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="per[]" class="form-control" placeholder="Price Earning Ratio (PER) contoh: 2,2" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="pbvr[]" class="form-control" placeholder="price book value Ratio (PBVR) contoh: 10,2" required/>
                    </div>
                  </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Rangkingkan"/>
              </form>

              <div class="form-group fieldGroupCopy" style="display: none;">
                  <div class="input-group-addon mb-2"> 
                      <a href="javascript:void(0)" class="btn btn-danger remove"><i class="fas fa-trash"></i></a>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="text" name="name[]" class="form-control" placeholder="Kode Saham" required/>
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="npm[]" class="form-control" placeholder="Net Profit Margin (NPM) contoh: 10,2" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="roa[]" class="form-control" placeholder="Return on Assets (ROA) contoh: 1,2" required/>
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="roe[]" class="form-control" placeholder="Return on Equity (ROE) contoh: 8,2" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="number" name="eps[]" class="form-control" placeholder="Earning Per Share (EPS) contoh: 200" required/>
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="per[]" class="form-control" placeholder="Price Earning Ratio (PER) contoh: 2,2" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="pbvr[]" class="form-control" placeholder="price book value Ratio (PBVR) contoh: 10,2" required/>
                    </div>
                  </div>
                  </div>
              </div>
              @elseif($mode == "hasil")
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                @for($a = 0; $a < count($total); $a++)
                <tr>
                    <th scope="row">{{$a+1}}</th>
                    <td>{{$nama[$a]}}</td>
                    <td>{{$total[$a]}}</td>
                  </tr>
                @endfor
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                <a href="{{url('alat/pilham')}}" class="btn btn-primary">Hitung Yang lain</a>
              </div>
              @endif
            </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->
@endsection