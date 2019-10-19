@extends('admin.layout')
@section('content')
<section id="info-tabs-">
        <div class="row">
                <div class="col-12">
                        <div class="card icon-tab">
                            <div class="card-header">
                                Contest Setup
                            </div>
                            <div class="card-body">
                                <form action="{{route('paper_save')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$question_id}}" name="question_id">
                                    <div class="form-group">
                                        <h6>Question Set</h6>
                                        <input type="file" name="question" class="form-control">
                                        <h6>Answer Set</h6>
                                        <input type="file" name="answer" class="form-control">
                                        <h6>Marks</h6>
                                        <input type="file" name="marks" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
        </div>
</section>
@endsection