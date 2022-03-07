@extends('layouts.backendapp')
@section('title', "$product->title | ")
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Producte</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td width="200"><strong>Product Id</strong></td>
                            <td width="5">:</td>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <td width="200"><strong>Product Title</strong></td>
                            <td width="5">:</td>
                            <td>{{ $product->title }}</td>
                        </tr>
                        <tr>
                            <td width="200"><strong>Product SKU</strong></td>
                            <td width="5">:</td>
                            <td>{{ $product->sku }}</td>
                        </tr>
                        <tr>
                            <td width="200"><strong>Sales Price</strong></td>
                            <td width="5">:</td>
                            <td>{{ $product->discount_price }}</td>
                        </tr>
                        <tr>
                            <td width="200"><strong>Regular Price</strong></td>
                            <td width="5">:</td>
                            <td>{{ $product->regular_price }}</td>
                        </tr>
                        <tr>
                            <td width="200"><strong>Product Size</strong></td>
                            <td width="5">:</td>
                            <td>
                               
                                @foreach ($product->product_sizes as $Psize)
                                @foreach ($Psize->sizes as $size)
                                <span class="badge badge-info">{{ $size->name }}</span>
                                @endforeach
                                    
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td width="200"><strong>Shot description</strong></td>
                            <td width="5">:</td>
                            <td>{{ $product->shot_description }}</td>
                        </tr>
                        <tr>
                            <td width="200"><strong>Description</strong></td>
                            <td width="5">:</td>
                            <td>{!! $product->description !!}</td>
                        </tr>
                        <tr>
                            <td width="200"><strong>Additional Info</strong></td>
                            <td width="5">:</td>
                            <td>{!! $product->additional_info !!}</td>
                        </tr>
                        <tr>
                            <td width="200"><strong>Photo</strong></td>
                            <td width="5">:</td>
                            <td>
                                <img src="{{ asset('storage/uploads/products/'.$product->photo) }}" alt="{{  $product->title }}" width="200">
                            </td>
                        </tr>
                        <tr>
                            <td width="200"><strong>Photo Gallery</strong></td>
                            <td width="5">:</td>
                            <td>
                                @foreach($product->product_galleries as $gallery)
                                    <img class="img-thumbnail" src="{{ asset('storage/uploads/products/galleries/'.$gallery->image) }}" alt="{{  $product->title }}" width="100">
                                @endforeach
                                
                            </td>
                        </tr>
                    </table>

                  </div>
                </div>
              </div>
        </div>
    </div>
</section>
@endsection