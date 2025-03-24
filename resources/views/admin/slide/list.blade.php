@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tiêu đề</th>
            <th>Hình ảnh</th>
            <th>Link</th>
            <th>Trạng thái</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($slides as $slide)
        <tr>
            <td>{{ $slide->id }}</td>
            <td>{{ $slide->name }}</td>
            <td><a href="{{ $slide->image }}" target="_blank">
                    <img src="{{ asset('sliders/' . $slide->image) }}" height="40px">
                </a>
            </td>
            <td>{{ $slide->url }}</td>

            <td>
                @if ($slide->status == 1)
                <span class="badge bg-success">Hiện</span>
                @else
                <span class="badge bg-dark">Ẩn</span>
                @endif
            </td>
            <td>{{ $slide->updated_at }}</td>
            <td>
                <a class="btn btn-success btn-sm" href="{{ route('slide.edit', $slide->id) }}">
                    <i class="lni lni-pencil-1"></i>
                </a>
                <form action="{{ route('slide.destroy', $slide->id) }}" method="POST" style="display:inline;">
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