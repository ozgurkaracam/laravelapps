@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid" id="container-wrapper">

        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
                    <a href="{{route('products.create')}}" class="btn btn-success">Add New Product</a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                        <tr>
                            <th>Key</th>
                            <th>Name</th>
{{--                            <th>Description</th>--}}
{{--                            <th>In Additional</th>--}}
                            <th>Price</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Key</th>
                            <th>Name</th>
{{--                            <th>Description</th>--}}
{{--                            <th>In Additional</th>--}}
                            <th>Price</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($Products as $key=>$Product)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$Product->name}}</td>
{{--                                <td>{{$Product->description}}</td>--}}
{{--                                <td>{{$Product->in_additional}}</td>--}}
                                <td>{{$Product->price}} ₺</td>
                                <td>{{$Product->category->name}}</td>
                                <td>{{$Product->subcategory->name ?? 'No Subcategory'}}</td>
                                <td width="150"><img src="{{asset('images/'.$Product->image)}}" alt="{{$Product->name}}" class="img-fluid"></td>

                                <td>
                                    <a href="{{route('products.edit',$Product->id)}}" class="btn btn-info">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('products.destroy',$Product->id)}}" method="POST">@csrf {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form></td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


@endsection
