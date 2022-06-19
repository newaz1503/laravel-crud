@extends("layout.master")

@section("title", 'Student')

@section("css")

@endsection

@section("content")
    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <p class="form-control">{{$student['name']}}</p>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <p class="form-control">{{$student['email']}}</p>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone</label>
            <p class="form-control">{{$student['mobile']}}</p>
        </div>
        <div class="mb-3">
            <img src="{{asset('uploads/images/students/'.$student['image']) }}" alt="{{$student['name']}}" width="180" height="120" class="img-fluid">
        </div>
        <a href="{{route('home')}}" class="btn btn-danger">Home</a>
    </div>
@endsection

@section("js")

@endsection