@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Tags <small>» Listing</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table id="users-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th class="hidden-sm">email</th>
                        <th class="hidden-md">status</th>
                        <th class="hidden-md">created_at</th>
                        <th class="hidden-md">updated_at</th>
                        <th class="hidden-sm">Direction</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td class="hidden-sm">{{ $user->email }}</td>
                            <td class="hidden-md">{{ $user->status }}</td>
                            <td class="hidden-md">{{ $user->created_at }}</td>
                            <td class="hidden-md">{{ $user->updated_at }}</td>
                            <td class="hidden-sm">
                                @if ($user->reverse_direction)
                                    Reverse
                                @else
                                    Normal
                                @endif
                            </td>
                            <td>
                                <a href="/admin/user/{{ $user->id }}/edit" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $("#users-table").DataTable();
        });
    </script>
@stop