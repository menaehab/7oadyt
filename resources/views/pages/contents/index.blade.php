@extends('partials.master')
@section('page-title', __('keywords.contents'))
@section('content')
    <div class="container mt-4" dir=rtl>
        <h1 class="text-center mb-4">{{ __('keywords.contents') }}</h1>
        @if (session('primary'))
            <div class="alert alert-primary" role="alert">{{ session('primary') }}</div>
        @endif
        <a href="{{ route('contents.create') }}" class="btn btn-primary mb-4">{{ __('keywords.add_content') }}</a>
        @if ($contents->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('keywords.content_name') }}</th>
                        <th scope="col">{{ __('keywords.category_name') }}</th>
                        <th scope="col">{{ __('keywords.content_type') }}</th>
                        <th class="text-center" scope="col">{{ __('keywords.opertions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contents as $key => $cotent)
                        <tr>
                            <th scope="row">{{ $contents->firstItem() + $key }}</th>
                            <td>{{ $cotent->name }}</td>
                            <td>{{ $cotent->category->name }}</td>
                            <td>{{ $cotent->type }}</td>
                            <td class="text-center">
                                <a href="{{ route('contents.show', $cotent->slug) }}" class="btn btn-sm btn-info"><i
                                        class="fa fa-eye"></i></a>
                                <a href="{{ route('contents.edit', $cotent->slug) }}" class="btn btn-sm btn-primary"><i
                                        class="fa fa-edit"></i></a>
                                <form id="delete-form-{{ $cotent->slug }}"
                                    action="{{ route('contents.destroy', $cotent->slug) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger delete-form"
                                    data-slug="{{ $cotent->slug }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $contents->links('pagination::bootstrap-5') }}
        @else
            <div class="alert alert-danger" role="alert">{{ __('keywords.no_contents') }}</div>
        @endif
    </div>
@endsection
