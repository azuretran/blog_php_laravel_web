
@extends('admin.main')

@section( 'content')
    <table class="table display">
        <thead >
            <tr>
                <th>Id</th>
                <th>Name product</th>
                <th>List</th>
                <th>Price</th>
                <th>Price sale</th>
                <th>Active</th>
                <th>Update</th>
                <th><i class="fas fa-edit"></i>FIX</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
               
                    <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name']}}</td>
                    <td>{{ $product->menu['name']}}'</td>
                    <td>{{ $product->price}}</td>
                    <td>{{ $product['price_sale']}}</td>
                    <td>{!! \App\Helpers\helper::active($product['active']) !!}</td>
                    <td>{{ $product['updated_at'] }}</td>
                    <td>
                    <a class="btn btn-primary " href="/admin/menus/edit/'.$menu['id'].'"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" onclick="removeRow('.$menu['id'].',\'/admin/menus/destroy\')" ><i class="far fa-trash-alt"></i></a>
                    </td>
                    </tr>
                    
               
            @endforeach
        </tbody>
    </table>
    {!! $products->links() !!}
@endsection

