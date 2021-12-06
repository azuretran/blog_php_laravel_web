@extends('admin.main')
@section( 'content')
    <table class="table display">
        <thead >
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th>
                <th><i class="fas fa-edit"></i>FIX</th>
            </tr>
        </thead>
        <tbody>
          {!! \App\Helpers\helper::menu($menus) !!}
        </tbody>
    </table>
@endsection

