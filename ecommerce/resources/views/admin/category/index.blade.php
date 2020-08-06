@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                        <div><a href="{{route('categories.create')}}" class="btn btn-success">Create New Category</a></div>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Sub Categories</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Sub Categories</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($categories as $key=>$category)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td width="150"><img src="{{asset('images/'.$category->image)}}" alt="{{$category->name}}" class="img-fluid"></td>
                                    <td><a href="{{route('subcategories.show',$category->id)}}">See Sub Categories</a></td>
                                    <td>
                                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('categories.destroy',$category->id)}}" method="POST">@csrf {{method_field('DELETE')}}
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


    </div>


    @endsection
