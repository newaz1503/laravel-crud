@extends("layout.master")

@section("title",'student')

@section("css")

@endsection

@section("content")
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        @if(Session::has('message'))
            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>{!! session('message') !!}</div>
        @endif
        <div class="d-flex justify-content-between mb-3">
            <h4>Student List</h4>
            <a href="{{route('student.create')}}" class="btn- btn-primary btn-sm text-decoration-none mt-1" role="button"><strong><i class="fas fa-plus"></i> Create Student</strong></a>
        </div>
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>Serial No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(count($students) > 0)
                @foreach($students as $key=>$student)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{ ucwords($student['name'])}}</td>
                        <td>{{$student['email']}}</td>
                        <td>{{$student['mobile']}}</td>
                        <td>
                            <img src="{{asset('uploads/images/students/'.$student->image) }}" alt="{{$student['name']}}" width="90" height="50" class="img-fluid">
                        </td>
                        <td>
                            <a href="{{route('student.show', $student['id'])}}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{route('student.edit', $student['id'])}}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{route('student.delete', $student->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
             @else
                <p class="">Students Not Found</p>

             @endif

            </tbody>
        </table>
    </div>
@endsection

@section("js")

@endsection