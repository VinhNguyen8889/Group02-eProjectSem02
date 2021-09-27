<div class="deznav">
<div class="deznav-scroll">
<ul class="metismenu" id="menu">
    <div class="card">
        <div class="card-body">
        <div id="accordion-seven" class="accordion-active-header">
                <div class="accordion__item">
                <div class="accordion__header accordion__header--primary collapsed" data-toggle="collapse" data-target="#header-bg_collapseOne" aria-expanded="false">
                <span class="accordion__header--icon"></span>
                <span class="accordion__header--text">General</span>
                <span class="accordion__header--indicator"></span>
                </div>
                <div id="header-bg_collapseOne" class="accordion__body collapse" data-parent="#accordion-seven" style="">

                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-144-layout"></i>
                <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                <li><a href="index.html">Dashboard</a></li>
                </ul>
                </li>


                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-028-user-1"></i>
                <span class="nav-text">User Profile</span>
                </a>
                <ul aria-expanded="false">
                <li><a href="{{route('user.profile')}}">User Profile</a></li>
                <li><a href="{{route('password.edit')}}">Change Password</a></li>
                </ul>
                </li>

                @if(Auth::user()->role == 'Admin')
                <li><a class="has-arrow ai-icon" href="{{route('all.user')}}" aria-expanded="false">
                <i class="flaticon-028-user-1"></i>
                <span class="nav-text">Manage Users</span>
                </a>
                </li>
                @endif

                </div>
                </div>


                <div class="accordion__item">
                <div class="accordion__header collapsed accordion__header--info" data-toggle="collapse" data-target="#header-bg_collapseTwo">
                <span class="accordion__header--icon"></span>
                <span class="accordion__header--text">Website Management</span>
                <span class="accordion__header--indicator"></span>
                </div>
                <div id="header-bg_collapseTwo" class="collapse accordion__body" data-parent="#accordion-seven">

                <li><a href="{{route('all.information')}}">
                <i class="flaticon-056-information"></i>
                <span class="nav-text">Information</span>
                </a>
                </li>

                <li><a href="{{route('all.service')}}">
                <i class="flaticon-143-idea"></i>
                <span class="nav-text">Service</span>
                </a>
                </li>

                <li><a href="{{route('all.project')}}">
                <i class="flaticon-032-briefcase"></i>
                <span class="nav-text">Project</span>
                </a>
                </li>

                <li><a href="{{route('all.course')}}">
                <i class="flaticon-009-share"></i>
                <span class="nav-text">Course</span>
                </a>
                </li>

                <li><a href="{{route('all.home')}}">
                <i class="flaticon-141-home"></i>
                <span class="nav-text">Home Content</span>
                </a>
                </li>

                <li><a href="{{route('all.review')}}">
                <i class="flaticon-029-star"></i>
                <span class="nav-text">Client Review</span>
                </a>
                </li>

                <li><a href="{{route('all.footer')}}">
                <i class="flaticon-097-pin"></i>
                <span class="nav-text">Footer</span>
                </a>
                </li>

                <li><a href="{{route('all.chart')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Chart</span>
                </a>
                </li>
                </div>
                </div>


                <div class="accordion__item">
                <div class="accordion__header collapsed accordion__header--success" data-toggle="collapse" data-target="#header-bg_collapseThree">
                <span class="accordion__header--icon"></span>
                <span class="accordion__header--text">Course & Fee Setup</span>
                <span class="accordion__header--indicator"></span>
                </div>
                <div id="header-bg_collapseThree" class="collapse accordion__body" data-parent="#accordion-seven">


                <li><a href="{{route('all.year')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Year</span>
                </a>
                </li>

                <li><a href="{{route('all.day')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Day Combo</span>
                </a>
                </li>



                <li><a href="{{route('all.group')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Group</span>
                </a>
                </li>

                <li><a href="{{route('all.shift')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Shift</span>
                </a>
                </li>

                <li><a href="{{route('all.subject')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Subject</span>
                </a>
                </li>

                <li><a href="{{route('all.class')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Class</span>
                </a>
                </li>

                <li><a href="{{route('all.coupon')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Coupon</span>
                </a>
                </li>


                <li><a href="{{route('all.exam_type')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Exam Type</span>
                </a>
                </li>


                <li><a href="{{route('all.job_title')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Job Title</span>
                </a>
                </li>

                <li><a href="{{route('all.teacher_level')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Teacher Level</span>
                </a>
                </li>


        </div>
        </div>

        <div class="accordion__item">
                <div class="accordion__header collapsed accordion__header--success" data-toggle="collapse" data-target="#header-bg_collapseFour">
                <span class="accordion__header--icon"></span>
                <span class="accordion__header--text">Registration Management</span>
                <span class="accordion__header--indicator"></span>
                </div>
                <div id="header-bg_collapseFour" class="collapse accordion__body" data-parent="#accordion-seven">

                <li><a href="{{route('all.student_reg')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Student Registration</span>
                </a>
                </li>

                <li><a href="{{route('view.student_reg')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Transaction List</span>
                </a>
                </li>



                </div>
        </div>

        <div class="accordion__item">
                <div class="accordion__header collapsed accordion__header--success" data-toggle="collapse" data-target="#header-bg_collapseFive">
                <span class="accordion__header--icon"></span>
                <span class="accordion__header--text">Student Management</span>
                <span class="accordion__header--indicator"></span>
                </div>
                <div id="header-bg_collapseFive" class="collapse accordion__body" data-parent="#accordion-seven">

                @if(Auth::user()->role !== 'Student')
                <li><a href="{{route('all.class_list')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Student List</span>
                </a>
                </li>
                @endif
                
                @if(Auth::user()->role == 'Student')
                <li><a href="{{route('student.class_list')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Student Study Record</span>
                </a>
                </li>
                @endif


                </div>
        </div>

        <div class="accordion__item">
                <div class="accordion__header collapsed accordion__header--success" data-toggle="collapse" data-target="#header-bg_collapseSix">
                <span class="accordion__header--icon"></span>
                <span class="accordion__header--text">Employee Management</span>
                <span class="accordion__header--indicator"></span>
                </div>
                <div id="header-bg_collapseSix" class="collapse accordion__body" data-parent="#accordion-seven">

                <li><a href="{{route('all.employee_reg')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Employee Registration</span>
                </a>
                </li>

                <li><a href="{{route('all.employee_salary')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Employee Salary</span>
                </a>
                </li>

                <li><a href="{{route('all.employee_attendance')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Employee Attendance</span>
                </a>
                </li>

                <li><a href="{{route('get.monthly_salary')}}">
                <i class="flaticon-004-bar-chart"></i>
                <span class="nav-text">Employee Monthly Salary</span>
                </a>
                </li>
                </div>
        </div>
        
        
        </div>
        </div>
    </div>

    </ul>	

<div class="copyright">
<p><strong>PP4E Admin Dashboard</strong> © 2021 All Rights Reserved</p>
<p class="fs-12">Made <span class="heart"></span> by PP4E</p>
</div>
</div>
</div>