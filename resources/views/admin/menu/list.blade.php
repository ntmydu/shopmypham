@extends('admin.main')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Name</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $menu)
        <tr>
            <td>{{ $menu->id }}</td>
            <td>{{ $menu->name }}</td>
            <td>
                @if ($menu->status == 1)
                <span class="badge bg-success">Yes</span>
                @else
                <span class="badge bg-dark">No</span>
                @endif
            </td>
            <td>{{ $menu->updated_at }}</td>
            <td>
                <a class="btn btn-success btn-sm" href="{{route('menu.edit', $menu->id)}}">
                    <i class="lni lni-pencil-1"></i>
                </a>
                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="lni lni-trash-3"></i>

                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection