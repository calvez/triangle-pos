@extends('layouts.app')

@section('title', 'Vásárló létrehozáse')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('triangle.Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('currencies.index') }}">Pénznemek</a></li>
        <li class="breadcrumb-item active">Szerkesztés</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{ route('currencies.update', $currency) }}" method="POST">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <button class="btn btn-primary">Pénznem frissítése <i class="bi bi-check"></i></button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="currency_name">Pénznem neve <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="currency_name" required value="{{ $currency->currency_name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="code">Pénznem kódja <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="code" required value="{{ $currency->code }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="symbol">Szimbólum <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="symbol" required value="{{ $currency->symbol }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="thousand_separator">Ezres elválasztó <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="thousand_separator" required value="{{ $currency->thousand_separator }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="decimal_separator">Tizedes elválasztó <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="decimal_separator" required value="{{ $currency->decimal_separator }}">
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

