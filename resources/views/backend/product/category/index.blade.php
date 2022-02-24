@extends('layouts.backendapp')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create Category</h2>
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
                        <form method="POST" action="{{ route('backend.category.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class=" form-group">
                                <label for="first-name">Category Name <span class="required">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="text" id="first-name" required="required" name="name" class="form-control">
                                </div>
                            </div>
                            <div class=" form-group">
                                <label>Parent Category (If Needed)
                                </label>
                                <div class="form-group">
                                    <select name="parent" class="select2_group form-control">
                                        <option disabled> Select Parent </option>
                                        <option value="HI">Hawaii</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="description">Description
                                </label>
                                <div class="form-group">
                                    <textarea id="description" class="form-control" rows="4" name="description"></textarea>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="image">Image
                                </label>
                                <div class="form-group">
                                    <input type="file" id="image" class="form-control" name="image">
                                </div>
                                <p>Image size 250x250</p>
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
                    <h2>All Category</h2>
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
                          <th>Image</th>
                          <th>Category</th>
                          <th>Slug</th>
                          <th>Actione</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
        </div>
    </div>
</section>
@endsection