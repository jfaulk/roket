@extends('master')

@section('content')

<h1>Users</h1>
    @if ($users->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Display Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td><a href="{{ url('users/' . $user->id) }}">{{ $user->name }}</a></td>
                <td>{{ $user->display_name }}</td>
                <td>{{ User::find($user->id)->role->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->gender }}</td>
                @if (Auth::check() AND Auth::user()->id == $user->id)
                <td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
                @endif
            </tr>
        @endforeach
        </tbody>
</table>

@else
<p>There are no users.</p>
@endif

@stop