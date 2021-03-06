@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Customers</div>
                <div class="card-body">
                    <a href="{{ route('excel_export') }}" class="btn btn-primary">Export to excel</a>
                    <br><br>
                    <hr />
                    <form action="{{ route('excel_import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="import_file" />
                        <br>
                        <input type="submit" value="Import" class="btn btn-info" />
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
