@extends('layouts.backend.app')
@section('title', 'All Category')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">
                        <a href="{{route('admin.category.create')}}" class="btn btn-primary">Add Category <i class="fas fa-plus"></i></a>
                    </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">
                            <span class="label label-primary">Manage Cateory</span>
                        </li>
                    </ol>
                </div>
            </div>
			<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Category</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Category Name</th>
                                                <th>Category Description</th>
                                                <th>Publication Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                 
                                        <tbody>
                                            @foreach($categories as $key=>$row)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$row->category_name}}</td>
                                                <td>{{str_limit($row->category_description, '50')}}</td>
                                                <td class="text-center" style="font-size: 20px;padding: 5px 15px;">
                                                    @if($row->publication_status == 1)
                                                    <span class="label label-success" >Active</span>
                                                    @else
                                                        <span class="label label-danger" >Unactive</span>
                                                    @endif
                                                </td>
                                                <td class="actions text-center">

                                                @if($row->publication_status == 1)
                                                <a href="{{route('admin.category.unactive_category',$row->slug)}}" class="on-default edit-row btn btn-danger"><i class="fas fa-thumbs-down"></i></a>
                                                @else
                                                <a href="{{route('admin.category.active_category',$row->slug)}}" class="on-default edit-row btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                                                @endif

                                                <a href="{{ route('admin.category.edit',$row->id) }}" class="on-default edit-row btn btn-info"><i class="fas fa-pencil-alt"></i></a>

                                                <button type="button" onclick="deleteCategory({{$row->id}})" class="btn btn-danger btn-md waves-effect">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{$row->id}}" action="{{ route('admin.category.destroy',$row->id) }}" method="post" style="display: none">
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
        function deleteCategory($id){
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