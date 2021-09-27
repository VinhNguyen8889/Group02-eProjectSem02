@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">
				<!-- Add Project -->

                <!-- row -->


<!-- end row -->
            <div class="row">

            <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Monthly Salary Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="example3_wrapper" class="dataTables_wrapper no-footer">

                                            <table id="example3" class="display dataTable no-footer" style="min-width: 845px" role="grid" aria-describedby="example3_info">
<thead> 
<tr role="row" class="bg bg-success">
    <th>Sl</th>
    <th>Employee Details</th>
    <th>Employee Data</th>
  </tr>
</thead>
<tbody>

<tr>
    <td>1</td>
    <td><b>Employee Name</b></td>
    <td>{{ $user->name }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Basic Salary</b></td>
    <td>{{ $user->salary }}</td>
  </tr>

  <tr>
    <td>3</td>
    <td><b>Level Salary</b></td>
    <td>{{ $salary_log -> increment_salary }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Allowance Salary</b></td>
    <td>{{ $allowance_salary }}</td>
  </tr>

    <tr>
    <td>5</td>
    <td><b>Total Absent for This Month</b></td>
    <td>{{ $absentCount }}</td>
  </tr>

  <tr>
    <td>6</td>
    <td><b>Month</b></td>
    <td>{{ $month }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Salary This Month</b></td>
    <td>{{ $total_salary }}</td>
  </tr>

</tbody>
</table>
                                    <div class="dataTables_paginate paging_simple_numbers" id="example3_paginate">
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
               
<!-- page div -->
            </div>
        </div>







@endsection