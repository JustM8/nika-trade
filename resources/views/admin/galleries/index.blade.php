@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('index.Galleries') }}</h3>
            </div>
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <table class="table align-self-center">
                    <thead>
                    <tr>
                        <th class="text-center" scope="col">{{ __('index.ID') }}</th>
                        <th class="text-center" scope="col">{{ __('index.Create Date') }}</th>
                        <th class="text-center" scope="col">{{ __('index.Year') }}</th>
                        <th class="text-center" scope="col">{{ __('index.Object') }}</th>
                        <th class="text-center" scope="col">{{ __('index.Categories') }}</th>
                        <th class="text-center" scope="col">{{ __('index.Actions') }}</th>
                        <th class="text-center" scope="col"><a href="{{ route('admin.galleries.index') }}" class=" btn btn-outline-dark">{{__('index.All')}}</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($galleries as $gallery)
{{--                        @dd($gallery);--}}
                        <tr>
                            <td class="text-center" scope="col">{{ $gallery->id }}</td>
                            <td class="text-center" scope="col">{{ $gallery->date }}</td>
                            <td class="text-center" scope="col">
                                @php
                                    $row2 = $gallery->data[App::currentLocale()][2]['row'];
                                @endphp
                                @if(is_string($row2))
                                    {{ $row2 }}
                                @endif
                            </td>
                            <td class="text-center" scope="col">
                                @php
                                    $row4 = $gallery->data[App::currentLocale()][4]['row'];
                                @endphp
                                @if(is_string($row4))
                                    {{ $row4 }}
                                @endif
                            </td>
                            <td class="text-center" scope="col">
                                @if(!empty($gallery->category))
                                    @include('categories.parts.category_view', ['category' => $gallery->category,'type'=>'galleries'])
                                @else
                                    @include('categories.parts.categories_view', ['category' => $gallery->categories,'type'=>'galleries'])
                                @endif
                            </td>
                            <td class="text-center" scope="col">
                                <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-info form-control">{{ __('index.Edit') }}</a>
                                <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger form-control" onclick="confirmDelete(this)">{{ __('index.Remove') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{--                {{ $galleries->links() }}--}}
            </div>
        </div>
    </div>
@endsection
@push('footer-scripts')
    @vite(['resources/js/delete.js'])
@endpush
