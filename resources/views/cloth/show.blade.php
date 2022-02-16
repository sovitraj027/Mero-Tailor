@extends('layouts.app')


@section('content')
    {{-- <x-breadcrumb parentPageTitle="All Book" parentPageUrl="{{route('books.index')}}"
                  currentPageTitle="Show Book">
    </x-breadcrumb> --}}
    <div class="card">
        <div class="card-header">
            {{-- @if (in_array(auth()->user()->user_type_id, [1,2]))
                <a href="{{ route('borrow', $book->id) }}" class="btn btn-secondary btn-sm">Borrow</a>
            @endif --}}
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="/storage/cloth-image/{{ $cloth->image }}" width="250" height="250">
                    </div>
                    <div class="col-md-8">
                        <h4 class=""><strong>Name:</strong> {{$cloth->name}}</h4><br>
                        {{-- <h4 class=""><strong>Category:</strong> {{$cloth->categories->name}}</h4><br> --}}
                        <h4 class=""><strong>Publisher:</strong> {{$cloth->price}}</h4><br>
                        <h4 class=""><strong>Published At:</strong> {{$cloth->type}}</h4><br>
                        {{-- <h4 class=""><strong>Quantity:</strong> {{$cloth->quantity}}</h4><br> --}}
                        <h4 class=""><strong>Description:</strong> {!! $cloth->description !!}</h4><br>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
