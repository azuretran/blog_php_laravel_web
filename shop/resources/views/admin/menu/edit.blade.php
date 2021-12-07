@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section( 'content')
<form action="#" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label for="menu">Name Menu</label>
        <input type="text" class="form-control" id="menu" placeholder="Enter name" name="name" value={{ $menu->name }}>
      </div>
      <div class="form-group">
        <label > Menu List</label>
        <select class="form-control" name="parent_id">
            <option value="0" {{ $menu->parent_id==0?'selected':'' }}>parent list</option>
            @foreach($menus as $menuParent)
            <option value="{{ $menuParent->id }}"
                {{ $menu->parent_id==$menuParent->id?'selected':'' }}
                >{{ $menuParent->name }}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="description_details">Description Details</label>
        <textarea name="description" class="form-control" id='content'>{{ $menu->description }}</textarea>
      </div>
      <div class="form-group">
      <label for="description">Description</label>
      <textarea name="content" class="form-control" >{{ $menu->content }}</textarea>
    </div>

    <div class="form-group">
        <label for="active_form">active</label>
        <div class="row">
            <div class="custom-control custom-radio col-3">
                <input class="custom-control-input custom-control-input-danger" type="radio" id="active"
                 name="active" value="1" {{ $menu->active==1?'checked=""':'' }}>
                <label for="active" class="custom-control-label">Active</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="no_active"
                name="active" value="0" {{ $menu->active==0?'checked=""':'' }}>
                <label for="no_active" class="custom-control-label">Disable</label>
              </div>
        </div>

    </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">UPDATE list</button>
    </div>
    @csrf
  </form>
@endsection
@section('footer')
  <script>
      CKEDITOR.replace('content');
  </script>
@endsection
