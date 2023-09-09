@extends('layouts.app')

@section('title', 'Sales Return Report')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('triangle.Home') }}</a></li>
        <li class="breadcrumb-item active">Sales Return Report</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <livewire:reports.sales-return-report :customers="\Modules\People\Entities\Customer::all()"/>
    </div>
@endsection
