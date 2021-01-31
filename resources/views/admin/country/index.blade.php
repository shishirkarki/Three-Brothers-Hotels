@extends('layouts.app')
@section('title','Country')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <a href="{{ route('country.create') }}" class="btn btn-primary">Add New</a>
              <div class="card-header"> 
                <h4 class="card-title"> Countries</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table id="table" class="display nowrap" style="width:100%">
                  <thead class=" text-primary">
                      <th>ID</th>
                        <th>ShortCode</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                             @foreach($countrys as $key=>$country)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $country->shortcode }}</td>
                                            <td>{{ $country->title }}</td>
                                            <td>{{ $country->name }}</td>
                                            <td>{{ $country->created_at }}</td>
                                            <td>{{ $country->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('country.edit',$country->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>

                                                <form id="delete-form-{{ $country->id }}" action="{{ route('country.destroy',$country->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $country->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
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
      </div>

@endsection


        @push('scripts')
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
            
        <script>
             $(document).ready(function() {
                $('#table').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
            } );
        </script>
  @endpush






