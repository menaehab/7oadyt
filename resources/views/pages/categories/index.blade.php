@extends('partials.master')
@section('page-title', __('keywords.categories'))
@section('content')
    <div class="container mt-4" dir=rtl>
        <h1 class="text-center mb-4">{{ __('keywords.categories') }}</h1>
        @if (session('primary'))
            <div class="alert alert-primary" role="alert">{{ session('primary') }}</div>
        @endif
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-4">{{ __('keywords.add_category') }}</a>
        @if ($categories->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('keywords.category_name') }}</th>
                        <th class="text-center" scope="col">{{ __('keywords.opertions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ $categories->firstItem() + $key }}</th>
                            <td>{{ $category->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-sm btn-info"><i
                                        class="fa fa-eye"></i></a>
                                <a href="{{ route('categories.edit', $category->slug) }}"
                                    class="btn btn-sm btn-primary my-1 my-sm-0"><i class="fa fa-edit"></i></a>
                                <form id="delete-form-{{ $category->slug }}"
                                    action="{{ route('categories.destroy', $category->slug) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger delete-form"
                                    data-slug="{{ $category->slug }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links('pagination::bootstrap-5') }}
        @else
            <div class="alert alert-danger" role="alert">{{ __('keywords.no_categories') }}</div>
        @endif
    </div>
@endsection
