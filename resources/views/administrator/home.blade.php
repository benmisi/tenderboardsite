@extends('layouts.admin')

@section('content')
<div class="container">
    <x-alert/>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <div>Settled Invoices</div>
                    <div class="display-5">${{$summary['paid']}}</div>
                </div>
                <div class="card-footer">
                <a href="{{route('admin-invoices.show','PAID')}}" class="btn btn-block btn-primary">Browse List</a>
            </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                <div>Awaiting Invoices</div>
                    <div class="display-5">${{$summary['awaiting']}}</div>
                </div>
                <div class="card-footer">
                <a href="{{route('admin-invoices.show','AWAITING')}}" class="btn btn-block btn-primary">Browse List</a>
            </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <div>Subscriptions</div>
                    <div class="display-5">{{$summary['subscriptions']}}</div>
                </div>
                <div class="card-footer">
                <a href="{{route('admin-subscriptions.index')}}" class="btn btn-block btn-primary">Browse List</a>
            </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
            <div class="card-body text-center">
                    <div>Notices</div>
                    <div class="display-5">{{$summary['notices']}}</div>
            </div>
            <div class="card-footer">
                <a href="{{route('admin-notices.index')}}" class="btn btn-block btn-primary">Browse List</a>
            </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
            <div class="card-body text-center">
                    <div>Company Registrations</div>
                    <div class="display-5">{{$summary['registrations']}}</div>
            </div>
            <div class="card-footer">
                <a href="{{route('admin-companyregistrations.index')}}" class="btn btn-block btn-primary">Browse List</a>
            </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
            <div class="card-body text-center">
                    <div>PRAZ Registrations</div>
                    <div class="display-5">{{$summary['praz']}}</div>
            </div>
            <div class="card-footer">
                <a href="{{route('admin-prazregistrations.index')}}" class="btn btn-block btn-primary">Browse List</a>
            </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
            <div class="card-body text-center">
                    <div>Vendor Registrations</div>
                    <div class="display-5">{{$summary['vendor']}}</div>
            </div>
            <div class="card-footer">
                <a href="{{route('admin-vendorregistrations.index')}}" class="btn btn-block btn-primary">Browse List</a>
            </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
            <div class="card-body text-center">
                    <div>Users List</div>
                    <div class="display-5">{{$summary['users']}}</div>
            </div>
            <div class="card-footer">
                <a href="{{route('admin-users.index')}}" class="btn btn-block btn-primary">Browse List</a>
            </div>
            </div>
        </div>
    </div>

</div>

@endsection