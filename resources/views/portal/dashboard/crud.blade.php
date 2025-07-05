@extends('portal.layout.app')
@section('title', 'Login Page')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">
            @foreach ($name as $item)
                
           
            <form action="{{ url('portal/update',$item->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                    <label for="">Full Name</label>
                    <input type="text" required name="name" class="name form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Course</label>
                    <input type="text" required name="Institute" class="course form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" required name="Degree" class="email form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone No</label>
                    <input type="text" name="Start" required class="phone form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone No</label>
                    <input type="text" name="End" required class="phone form-control">
                </div>
                
                
                <button type="submit" class="btn btn-primary add_student">Save</button>
            
                </form>
                 @endforeach


        </div>

    </div>

</div>


            

                                
           



@endsection


