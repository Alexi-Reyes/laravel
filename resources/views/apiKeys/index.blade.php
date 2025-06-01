@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>API Keys</h1>

        <a href="{{ route('apiKeys.create') }}" class="btn btn-primary">Create New API Key</a>

        @if ($apiKeys->isEmpty())
            <p>No API keys found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Key</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apiKeys as $apiKey)
                        <tr>
                            <td>{{ $apiKey->name }}</td>
                            <td>{{ $apiKey->key }}</td>
                            <td>{{ $apiKey->created_at }}</td>
                            <td>
                                <form action="{{ route('apiKeys.destroy', $apiKey) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
