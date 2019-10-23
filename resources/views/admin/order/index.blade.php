@extends('layouts.backend.app')
@section('title', 'Add Order')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">
                        
                    </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">
                            <span class="label label-primary">Manage Order</span>
                        </li>
                    </ol>
                </div>
            </div>
			<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Order</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Order Id</th>
                                                <th>Customer Name</th>
                                                <th>Total Order</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($order_info as $key=>$row)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$row->customer_name}}</td>
                                                <td>{{$row->order_total}}</td>
                                                
                                                <td class="text-center" style="font-size: 20px;padding: 5px 15px;">
                                                    @if($row->order_status == 1)
                                                    <span class="label label-success" >Active</span>
                                                    @else
                                                        <span class="label label-danger" >Unactive</span>
                                                    @endif
                                                </td>
                                                <td class="actions text-center">

                                               @if($row->order_status == 1)
                                                <a href="{{route('admin.order.unactive_order',$row->order_id)}}" class="on-default edit-row btn btn-danger"><i class="fas fa-thumbs-down"></i></a>
                                                @else
                                                <a href="{{route('admin.order.active_order',$row->order_id)}}" class="on-default edit-row btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                                                @endif

                                                <a href="{{ route('admin.order.show',$row->order_id) }}" class="on-default edit-row btn btn-info"><i class="fas fa-eye"></i>
                                                </a>

                                                <button type="button" onclick="deleteOrder({{$row->order_id}})" class="btn btn-danger btn-md waves-effect">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{$row->order_id}}" action="{{ route('admin.order.destroy',$row->order_id) }}" method="post" style="display: none">
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
        function deleteOrder($order_id){
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
                document.getElementById('delete-form-'+$order_id).submit();
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
