@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Time</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address}}</td>

            <td>{{ $user->updated_at }}</td>
            <td>
                <a class="btn btn-dark btn-sm" href="{{ route('user.view', ['id' => $user->id]) }}">
                    <i class="lni lni-eye"></i>
                </a>

                <a class="btn btn-success btn-sm" href="  {{ route('user.update', $user->id)}}  ">
                    <i class="lni lni-pencil-1"></i>
                </a>


                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
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