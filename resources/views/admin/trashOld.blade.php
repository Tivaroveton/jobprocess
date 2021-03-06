@extends('layouts.main')
@section('content')

<div class="container">
 @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
  @endif
  <div class="row">
      <div class="col-md-4">                
          @include('admin.left-menu')      
      </div>
      <div class="col-md-8">
          <div class="card">Job Order
            <div class="card-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">เลขที่รายงาน</th>
                    <th scope="col">id</th>
                    <th scope="col">วันที่</th>                    
                    <th scope="col">ทำเลที่ตั้ง</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @foreach($jobs as $job)         
                    <tr>
                      <td>{{$job->jobcode}}</td>
                      <td>{{$job->reportcode}}</td>
                      <td>{{$job->startdate}}</td>                      
                      <td>{{$job->proplocation}}</td>                     
                      <td>
                        <a href="{{route('admininputjob.restore',[$job->id])}}"><button class="btn btn-success">Restore</button></a>
                        
                      </td>              
                    </tr> 
                  @endforeach
                </tbody>
             </table>
             {{$jobs->links()}}
            </div>
          </div>
      </div>
  </div>
</div>


@endsection