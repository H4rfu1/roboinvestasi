@extends('layouts.temp')

@section('title', 'Pilreksa')
@section('breadcrumb', 'Pilreksa')
@section('title2', 'Robo Pilih Reksadana')

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
              <form method="post" action="{{url('robopilreksa')}}">
                @csrf
                <div class="form-group fieldGroup">
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="text" name="name[]" class="form-control" placeholder="Nama Reksadana" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="return[]" class="form-control" placeholder="Return (%/tahun) contoh: 1,2" required/>
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="number" name="aum[]" class="form-control" placeholder="AUM (Miliar) contoh: 100" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="number" name="usia[]" class="form-control" placeholder="Usia Produk (tahun) contoh: 6" required/>
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="ekspen[]" class="form-control" placeholder="Exspense Ratio (%/tahun) contoh: 1,2" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <select class="custom-select" id="inputGroupSelect02" name="harga[]" required>
                        <option value="" selected disabled>Minimum Pembelian...</option>
                        <option value="20"><= Rp. 10.000</option>
                        <option value="40"><= Rp. 50.000</option>
                        <option value="60"><= Rp. 100.000</option>
                        <option value="80"><= Rp. 1.000.000</option>
                        <option value="100"> > Rp. 1.000.000</option>
                      </select>
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
                      <input type="text" name="name[]" class="form-control" placeholder="Nama Reksadana" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="return[]" class="form-control" placeholder="Return (%/tahun) contoh: 1,2" required/>
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="number" name="aum[]" class="form-control" placeholder="AUM (Miliar) contoh: 100" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="number" name="usia[]" class="form-control" placeholder="Usia Produk (tahun) contoh: 6" required/>
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-6">
                      <input type="number" step="0.01" min="0" name="ekspen[]" class="form-control" placeholder="Exspense Ratio (%/tahun) contoh: 1,2" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <select class="custom-select" id="inputGroupSelect02" name="harga[]" required>
                        <option value="" selected disabled>Minimum Pembelian...</option>
                        <option value="20"><= Rp. 10.000</option>
                        <option value="40"><= Rp. 50.000</option>
                        <option value="60"><= Rp. 100.000</option>
                        <option value="80"><= Rp. 1.000.000</option>
                        <option value="100"> > Rp. 1.000.000</option>
                      </select>
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
                <a href="{{url('alat/pilreksa')}}" class="btn btn-primary">Hitung Yang lain</a>
              </div>
              @endif
            </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->
@endsection