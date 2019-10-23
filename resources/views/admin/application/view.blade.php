@extends('admin.layout')
@section('content')
  
<div class="col-xl-12 col-md-12 col-sm-12">
    @if($jobs)
        <div class="card">
            <table class="table">
                <thead>
                    <th>Job Name</th>
                    <th>Job Created</th>
                    <th>Total Application</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{$job->title}}</td>
                            <td>
                                {{$job->created_at}}
                            </td>
                            <td>
                                @php
                                    $app=App\Application::where('job_id',$job->id)->count();
                                @endphp
                                {{$app}}
                            </td>
                            <td>
                                <a href="{{route('all_applications_get',$job->id)}}" class="btn btn-dark">Go To All Application</a>
                                <a href="{{route('all_short_list_get',$job->id)}}" class="btn btn-dark">Go To All Shortlist</a>
                            </td>
                        </tr>
            
        
                    @endforeach
                </tbody>

            </table>
            
        </div>
        {{ $jobs->links() }}
    @endif
</div>
@endsection