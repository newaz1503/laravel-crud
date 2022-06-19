@extends("layout.master")

@section("title", 'Student')

@section("css")

@endsection

@section("content")
    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
        <form action="{{route('student.update', $student->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" value="{{$student['name']}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{$student['email']}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone</label>
                <input type="tel" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number" value="{{$student['mobile']}}">
            </div>
            <div class="mb-3">
                <input type="file" name="image" class="form-control">
                <img src="{{asset('uploads/images/students/'.$student['image']) }}" alt="{{$student['name']}}" width="180" height="120" class="img-fluid my-3">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('home')}}" class="btn btn-danger">Home</a>
        </form>
    </div>
@endsection

@section("js")

@endsection