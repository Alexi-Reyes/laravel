@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create API Key</h1>

        <form action="{{ route('apiKeys.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
