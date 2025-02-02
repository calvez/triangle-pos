@extends('layouts.app')

@section('title', 'Beszállító frissítése')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('triangle.Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">Beszállítók</a></li>
        <li class="breadcrumb-item active">Szerkesztés</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <button class="btn btn-primary">Beszállító frissítése <i class="bi bi-check"></i></button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_name">Beszállító neve <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="supplier_name" required value="{{ $supplier->supplier_name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_email">E-mail <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="supplier_email" required value="{{ $supplier->supplier_email }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="supplier_phone">Telefon <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="supplier_phone" required value="{{ $supplier->supplier_phone }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="city">Város <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="city" required value="{{ $supplier->city }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="country">Ország <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="country" required value="{{ $supplier->country }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="address">Cím <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address" required value="{{ $supplier->address }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

