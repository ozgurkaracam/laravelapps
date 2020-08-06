@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{$category->name ?? ''}} Subcategories</h6>
                        <div><a href="{{isset($category) ? route('subcategories.create.withcategory',$category->id) : route('subcategories.create') }}" class="btn btn-success">Create New Subcategory</a></div>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Owner Category</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Owner Category</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                           @if(isset($category))
                            @foreach($category->subcategories as $key=>$subb)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$subb->name}}</td>
                                    <td>{{$subb->category->name}}</td>
                                    <td>
                                        <a href="{{route('subcategories.edit',$subb->id)}}" class="btn btn-info">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('subcategories.destroy',$subb->id)}}" method="POST">@csrf {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form></td>
                                </tr>
                            @endforeach
                               @else
                               @foreach($subcategories as $key=>$subb)
                                   <tr>
                                       <td>{{$key+1}}</td>
                                       <td>{{$subb->name}}</td>
                                       <td>{{$subb->category->name}}</td>
                                       <td>
                                           <a href="{{route('subcategories.edit',$subb->id)}}" class="btn btn-info">Edit</a>
                                       </td>
                                       <td>
                                           <form action="{{route('subcategories.destroy',$subb->id)}}" method="POST">@csrf {{method_field('DELETE')}}
                                               <button type="submit" class="btn btn-danger">Delete</button>
                                           </form></td>
                                   </tr>
                               @endforeach
                               @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection
