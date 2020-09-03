@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            Teachers
            <a href="{{ route('teacher.create') }}"><i class="fas fa-plus fa-2x text-dark"></i></a>
        </div>
        <div class="card-body">
            @if(count($teachers) == 0)
                No teachers found!
            @else
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>School</th>
                        <th>Teacher Code</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $key => $teacher)
                        <tr>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->city }}</td>
                            <td>{{ $teacher->country }}</td>
                            <td>{{ $teacher->name_of_the_school }}</td>
                            <td>{{ $teacher->teacher_code }}</td>
                            <td>
                                <a href="{{ route('teacher.edit', $teacher->id) }}"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('teacher.destroy', $teacher->id) }}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
