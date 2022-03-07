@extends('layouts.backendapp')
@section('title', "All Productes | ")
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Productes</h2>
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
                          <th>Photo</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>SKU</th>
                          <th>Regular Price</th>
                          <th>Sales Price</th>
                          <th>Status</th>
                          <th>Actione</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $data)
                          <tr>
                            <th scope="row">{{ $data->id }}</th>
                            <td>
                              <img width="50" src="{{ asset('storage/uploads/products/'.$data->photo) }}" alt="{{$data->title}}">
                            </td>
                            <td>{{$data->title}}</td>
                            <td>
                              @foreach ($data->categories as $category)
                                <span class="badge badge-primary">{{ $category->name }}</span>
                              @endforeach
                            </td>
                            <td>{{$data->sku}}</td>
                            <td>{{$data->regular_price}}</td>
                            <td>{{$data->discount_price}}</td>
                            <td>{{$data->status ==1 ? "Active" : "Deactive"}}</td>
                            <td>
                              <a href="{{ route('backend.product.show',$data->id) }}" class="btn  btn-primary btn-sm">View</a>
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