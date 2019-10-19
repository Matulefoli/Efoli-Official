@extends('admin.layout')
@section('content')
<section id="info-tabs-">
    <div class="row">
        <div class="col-12">
            <div class="card icon-tab">
                <div class="card-header">
                <h4 class="card-title">Manage</h4>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <th>Member</th>
                            <th>Team</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if($join_tables)
                            @foreach ($join_tables as $item)
                               <tr>
                                   <td>
                                       @php
                                           $mem=App\TeamMember::find($item->member);
                                       @endphp
                                       @if($mem)
                                       {{$mem->name}} <br>
                                       {{$mem->designation}} <br>
                                       @endif
                                      
                                   </td>
                                   <td>
                                        @php
                                            $mem=App\TeamCategory::find($item->team);
                                         @endphp
                                         @if($mem)
                                       {{$mem->category_name}}
                                       @endif
                                   </td>
                                   <td>
                                       <a href="{{route('team_join_del',$item->id)}}" class="btn btn-danger">Delete</a>
                                   </td>
                               </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-content mt-2">
                <div class="card-body">
                    <form id="storeProduct" method="POST" action="{{route('make_connection_team')}}" class="wizard-horizontal" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                    <div class="row">
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Team Name</label>
                                <select name="team" id="" class="form-control">
                                    @if($teams)
                                    @foreach ($teams as $team)
                                        <option value="{{$team->id}}">{{$team->category_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Member</label>
                                <select name="member" id="" class="form-control">
                                    @if($members)
                                    @foreach ($members as $member)
                                        <option value="{{$member->id}}">{{$member->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    
                    </div>
                   
                    
                    <div class="col-md-12">
                        <div class="form-group">
`                              <button class="btn btn-info" >Join</button>
                        </div>
                    </div>
                    </fieldset>
                    
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>   
@endsection