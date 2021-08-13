@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tenders & RFQs</li>
  </ol>
</nav>
    <x-alert/>

    <div class="card">
    <div class="card-header d-flex justify-content-between">
                     <div>Tenders & RFQs</div>
                     <a href="{{route('procurement-notice.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>New Notice</a>
    </div>
    <div class="card-body">
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Visibility</th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($procurements as $procurement )
                <tr>
                    <td>
                        {{$procurement->created_at}}
                    </td>
                    <td>
                        {{$procurement->title}}
                    </td>
                    <td>
                        {{$procurement->type}}
                    </td>
                    <td>
                        {{$procurement->categorylist->name}}
                    </td>
                    <td>
                        {{$procurement->status}}
                    </td>
                    <td>
                        {{$procurement->closing_date}}
                    </td>
                    <td>
                        <a href="{{route('procurement-notice.edit',$procurement->uuid)}}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>      
                @empty
                    <tr>
                        <td colspan="5" class="text-danger text-center">You do not have any procurement notices as yet</td>
                    </tr>
                @endforelse
                <tr>

                </tr>
            </tbody>
        </table>
    
    </div>
    </div>
    

 </div>
@endsection