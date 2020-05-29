@extends('template_backend.home')
@section('sub-judul', 'Tags')
@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
@endif

<a href="{{ route('tags.create') }}" class="btn btn-info btn-sm">Tambah Tags</a>
<br><br>

<table class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Tags</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tags as $result => $hasil)
        <tr>
            <td>{{ $result + $tags->firstitem() }}</td>
            <td>{{ $hasil->name }}</td>
            <td>
                <form action="{{ route('tags.destroy', $hasil->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('tags.edit', $hasil->id) }}" class="btn btn-primary btn-sm">edit</a>
                    <button type="submit" class="btn btn-danger btn-sm">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $tags->links() }}
@endsection
