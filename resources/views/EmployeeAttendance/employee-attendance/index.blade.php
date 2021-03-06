@extends('layouts.administration.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card bg-info">
                    <div class="card-header">Employee attendance report</div>
                    <div class="card-body">
                        <a href="{{ url('/employee-attendance/create') }}" class="btn btn-primary btn-sm" title="Add New EmployeeAttendance">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <a href="{{ route('employee_attendance_report_form') }}" class="btn btn-primary btn-sm" title="Add New EmployeeAttendance">
                            <i class="fa fa-plus" aria-hidden="true"></i> Emp_attendance_report
                        </a>

                        <form method="GET" action="{{ url('/employee-attendance') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Academic Id</th>
                                        <th>Teacher</th>
                                        <th>Attend</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($employeeattendance as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item->academic_id}}</td>
                                        <td>{{App\Academic::find($item->academic_id)->name }}</td>
                                        <td>{{ $item->attend }}</td>
                                        <td>{{ $item->created_at}}</td>
                                        <td>
                                            <a href="{{ url('/employee-attendance/' . $item->id) }}" title="View EmployeeAttendance"><button class="btn btn-dark btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/employee-attendance/' . $item->id . '/edit') }}" title="Edit EmployeeAttendance"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/employee-attendance' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete EmployeeAttendance" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $employeeattendance->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
