@extends('layouts.backend.app')
@section('title', 'Add Product')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">
                        <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add Product <i class="fas fa-plus"></i></a>
                    </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">
                            <span class="label label-primary">Manage Products</span>
                        </li>
                    </ol>
                </div>
            </div>
			<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Products</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Product Name</th>
                                                <th>Product Image</th>
                                                <th>Product Price</th>
                                                <th>Product size</th>
                                                <th>Publication status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($products as $key=>$row)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$row->product_name}}</td>
                                                <td class="text-center"><img src="{{url('storage/app/public/product/',$row->product_image)}}" alt="" width="60" height="60" style="border:2px solid #cccccca6; border-radius: 50px"></td>
                                                <td>{{$row->product_price}}</td>
                                                <td>{{$row->product_size}}</td>
                                                <td class="text-center" style="font-size: 20px;padding: 5px 15px;">
                                                    @if($row->publication_status == 1)
                                                    <span class="label label-success" >Active</span>
                                                    @else
                                                        <span class="label label-danger" >Unactive</span>
                                                    @endif
                                                </td>
                                                <td class="actions text-center">

                                                @if($row->publication_status == 1)
                                                <a href="{{route('admin.product.unactive_product',$row->slug)}}" class="on-default edit-row btn btn-danger"><i class="fas fa-thumbs-down"></i></a>
                                                @else
                                                <a href="{{route('admin.product.active_product',$row->slug)}}" class="on-default edit-row btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                                                @endif

                                                <a href="{{ route('admin.product.edit',$row->id) }}" class="on-default edit-row btn btn-info"><i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a href="{{ route('admin.product.show',$row->id) }}" class="on-default edit-row btn btn-success"><i class="fas fa-eye"></i>
                                                </a>

                                                <button type="button" onclick="deletePost({{$row->id}})" class="btn btn-danger btn-md waves-effect">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{$row->id}}" action="{{ route('admin.product.destroy',$row->id) }}" method="post" style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
 
                                                </td>
                                            </tr>
                                            @endforeach
                                  
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div> <!-- End Row -->
        </div>
    </div>
@endsection
@push('js')

<script type="text/javascript">
        function deletePost($id){
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+$id).submit();
              } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                )
              }
            })
        }
    </script>
@endpush