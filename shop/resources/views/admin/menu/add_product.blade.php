@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section( 'content')
<form action="#" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="form-group ">
                    <label for="menu">Name Menu</label>
                    <input type="text" class="form-control" id="menu" placeholder="Enter name" name="name">
                  </div>
            </div>
           <div class="col-8">
            <div class="form-group">
                <label > Menu List</label>
                <select class="form-control" name="parent_id">
                    <option value="0">parent list</option>
                    @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
              </div>
           </div>
             
        </div>
      <div class="row">
          <div class="col-4">
            <div class="form-group">
                <label for="origin_price">origin price</label>
                <input type="number" class="form-control" name="price" id="origin_price">
            </div>
          </div>
          <div class="col-8">
            <div class="form-group">
                <label for="sale_price">sale price</label>
                <input type="number" class="form-control" name="price_sale" id="sale_price">
            </div>
          </div>
      </div>
      <div class="form-group">
        <label for="description_details">Description Details</label>
        <textarea name="description" class="form-control" id='content'></textarea>
      </div>
      <div class="form-group">
      <label for="description">Description</label>
      <textarea name="content" class="form-control" ></textarea>
    </div>
    <div class="form-group">
        <label for="menu">product image</label>
        <input type="file" class="form-control-file" id="upload" name="file">
        <div id="image_show">


        </div>
      </div>
      <input type="hidden"  id="file">
    <div class="form-group">
        <label for="active_form">active</label>
        <div class="row">
            <div class="custom-control custom-radio col-3">
                <input class="custom-control-input custom-control-input-danger" type="radio" id="active" name="active" value="1">
                <label for="active" class="custom-control-label">Active</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="no_active" name="active" value="0">
                <label for="no_active" class="custom-control-label">Disable</label>
              </div>
        </div>

    </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    @csrf
  </form>
@endsection
@section('footer')
  <script>
      CKEDITOR.replace('content');
  </script>
@endsection
