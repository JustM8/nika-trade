@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('service.Services') }}</h3>
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
                        <th class="text-center" scope="col">ID</th>
                        <th class="text-center" scope="col">{{ __('service.Title') }}</th>
                        <th class="text-center" scope="col">{{ __('service.Date') }}</th>
                        <th class="text-center" scope="col">{{ __('service.Image') }}</th>
                        <th class="text-center" scope="col">{{ __('service.Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td class="text-center" scope="col">{{ $service->id }}</td>
                            <td class="text-center" scope="col">{{ $service->data[App::currentLocale()]['title'] }}</td>
                            <td class="text-center" scope="col">{{ $service->created_at }}</td>
                            <td class="text-center" scope="col"><img src="{{ $service->thumbnailUrl }}" width="100" height="100" alt=""></td>
                            <td class="text-center" scope="col">
                                <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-info form-control">{{ __('service.Edit') }}</a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
{{--                                    <input type="submit" class="btn btn-danger form-control" onclick="confirmDelete(this)" value="{{ __('service.Remove') }}">--}}
                                    <button type="button" class="btn btn-danger form-control" onclick="confirmDelete(this)">{{ __('service.Remove') }}</button>
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
