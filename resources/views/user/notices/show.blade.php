@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('procurement-notice.index')}}">Notices</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show Notice</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-12">
    <div class="card">
             <div class="card-header">Show Notice</div>
             <div class="card-body">
              <table class="table">
                  <tbody>
                      <tr>
                          <th>Title</th><td>{{$notice->title}}</td></tr>
                          <tr><th>Procurement Type</th><td>{{$notice->procurementtype->name}}</td></tr>
                          <tr><th>Closing Date</th><td>{{$notice->closing_date}}</td></tr>
                          <tr><th>Category</th><td>{{$notice->categorylist->name}}</td></tr>
                          <tr><th>Description</th><td>{{$notice->description}}</td></tr>
                          <tr><th></th><td><a href="/{{$notice->document}}" class="btn btn-success">Download Document</a></td></tr>
                          
                      </tr>
                  </tbody>
              </table>
             </div>
    </div>
    </div>
</div>

  
</div>
@endsection