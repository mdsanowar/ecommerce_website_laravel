@extends('layouts.backend.app')
@section('title', 'All Slider')
@section('content')

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">
                        <a href="{{route('admin.slider.create')}}" class="btn btn-primary">Add Slider <i class="fas fa-plus"></i></a>
                    </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">
                            <span class="label label-primary">Manage Slider</span>
                        </li>
                    </ol>
                </div>
            </div>
			<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Slider</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Slider Title</th>
                                                <th>slider image</th>
                                                <th>Slider Subtitle</th>
                                                <th>Slider Description</th>
                                                <th>Publication Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                 
                                        <tbody>
                                            @foreach($sliders as $key=>$row)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$row->slider_title}}</td>
                                                 <td class="text-center">
                                                <img src="{{url('storage/app/public/slider/',$row->slider_image)}}" width="100" height="50" alt="image" style="border:2px solid #ccc;">
                                                </td>
                                                <td>{{str_limit($row->slider_subtitle,30)}}</td>
                                                <td>{{str_limit($row->slider_description,30)}}</td>
                                                <td class="text-center" style="font-size: 20px;padding: 5px 15px;">
                                                    @if($row->publication_status == 1)
                                                    <span class="label label-success" >Active</span>
                                                    @else
                                                        <span class="label label-danger" >Unactive</span>
                                                    @endif
                                                </td>
                                                <td class="actions text-center">

                                                @if($row->publication_status == 1)
                                                <a href="{{route('admin.slider.unactive_slider',$row->slug)}}" class="on-default edit-row btn btn-danger"><i class="fas fa-thumbs-down"></i></a>
                                                @else
                                                <a href="{{route('admin.slider.active_slider',$row->slug)}}" class="on-default edit-row btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                                                @endif

                                                <button type="button" onclick="deleteSlider({{$row->id}})" class="btn btn-danger btn-md waves-effect">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{$row->id}}" action="{{ route('admin.slider.destroy',$row->id) }}" method="post" style="display: none">
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
        function deleteSlider($id){
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