@extends('layouts.dashboard')
@section('title', 'All User')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>phone</th>
                <th>address</th>
                <th>type</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->type }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <form method="post" action="{{ route('update.users.from.admin', $user->id) }}">
                            @method('put')
                            @csrf
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="type" value="admin"
                                    {{ $user->type == 'admin' ? 'checked' : '' }}>
                                <label class="form-check-label" for="type">Admin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="type" value="client"
                                    {{ $user->type == 'client' ? 'checked' : '' }}>
                                <label class="form-check-label" for="type">client</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="type"
                                    value="employee" {{ $user->type == 'employee' ? 'checked' : '' }}>
                                <label class="form-check-label" for="type">employee</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3"> Save </button>
                        </form>
                    </td>
                    {{-- --------------------------------------------------------------------------------------------- --}}


                    <td>
                        <form action="{{ route('delete.user.from.admin', $user->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
