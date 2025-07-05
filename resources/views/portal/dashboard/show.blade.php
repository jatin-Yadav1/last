@extends('portal.layout.app')
@section('title', 'Login Page')
@section('content')


<div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddStudentModalLabel">Add Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('/get2')}}" method="POST">
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
                <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary add_student">Save</button>
            </div>
                </form>

                
            </div>
            

        </div>
    </div>
</div>



<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            <div class="card">
                <div class="card-header">
                    <h4>
                       Educations
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#AddStudentModal">Add Details</button>
                    </h4>
                </div>
     
                           <div class="card-body">
                    <table class="table table-bordered">
                        
                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Institute</th>
                                <th>Degree</th>
                                <th>Start Year</th>
                                <th>End Year</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            
                                
                            @foreach ($name as $item )
                            <tr>
                                <td> {{$item->id}} </td>
                                <td> {{$item->name}} </td>
                                <td> {{$item->name}} </td>
                                <td> {{$item->name}} </td>
                                <td> {{$item->name}} </td>
                                <td> {{$item->name}} </td>
                                
           
            <td> <a href="{{ url('portal/update',$item->id) }}" class="btn btn-primary">updata</a> </td>
            <td> <a href="{{url('portal/delete',$item->id)}}" class="btn btn-primary">delete</a> </td>
          
                            </tr>
                                
                            @endforeach
                        
                            
                            
   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


