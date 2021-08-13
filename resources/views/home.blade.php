@extends('layouts.user')

@section('content')
<div class="container">
    <x-alert/>
<x-user.header :subscription="$subscription"/>   
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h6>My Tenders & RFQs</h6>
        <div class="d-flex">
            <a href="{{route('procurement-notice.index')}}" class="btn btn-success">Browse all Adverts</a><a href="{{route('procurement-notice.create')}}" class="btn btn-primary ml-2">Add New advert</a>
        </div>
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
                @forelse (Auth::user()->procurements as $procurement )
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
