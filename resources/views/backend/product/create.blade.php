@extends('layouts.backendapp')
@section('title', "Add Product")
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Productes</h2>
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
                        <form method="POST" action="{{ route('backend.product.store') }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="col-sm-6 form-group">
                                <label for="first-name">Product Title <span class="required">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="text" id="title" required="required" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Main Image <span class="required">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="file" required="required" name="photo" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="first-name">Shot Description
                                </label>
                                <div class="form-group">
                                    <textarea name="shot_description" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label>Description
                                </label>
                                <div class="form-group">
                                    <textarea name="description" class="form-control summernote"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label>Additional Info
                                </label>
                                <div class="form-group">
                                    <textarea name="additional_info" class="form-control summernote"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Regular Price<span class="required">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="number" required="required" name="regular_price" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Discount Price
                                </label>
                                <div class="form-group">
                                    <input type="number" name="discount_price" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>Available Size</h5>
                                    </div>
                                    @foreach ($sizes as $size)
                                        <div class="col">
                                            <label class="form-control">
                                                <input  type="checkbox" name="attr[{{$size->id}}]" data-toggle="collapse" data-target="#size_{{ $size->id }}" value="{{ $size->id }}">
                                                 {{ $size->name }}
                                            </label>

                                            <div class="collapse" id="size_{{ $size->id }}">
                                                <h6 class="my-3">Available Color</h6>
                                                @foreach ($colors as $color)
                                                <label class="form-control">
                                                    <input  type="checkbox" data-toggle="collapse" data-target="#size_{{ $size->id }}_color_{{ $color->id }}" name="attr[{{$size->id}}][{{ $color->id }}]" value="{{ $color->id }}"> 
                                                    {{ $color->name }}
                                                </label>
                                                <div class="collapse card mb-2" id="size_{{ $size->id }}_color_{{ $color->id }}">
                                                    <div class="card-body p-2">
                                                        <div class="form-group">
                                                            <input type="text" name="attr[{{$size->id}}][{{ $color->id }}]['quantity'][]" placeholder="Color Wais Quantity" class="form-control">
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <input type="text" name="attr[{{$size->id}}][{{ $color->id }}]['add_price'][]" placeholder="Color Wais Additional Price" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <h5>Product Galery Images:</h5>
                                <input type="file" name="galery[]" class="form-control" multiple>
                            </div>
                            <div class="form-group col-sm-12 mt-5">
                                <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                                <button type="submit" class="btn btn-success btn-lg">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('backend_css')
    <link rel="stylesheet" href="{{ asset('backend/css/summernote-bs4.min.css') }}">
@endsection

@section('backend_js')
    <script src="{{ asset('backend/js/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection