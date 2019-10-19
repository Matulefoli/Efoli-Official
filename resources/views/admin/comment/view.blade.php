@extends('admin.layout')
@section('content')
    
<div class="col-xl-10 col-md-10 col-sm-10">
    <div class="panel">
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal">
            Add New
        </button>
    </div>
    <div class="card">
        @if($comments)
            <table class="table table-bordered table-active">
                <thead>
                    <th>User Icon</th>
                    <th>User name</th>
                    <th>Comment</th>
                    <th>Rating</th>
                    <th>Created at</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>
                                @php
                                    $img=App\ImageGallery::where('model_id',$comment->id)->where('model_type','App\Comment')->first();
                                @endphp
                                @if($img)
                                    <img src="{{asset($img->image)}}" width="100px" style="border-radius:5%" alt="">
                                @endif
                            </td>
                            <td>{{$comment->user_name}}</td>
                            <td>{{$comment->comment}}</td>
                            <td>{{$comment->star_rating}}</td>
                            <td>{{$comment->created_at}}</td>
                            <td>
                                <a href="{{url('admin/comment_del/'.$comment->id)}}" class="btn btn-danger float-left">
                                    Delete 
                                </a>
                                <a href=""  class="btn btn-warning float-left">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add comment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('save_comment')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                 <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" class="form-control" name="name">
                 </div>
                 <div class="form-group">
                        <label for="">User Icon</label>
                        <input type="file" class="form-control" name="image">
                 </div>
                 <div class="form-group">
                     <label for="">
                         Comment
                     </label>
                     <textarea name="comment" id="" class="form-control" cols="30" rows="10"></textarea>
                 </div>
                 <div class="form-group">
                        <label for="">
                            Star Rating
                        </label>
                        <input type="number" name="rating" class="form-control">
                 </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input  type="submit" class="btn btn-primary">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection