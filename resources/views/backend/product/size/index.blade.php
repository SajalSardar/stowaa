@extends('layouts.backendapp')
@section('title', "Add Size")
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create Size</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form method="POST" action="{{ route('backend.productsize.store') }}" >
                            @csrf
                            <div class=" form-group">
                                <label for="first-name">Size Name <span class="required">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="text" id="first-name" required="required" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Size</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Actione</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($datas as $data)
                          <tr>
                            <th scope="row">{{ $data->id }}</th>
                            <td>{{$data->name}}</td>
                            <td>
                              <a href="#" class="btn  btn-primary btn-sm">View</a>
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
</section>
@endsection