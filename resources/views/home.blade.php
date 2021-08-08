@extends('layouts.app')

@section('content')


<style type="text/css">
    table.dataTable tr td span a:nth-child(4) {
    background-color: #3F0101!important;
    border: 1px solid #3F0101;
    margin-right: 0;
    }
    .modal_style .modal-content {
    position: relative;
    }
    .modal_style .close_btn {
    font-size: 24px;
    position: absolute;
    opacity: 1;
    background-color: #60be81;
    color: #fff;
    border-radius: 50%;
    height: 35px;
    width: 35px;
    top: -11px;
    padding: 0px 5px 0 6px;
    /* padding-right: 0px; */
    right: -17px;
    }
    .modal_style .close_btn:hover {
    background-color: #252422;
    }
    .sort{
    width:40%;
    }


 </style>

<div class="right_col" role="main">
   <div>
      <div class="page-title">
         <div class="title_left">
            <h3>Book Management</h3>
 </div>
         <div class="container">
            <div class="row">
               <div class="col-md-14" >
                  <a href="{{route('books.create')}}" class="btn btn-primary">Add User</a>
               </div>
            </div>
         </div>
         <div class="x_content">
            <table id="datatable-filter" class="table table-striped table-bordered table-responsive table_search_bar">
               <thead>
                  <tr>
                     <th width="50">Sr. No.</th>
                     <th class="">Book Name</th>
                     <th>Image</th>
                     <th>Author Name</th>
                     <th>Published Date</th>
              <th class="no-sort sort">Action</th>
                  </tr>
               </thead>
               @foreach($books as $book)
               <tr>
                  <td>{{$book->id}}</td>
                  <td>{{$book->book_name}}</td>
                  <td><img src="{{ url('/storage') }}/{{ $book->image }}" width="100"> </td>
                  <td>{{$book->author_name}}</td>
                  <td>{{$book->published_date}}</td>
                 <td><span>
                 <a href="{{route ('books.edit',$book->id)}}" class="btn btn-success edit_btn">Edit</a>
                 <form method="POST" action="{{route('books.destroy',$book->id)}}">
                  {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                     <div class="form-group">
                  <input type="submit" class="btn btn-danger delete-user" value="Delete">
                  </div>
             </form>
             </span>
                 </td>
               </tr>
               @endforeach
            </table>
            {{$books->links()}}
         </div>
      </div>
   </div>
</div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('.delete-user').click(function(e){
        e.preventDefault()
        if (confirm('Are you sure?')) {
            $(e.target).closest('form').submit()
        }
    });
</script>

@endsection
