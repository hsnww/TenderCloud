@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <row>
            <div class="col-md-12">
                <h1>الشركات</h1>
                <a href="{{ route('admin.companies.create') }}" class="btn btn-primary mb-3">Create A Company</a>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>City</th>
                        <th>Industry</th>
                        <th>Employees</th>
                        <th>Manager</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->city }}</td>
                            <td>{{ $company->industry }}</td>
                            <td>{{ $company->employees_count }}</td>
                            <td>
                                @foreach($company->users as $user)
                                    <p class="text-red-600">{{ $user->name }}</p>
                                @endforeach
                            </td>
                            <td>                        <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>

                            </td>
                            <td>
                                <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $companies->links() }}

            </div>
         </row>
    </div>
@endsection
