@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-12 layout-spacing layout-top-spacing px-5">
            <div class="row layout-spacing">

                <div class="col-lg-12">

                    <x-bread-crumb model="Design"></x-bread-crumb>

                    <div class="statbox widget box box-shadow">

                        <x-widget-header model="Design" createRoute=""></x-widget-header>

                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-striped" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="checkbox-column">SN</th>
                                       <th>Name</th>                        
                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ()
                                        <tr>
                                            <td class="checkbox-column">
                                                {{$loop->iteration}}
                                            </td>
                                            {{-- <td>{{$category->name}}</td> --}}
                        
                        <td class="text-center">
                                                {{-- <x-list-button routeDestroy="{{route('categories.destroy',$design->id)}}"
                                                               routeEdit="{{route('categories.edit',$design->id)}}">
                                                </x-list-button> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td> No Record Found !!</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('inlinejs')
    @include('scripts.data_table_script')
@endpush


