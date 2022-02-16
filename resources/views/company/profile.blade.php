@extends('layouts.app')

@section('content')

    <form method="POST" action="{{route('company_profile.store')}}">
        @csrf

        <div class="row">
            <div class="col-lg-8 layout-spacing layout-top-spacing px-5">

                <x-bread-crumb model="Create Company Profile"></x-bread-crumb>

                <div class="statbox widget box box-shadow">

                    <x-widget-header :item="'Create'" model="Company Profile"></x-widget-header>

                    <div class="widget-content widget-content-area">
                        <div class="form-group mb-4">
                            <label for="Name">Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="Name" name="name"
                                   value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 layout-top-spacing px-5">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Actions</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">

                        <button type="submit" class="btn btn-sm btn-primary mt-3">Save</button>
                        <button type="reset" class="btn btn-sm btn-danger mt-3 float-right">Reset All</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

