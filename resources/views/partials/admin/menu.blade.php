@php
    $logo = URL::TO('assets/images');

    $company_logo = Utility::getValByName('company_logo_dark');
    $company_logos = Utility::getValByName('company_logo_light');
    $setting = \App\Models\Utility::settings();
    $emailTemplate = \App\Models\EmailTemplate::first();
    $lang = Auth::user()->lang;
    $show_dashboard = \App\Models\User::show_dashboard();
@endphp

{{-- <nav class="dash-sidebar light-sidebar {{(isset($mode_setting['cust_theme_bg']) && $mode_setting['cust_theme_bg'] == 'on')?'transprent-bg':''}}"> --}}
@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <nav class="dash-sidebar light-sidebar transprent-bg">
    @else
        <nav class="dash-sidebar light-sidebar">
@endif
<div class="navbar-wrapper">
    <div class="m-header main-logo">
        <a href="#" class="b-brand">
            @if ($setting['cust_darklayout'] && $setting['cust_darklayout'] == 'on')
                <img src="{{ $logo . '/' . (isset($company_logos) && !empty($company_logos) ? 'GFS_Logo.png' : 'GFS_Logo.png') }}"
                    alt="{{ config('app.name', 'ERPGo') }}" class="logo logo-lg" style="height: 200px; ">
            @else
                <img src="{{ $logo . '/' . (isset($company_logo) && !empty($company_logo) ? 'GFS_Logo.png' : 'GFS_Logo.png') }}"
                    alt="{{ config('app.name', 'ERPGo') }}" class="logo logo-lg" style="height: 200px; ">
            @endif
        </a>
    </div>
    <div class="navbar-content">
        @if (\Auth::user()->type != 'client')
            <ul class="dash-navbar">

                <!--------------------- Start Dashboard ----------------------------------->

                @if (
                        Gate::check('show project dashboard') ||
                        Gate::check('show account dashboard') ||
                        Gate::check('show crm dashboard'))
                    <li
                        class="dash-item dash-hasmenu
                      {{ Request::segment(1) == null || Request::segment(1) == 'account-dashboard' ? 'active dash-trigger' : '' }}">
                        <a href="{{ route('dashboard') }}" class="dash-link">
                            <span class="dash-micon">
                                <i class="ti ti-home"></i>
                            </span>
                            <span class="dash-mtext text-uppercase">{{ __('Dashboard') }}</span>
                           </a>
                           
                    </li>
                @endif

            <!--------------------- End Dashboard ----------------------------------->

            {{-- main --}}
            <li class="mt-5 mb-3 d-flex justify-content-center">
                <input type="text" id="sidebar-search" class="form-control w-75" placeholder="Search Menu" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0;">    
            </li>
            {{--  --}}
            <!--------------------- Start  Admin & Payroll ----------------------------------->

            @if ($show_dashboard == 1)
                @if (Gate::check('manage employee') || Gate::check('manage setsalary'))
                    <li
                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'holiday-calender' ||
                        Request::segment(1) == 'reports-monthly-attendance' ||
                        Request::segment(1) == 'reports-leave' ||
                        Request::segment(1) == 'reports-payroll' ||
                        Request::segment(1) == 'leavetype' ||
                        Request::segment(1) == 'leave' ||
                        Request::segment(1) == 'attendanceemployee' ||
                        Request::segment(1) == 'document-upload' ||
                        Request::segment(1) == 'document' ||
                        Request::segment(1) == 'performanceType' ||
                        Request::segment(1) == 'branch' ||
                        Request::segment(1) == 'department' ||
                        Request::segment(1) == 'designation' ||
                        Request::segment(1) == 'employee' ||
                        Request::segment(1) == 'leave_requests' ||
                        Request::segment(1) == 'holidays' ||
                        Request::segment(1) == 'policies' ||
                        Request::segment(1) == 'leave_calender' ||
                        Request::segment(1) == 'award' ||
                        Request::segment(1) == 'transfer' ||
                        Request::segment(1) == 'resignation' ||
                        Request::segment(1) == 'training' ||
                        Request::segment(1) == 'travel' ||
                        Request::segment(1) == 'promotion' ||
                        Request::segment(1) == 'complaint' ||
                        Request::segment(1) == 'warning' ||
                        Request::segment(1) == 'termination' ||
                        Request::segment(1) == 'announcement' ||
                        Request::segment(1) == 'job' ||
                        Request::segment(1) == 'job-application' ||
                        Request::segment(1) == 'candidates-job-applications' ||
                        Request::segment(1) == 'job-onboard' ||
                        Request::segment(1) == 'custom-question' ||
                        Request::segment(1) == 'interview-schedule' ||
                        Request::segment(1) == 'career' ||
                        Request::segment(1) == 'holiday' ||
                        Request::segment(1) == 'setsalary' ||
                        Request::segment(1) == 'payslip' ||
                        Request::segment(1) == 'paysliptype' ||
                        Request::segment(1) == 'company-policy' ||
                        Request::segment(1) == 'job-stage' ||
                        Request::segment(1) == 'job-category' ||
                        Request::segment(1) == 'terminationtype' ||
                        Request::segment(1) == 'awardtype' ||
                        Request::segment(1) == 'trainingtype' ||
                        Request::segment(1) == 'goaltype' ||
                        Request::segment(1) == 'paysliptype' ||
                        Request::segment(1) == 'allowanceoption' ||
                        Request::segment(1) == 'competencies' ||
                        Request::segment(1) == 'loanoption' ||
                        Request::segment(1) == 'employee-documents' ||
                        Request::segment(1) == 'employee-document-types' ||
                        Request::segment(1) == 'deductionoption'
                            ? 'active dash-trigger'
                            : '' }}">
                        <a href="#!" class="dash-link "><span class="dash-micon"><i
                                    class="fa-solid fa-chart-simple"></i></span><span
                                class="dash-mtext text-uppercase">{{ __('Admin & Payroll') }}</span><span class="dash-arrow">
                                <i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="dash-submenu">
                            @if ($show_dashboard == 1)
                                @can('show hrm dashboard')
                                    <li class="dash-item dash-hasmenu">
                                        <a class="dash-link" href="#">{{ __('Employee Management') }}<span
                                                class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                        <ul class="dash-submenu">
                                            {{-- <li
                                                class="dash-item {{ \Request::route()->getName() == 'hrm.dashboard' ? ' active' : '' }}">
                                                <a class="dash-link"
                                                    href="{{ route('hrm.dashboard') }}">{{ __('Dashboard') }}</a>
                                            </li> --}}
                                            @can('manage report')
                                                <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'reports-monthly-attendance' || Request::segment(1) == 'reports-leave' || Request::segment(1) == 'reports-payroll' ? 'active dash-trigger' : '' }}"
                                                    href="#hr-report" data-toggle="collapse" role="button"
                                                    aria-expanded="{{ Request::segment(1) == 'reports-monthly-attendance' || Request::segment(1) == 'reports-leave' || Request::segment(1) == 'reports-payroll' ? 'true' : 'false' }}">
                                                    <a class="dash-link" href="#">{{ __('Reports') }}<span
                                                            class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                                    <ul class="dash-submenu">
                                                        <li
                                                            class="dash-item {{ request()->is('reports-payroll') ? 'active' : '' }}">
                                                            <a class="dash-link"
                                                                href="{{ route('report.payroll') }}">{{ __('Payroll') }}</a>
                                                        </li>
                                                        <li
                                                            class="dash-item {{ request()->is('reports-leave') ? 'active' : '' }}">
                                                            <a class="dash-link"
                                                                href="{{ route('report.leave') }}">{{ __('Leave') }}</a>
                                                        </li>
                                                        <li
                                                            class="dash-item {{ request()->is('reports-monthly-attendance') ? 'active' : '' }}">
                                                            <a class="dash-link"
                                                                href="{{ route('report.monthly.attendance') }}">{{ __('Monthly Attendance') }}</a>
                                                        </li>

                                                    </ul>
                                                </li>
                                            @endcan
                                            <li
                                                class="dash-item  {{ Request::segment(1) == 'employee' ? 'active dash-trigger' : '' }}   ">
                                                @if (\Auth::user()->type == 'Employee')
                                                    @php
                                                        $employee = App\Models\Employee::where('user_id', \Auth::user()->id)->first();
                                                    @endphp
                                                    <a class="dash-link"
                                                        href="{{ route('employee.show', \Illuminate\Support\Facades\Crypt::encrypt($employee->id)) }}">{{ __('Employee') }}</a>
                                                @else
                                                    <a href="{{ route('employee.index') }}" class="dash-link">
                                                        {{ __('Employee Setup') }}
                                                    </a>
                                                @endif
                                            </li>
                                            {{-- @if (Gate::check('manage employee documents')) --}}
                                                <li
                                                    class="dash-item dash-hasmenu  {{ Request::segment(1) == 'employee-documents' || Request::segment(1) == 'employee-document-types' ? 'active dash-trigger' : '' }}">
                                                    <a class="dash-link" href="#">{{ __('Employee Documents') }}<span
                                                            class="dash-arrow"><i
                                                                data-feather="chevron-right"></i></span></a>
                                                    <ul class="dash-submenu">
                                                        {{-- @can('manage employee documents') --}}
                                                            <li
                                                                class="dash-item {{ request()->is('employee-documents*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('employee-documents.index') }}">{{ __('Documents') }}</a>
                                                            </li>
                                                        {{-- @endcan --}}
                                                        {{-- @can('manage employee document types') --}}
                                                            <li
                                                                class="dash-item {{ request()->is('employee-document-types*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('employee-document-types.index') }}">{{ __('Document Types') }}</a>
                                                            </li>
                                                        {{-- @endcan --}}
                                                    </ul>
                                                </li>
                                            {{-- @endif --}}
                                            @if (Gate::check('manage set salary') || Gate::check('manage pay slip'))
                                                <li
                                                    class="dash-item dash-hasmenu  {{ Request::segment(1) == 'setsalary' || Request::segment(1) == 'payslip' ? 'active dash-trigger' : '' }}">
                                                    <a class="dash-link" href="#">{{ __('Payroll Setup') }}<span
                                                            class="dash-arrow"><i
                                                                data-feather="chevron-right"></i></span></a>
                                                    <ul class="dash-submenu">
                                                        @can('manage set salary')
                                                            <li
                                                                class="dash-item {{ request()->is('setsalary*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('setsalary.index') }}">{{ __('Set salary') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage pay slip')
                                                            <li
                                                                class="dash-item {{ request()->is('payslip*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('payslip.index') }}">{{ __('Payslip') }}</a>
                                                            </li>
                                                        @endcan
                                                    </ul>
                                                </li>
                                            @endif
                                            
                                            @if (Gate::check('manage leave') || Gate::check('manage attendance'))
                                                <li
                                                    class="dash-item dash-hasmenu  {{ Request::segment(1) == 'leave' || Request::segment(1) == 'attendanceemployee' ? 'active dash-trigger' : '' }}">
                                                    <a class="dash-link"
                                                        href="#">{{ __('Leave Management Setup') }}<span
                                                            class="dash-arrow"><i
                                                                data-feather="chevron-right"></i></span></a>
                                                    <ul class="dash-submenu">
                                                        @can('manage leave')
                                                            <li
                                                                class="dash-item {{ Request::route()->getName() == 'leave.index' ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('leave.index') }}">{{ __('Manage Leave') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage attendance')
                                                            <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'attendanceemployee' ? 'active dash-trigger' : '' }}"
                                                                href="#navbar-attendance" data-toggle="collapse" role="button"
                                                                aria-expanded="{{ Request::segment(1) == 'attendanceemployee' ? 'true' : 'false' }}">
                                                                <a class="dash-link" href="#">{{ __('Attendance') }}<span
                                                                        class="dash-arrow"><i
                                                                            data-feather="chevron-right"></i></span></a>
                                                                <ul class="dash-submenu">
                                                                    <li
                                                                        class="dash-item {{ Request::route()->getName() == 'attendanceemployee.index' ? 'active' : '' }}">
                                                                        <a class="dash-link"
                                                                            href="{{ route('attendanceemployee.index') }}">{{ __('Mark Attendance') }}</a>
                                                                    </li>
                                                                    @can('create attendance')
                                                                        <li
                                                                            class="dash-item {{ Request::route()->getName() == 'attendanceemployee.bulkattendance' ? 'active' : '' }}">
                                                                            <a class="dash-link"
                                                                                href="{{ route('attendanceemployee.bulkattendance') }}">{{ __('Bulk Attendance') }}</a>
                                                                        </li>
                                                                    @endcan
                                                                </ul>
                                                            </li>
                                                        @endcan
                                                    </ul>
                                                </li>
                                            @endif


                                            @if (Gate::check('manage indicator') || Gate::check('manage appraisal') || Gate::check('manage goal tracking'))
                                                <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'indicator' || Request::segment(1) == 'appraisal' || Request::segment(1) == 'goaltracking' ? 'active dash-trigger' : '' }}"
                                                    href="#navbar-performance" data-toggle="collapse" role="button"
                                                    aria-expanded="{{ Request::segment(1) == 'indicator' || Request::segment(1) == 'appraisal' || Request::segment(1) == 'goaltracking' ? 'true' : 'false' }}">
                                                    <a class="dash-link"
                                                        href="#">{{ __('Performance Setup') }}<span
                                                            class="dash-arrow"><i
                                                                data-feather="chevron-right"></i></span></a>
                                                    <ul
                                                        class="dash-submenu {{ Request::segment(1) == 'indicator' || Request::segment(1) == 'appraisal' || Request::segment(1) == 'goaltracking' ? 'show' : 'collapse' }}">
                                                        @can('manage indicator')
                                                            <li
                                                                class="dash-item {{ request()->is('indicator*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('indicator.index') }}">{{ __('Indicator') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage appraisal')
                                                            <li
                                                                class="dash-item {{ request()->is('appraisal*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('appraisal.index') }}">{{ __('Appraisal') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage goal tracking')
                                                            <li
                                                                class="dash-item  {{ request()->is('goaltracking*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('goaltracking.index') }}">{{ __('Goal Tracking') }}</a>
                                                            </li>
                                                        @endcan
                                                    </ul>
                                                </li>
                                            @endif

                                            @if (Gate::check('manage training') || Gate::check('manage trainer'))
                                                <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'trainer' || Request::segment(1) == 'training' ? 'active dash-trigger' : '' }}"
                                                    href="#navbar-training" data-toggle="collapse" role="button"
                                                    aria-expanded="{{ Request::segment(1) == 'trainer' || Request::segment(1) == 'training' ? 'true' : 'false' }}">
                                                    <a class="dash-link" href="#">{{ __('Training Setup') }}<span
                                                            class="dash-arrow"><i
                                                                data-feather="chevron-right"></i></span></a>
                                                    <ul class="dash-submenu">
                                                        @can('manage training')
                                                            <li
                                                                class="dash-item {{ request()->is('training*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('training.index') }}">{{ __('Training List') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage trainer')
                                                            <li
                                                                class="dash-item {{ request()->is('trainer*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('trainer.index') }}">{{ __('Trainer') }}</a>
                                                            </li>
                                                        @endcan

                                                    </ul>
                                                </li>
                                            @endif

                                            @if (Gate::check('manage job') ||
                                                    Gate::check('create job') ||
                                                    Gate::check('manage job application') ||
                                                    Gate::check('manage custom question') ||
                                                    Gate::check('show interview schedule') ||
                                                    Gate::check('show career'))
                                                <li
                                                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'job' || Request::segment(1) == 'job-application' || Request::segment(1) == 'candidates-job-applications' || Request::segment(1) == 'job-onboard' || Request::segment(1) == 'custom-question' || Request::segment(1) == 'interview-schedule' || Request::segment(1) == 'career' ? 'active dash-trigger' : '' }}    ">
                                                    <a class="dash-link"
                                                        href="#">{{ __('Recruitment Setup') }}<span
                                                            class="dash-arrow"><i
                                                                data-feather="chevron-right"></i></span></a>
                                                    <ul class="dash-submenu">
                                                        @can('manage job')
                                                            <li
                                                                class="dash-item {{ Request::route()->getName() == 'job.index' || Request::route()->getName() == 'job.create' || Request::route()->getName() == 'job.edit' || Request::route()->getName() == 'job.show' ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('job.index') }}">{{ __('Jobs') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('create job')
                                                            <li
                                                                class="dash-item {{ Request::route()->getName() == 'job.create' ? 'active' : '' }} ">
                                                                <a class="dash-link"
                                                                    href="{{ route('job.create') }}">{{ __('Job Create') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage job application')
                                                            <li
                                                                class="dash-item {{ request()->is('job-application*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('job-application.index') }}">{{ __('Job Application') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage job application')
                                                            <li
                                                                class="dash-item {{ request()->is('candidates-job-applications') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('job.application.candidate') }}">{{ __('Job Candidate') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage job application')
                                                            <li
                                                                class="dash-item {{ request()->is('job-onboard*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('job.on.board') }}">{{ __('Job On-boarding') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage custom question')
                                                            <li
                                                                class="dash-item  {{ request()->is('custom-question*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('custom-question.index') }}">{{ __('Custom Question') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('show interview schedule')
                                                            <li
                                                                class="dash-item {{ request()->is('interview-schedule*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('interview-schedule.index') }}">{{ __('Interview Schedule') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('show career')
                                                            <li
                                                                class="dash-item {{ request()->is('career*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('career', [\Auth::user()->creatorId(), $lang]) }}">{{ __('Career') }}</a>
                                                            </li>
                                                        @endcan
                                                    </ul>
                                                </li>
                                            @endif

                                            @if (Gate::check('manage award') ||
                                                    Gate::check('manage transfer') ||
                                                    Gate::check('manage resignation') ||
                                                    Gate::check('manage travel') ||
                                                    Gate::check('manage promotion') ||
                                                    Gate::check('manage complaint') ||
                                                    Gate::check('manage warning') ||
                                                    Gate::check('manage termination') ||
                                                    Gate::check('manage announcement') ||
                                                    Gate::check('manage holiday'))
                                                <li
                                                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'holiday-calender' || Request::segment(1) == 'holiday' || Request::segment(1) == 'policies' || Request::segment(1) == 'award' || Request::segment(1) == 'transfer' || Request::segment(1) == 'resignation' || Request::segment(1) == 'travel' || Request::segment(1) == 'promotion' || Request::segment(1) == 'complaint' || Request::segment(1) == 'warning' || Request::segment(1) == 'termination' || Request::segment(1) == 'announcement' || Request::segment(1) == 'competencies' ? 'active dash-trigger' : '' }}">
                                                    <a class="dash-link" href="#">{{ __('HR Admin Setup') }}<span
                                                            class="dash-arrow"><i
                                                                data-feather="chevron-right"></i></span></a>
                                                    <ul class="dash-submenu">
                                                        @can('manage award')
                                                            <li
                                                                class="dash-item {{ request()->is('award*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('award.index') }}">{{ __('Award') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage transfer')
                                                            <li
                                                                class="dash-item  {{ request()->is('transfer*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('transfer.index') }}">{{ __('Transfer') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage resignation')
                                                            <li
                                                                class="dash-item {{ request()->is('resignation*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('resignation.index') }}">{{ __('Resignation') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage travel')
                                                            <li
                                                                class="dash-item {{ request()->is('travel*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('travel.index') }}">{{ __('Trip') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage promotion')
                                                            <li
                                                                class="dash-item {{ request()->is('promotion*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('promotion.index') }}">{{ __('Promotion') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage complaint')
                                                            <li
                                                                class="dash-item {{ request()->is('complaint*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('complaint.index') }}">{{ __('Complaints') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage warning')
                                                            <li
                                                                class="dash-item {{ request()->is('warning*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('warning.index') }}">{{ __('Warning') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage termination')
                                                            <li
                                                                class="dash-item {{ request()->is('termination*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('termination.index') }}">{{ __('Termination') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage announcement')
                                                            <li
                                                                class="dash-item {{ request()->is('announcement*') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('announcement.index') }}">{{ __('Announcement') }}</a>
                                                            </li>
                                                        @endcan
                                                        @can('manage holiday')
                                                            <li
                                                                class="dash-item {{ request()->is('holiday*') || request()->is('holiday-calender') ? 'active' : '' }}">
                                                                <a class="dash-link"
                                                                    href="{{ route('holiday.index') }}">{{ __('Holidays') }}</a>
                                                            </li>
                                                        @endcan
                                                    </ul>
                                                </li>
                                            @endif
                                            @can('manage event')
                                                <li class="dash-item {{ request()->is('event*') ? 'active' : '' }}">
                                                    <a class="dash-link"
                                                        href="{{ route('event.index') }}">{{ __('Event Setup') }}</a>
                                                </li>
                                            @endcan
                                            @can('manage meeting')
                                                <li class="dash-item {{ request()->is('meeting*') ? 'active' : '' }}">
                                                    <a class="dash-link"
                                                        href="{{ route('meeting.index') }}">{{ __('Meeting') }}</a>
                                                </li>
                                            @endcan
                                            @can('manage assets')
                                                <li
                                                    class="dash-item {{ request()->is('account-assets*') ? 'active' : '' }}">
                                                    <a class="dash-link"
                                                        href="{{ route('account-assets.index') }}">{{ __('Employees Asset Setup ') }}</a>
                                                </li>
                                            @endcan
                                            @can('manage document')
                                                <li
                                                    class="dash-item {{ request()->is('document-upload*') ? 'active' : '' }}">
                                                    <a class="dash-link"
                                                        href="{{ route('document-upload.index') }}">{{ __('Document Setup') }}</a>
                                                </li>
                                            @endcan
                                            @can('manage company policy')
                                                <li
                                                    class="dash-item {{ request()->is('company-policy*') ? 'active' : '' }}">
                                                    <a class="dash-link"
                                                        href="{{ route('company-policy.index') }}">{{ __('Company policy') }}</a>
                                                </li>
                                            @endcan
                                            
                                            @if (\Auth::user()->type == 'company' || \Auth::user()->type == 'HR')
                                                <li
                                                    class="dash-item {{ request()->is('company-policy*') ? 'active' : '' }}">
                                                    <a class="dash-link"
                                                        href="{{ route('employees.contract.index') }}">{{ __('Employee Contract Management') }}</a>
                                                </li>
                                            @endif

                                            @if (\Auth::user()->type == 'company' || \Auth::user()->type == 'HR')
                                                <li
                                                    class="dash-item {{ Request::segment(1) == 'leavetype' ||
                                                    Request::segment(1) == 'document' ||
                                                    Request::segment(1) == 'performanceType' ||
                                                    Request::segment(1) == 'branch' ||
                                                    Request::segment(1) == 'department' ||
                                                    Request::segment(1) == 'designation' ||
                                                    Request::segment(1) == 'job-stage' ||
                                                    Request::segment(1) == 'performanceType' ||
                                                    Request::segment(1) == 'job-category' ||
                                                    Request::segment(1) == 'terminationtype' ||
                                                    Request::segment(1) == 'awardtype' ||
                                                    Request::segment(1) == 'trainingtype' ||
                                                    Request::segment(1) == 'goaltype' ||
                                                    Request::segment(1) == 'paysliptype' ||
                                                    Request::segment(1) == 'allowanceoption' ||
                                                    Request::segment(1) == 'loanoption' ||
                                                    Request::segment(1) == 'deductionoption'
                                                        ? 'active dash-trigger'
                                                        : '' }}">
                                                    <a class="dash-link"
                                                        href="{{ route('branch.index') }}">{{ __('HRM System Setup') }}</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                @endcan

                                @can('manage report')
                                    <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'reports-monthly-attendance' || Request::segment(1) == 'reports-leave' || Request::segment(1) == 'reports-payroll' ? 'active dash-trigger' : '' }}"
                                        href="#hr-report" data-toggle="collapse" role="button"
                                        aria-expanded="{{ Request::segment(1) == 'reports-monthly-attendance' || Request::segment(1) == 'reports-leave' || Request::segment(1) == 'reports-payroll' ? 'true' : 'false' }}">
                                        <a class="dash-link" href="#">{{ __('Contract Managment') }}<span
                                                class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                        <ul class="dash-submenu">
                                            <li
                                                class="dash-item {{ request()->is('contract') ? 'active' : '' }}">
                                                <a class="dash-link"
                                                    href="{{ route('contract.index') }}">{{ __('All Contract') }}</a>
                                            </li>
                                            <li
                                                class="dash-item {{ request()->is('contractType') ? 'active' : '' }}">
                                                <a class="dash-link"
                                                    href="{{ route('contractType.index') }}">{{ __('Contract Type') }}</a>
                                            </li>

                                        </ul>
                                    </li>
                                @endcan
                                @can('expense report')
                                    <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'reports-monthly-attendance' || Request::segment(1) == 'reports-leave' || Request::segment(1) == 'reports-payroll' ? 'active dash-trigger' : '' }}"
                                        href="#hr-report" data-toggle="collapse" role="button"
                                        aria-expanded="{{ Request::segment(1) == 'reports-monthly-attendance' || Request::segment(1) == 'reports-leave' || Request::segment(1) == 'reports-payroll' ? 'true' : 'false' }}">
                                        <a class="dash-link" href="#">{{ __('Expense Managment') }}<span
                                                class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                        <ul class="dash-submenu">
                                            <li class="dash-item {{ (Request::route()->getName() == 'report.expense.summary' ) ? ' active' : '' }}">
                                                <a class="dash-link" href="{{route('report.expense.summary')}}">{{__('Expense Summary')}}</a>
                                            </li>
                                            <li class="dash-item {{ (Request::route()->getName() == 'expense.index' || Request::route()->getName() == 'expense.create' || Request::route()->getName() == 'expense.edit' || Request::route()->getName() == 'expense.show') ? ' active' : '' }}">
                                                <a class="dash-link" href="{{ route('expense.index') }}">{{__('Expense')}}</a>
                                            </li>

                                        </ul>
                                    </li>
                                
                                @endcan
                                @can('bill report')
                            <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'reports-monthly-attendance' || Request::segment(1) == 'reports-leave' || Request::segment(1) == 'reports-payroll' ? 'active dash-trigger' : '' }}"
                                href="#hr-report" data-toggle="collapse" role="button"
                                aria-expanded="{{ Request::segment(1) == 'reports-monthly-attendance' || Request::segment(1) == 'reports-leave' || Request::segment(1) == 'reports-payroll' ? 'true' : 'false' }}">
                                <a class="dash-link" href="#">{{ __('Billing Managment') }}<span
                                        class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                <ul class="dash-submenu">
                                    <li class="dash-item {{ (Request::route()->getName() == 'report.bill.summary' ) ? ' active' : '' }}">
                                        <a class="dash-link" href="{{route('report.bill.summary')}}">{{__('Bill Summary')}}</a>
                                    </li>
                                    <li class="dash-item {{ (Request::route()->getName() == 'bill.index' || Request::route()->getName() == 'bill.create' || Request::route()->getName() == 'bill.edit' || Request::route()->getName() == 'bill.show') ? ' active' : '' }}">
                                        <a class="dash-link" href="{{ route('bill.index') }}">{{__('Bill')}}</a>
                                    </li>

                                </ul>
                            </li>
                            
                            @endcan

                            @endif



                            @if(\Auth::user()->type!='super admin' && ( Gate::check('manage user') || Gate::check('manage role') || Gate::check('manage client')))
                                <li class="dash-item dash-hasmenu {{ (Request::segment(1) == 'users' || Request::segment(1) == 'roles'
                                    || Request::segment(1) == 'clients'  || Request::segment(1) == 'userlogs')?' active dash-trigger':''}}">
                                    <a href="#!" class="dash-link {{ (Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'clients')?' active dash-trigger':''}}"
                                    >{{__('User Management')}}<span class="dash-arrow"><i data-feather="chevron-right"></i></span
                                        ></a>
                                    <ul class="dash-submenu">
                                        @can('manage user')
                                            <li class="dash-item {{ (Request::route()->getName() == 'users.index' || Request::route()->getName() == 'users.create' || Request::route()->getName() == 'users.edit' || Request::route()->getName() == 'user.userlog') ? ' active' : '' }}">
                                                <a class="dash-link" href="{{ route('users.index') }}">{{__('User')}}</a>
                                            </li>
                                        @endcan
                                        @can('manage role')
                                            <li class="dash-item {{ (Request::route()->getName() == 'roles.index' || Request::route()->getName() == 'roles.create' || Request::route()->getName() == 'roles.edit') ? ' active' : '' }} ">
                                                <a class="dash-link" href="{{route('roles.index')}}">{{__('Role')}}</a>
                                            </li>
                                        @endcan
                                        @can('manage client')
                                            <li class="dash-item {{ (Request::route()->getName() == 'clients.index' || Request::segment(1) == 'clients' || Request::route()->getName() == 'clients.edit') ? ' active' : '' }}">
                                                <a class="dash-link" href="{{ route('clients.index') }}">{{__('Client')}}</a>
                                            </li>
                                        @endcan
                                        {{-- @can('manage user')
                                            <li class="dash-item {{ (Request::route()->getName() == 'users.index' || Request::segment(1) == 'users' || Request::route()->getName() == 'users.edit') ? ' active' : '' }}">
                                                <a class="dash-link" href="{{ route('user.userlog') }}">{{__('User Logs')}}</a>
                                            </li>
                                        @endcan --}}
                                    </ul>
                                </li>
                            @endif



                        </ul>
                    </li>
                @endif
            @endif

            <!--------------------- End Admin & Payroll ----------------------------------->

            
            <!--------------------- Start Operations & transport ----------------------------------->

            @if ($show_dashboard == 1)
                @if (Gate::check('manage customer') ||
                        Gate::check('manage vender') ||
                        Gate::check('manage customer') ||
                        Gate::check('manage vender') ||
                        Gate::check('manage proposal') ||
                        Gate::check('manage bank account') ||
                        Gate::check('manage bank transfer') ||
                        Gate::check('manage invoice') ||
                        Gate::check('manage revenue') ||
                        Gate::check('manage credit note') ||
                        Gate::check('manage bill') ||
                        Gate::check('manage payment') ||
                        Gate::check('manage debit note') ||
                        Gate::check('manage chart of account') ||
                        Gate::check('manage journal entry') ||
                        Gate::check('balance sheet report') ||
                        Gate::check('ledger report') ||
                        Gate::check('trial balance report'))
                    <li
                        class="dash-item dash-hasmenu {{ Request::route()->getName() == 'print-setting' ||
                        Request::segment(1) == 'customer' ||
                        Request::segment(1) == 'vender' ||
                        Request::segment(1) == 'proposal' ||
                        Request::segment(1) == 'bank-account' ||
                        Request::segment(1) == 'bank-transfer' ||
                        Request::segment(1) == 'invoice' ||
                        Request::segment(1) == 'revenue' ||
                        Request::segment(1) == 'credit-note' ||
                        Request::segment(1) == 'taxes' ||
                        Request::segment(1) == 'product-category' ||
                        Request::segment(1) == 'product-unit' ||
                        Request::segment(1) == 'payment-method' ||
                        Request::segment(1) == 'custom-field' ||
                        Request::segment(1) == 'chart-of-account-type' ||
                        (Request::segment(1) == 'transaction' &&
                            Request::segment(2) != 'ledger' &&
                            Request::segment(2) != 'balance-sheet' &&
                            Request::segment(2) != 'trial-balance') ||
                        Request::segment(1) == 'goal' ||
                        Request::segment(1) == 'budget' ||
                        Request::segment(1) == 'chart-of-account' ||
                        Request::segment(1) == 'journal-entry' ||
                        Request::segment(2) == 'ledger' ||
                        Request::segment(2) == 'balance-sheet' ||
                        Request::segment(2) == 'trial-balance' ||
                        Request::segment(1) == 'bill' ||
                        Request::segment(1) == 'expense' ||
                        Request::segment(1) == 'payment' ||
                        Request::segment(1) == 'debit-note'
                            ? ' active dash-trigger'
                            : '' }}">
                        <a href="#" class="dash-link"><span class="dash-micon"><i
                                    class="fa-solid fa-truck"></i></span><span
                                class="dash-mtext text-uppercase">{{ __('Operation & Transport') }}</span><span class="dash-arrow">
                                <i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="dash-submenu">
                            @if (Gate::check('manage goal'))
                            <li class="dash-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
                                <a class="dash-link"
                                    href="{{ route('shipment.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                        @endif

                            {{-- @if (Gate::check('manage bank account') || Gate::check('manage bank transfer')) --}}
                            <li
                                class="dash-item dash-hasmenu {{ Request::segment(1) == 'add-shipment' ? 'active dash-trigger' : '' }}">
                                <a class="dash-link" href="#">{{ __('Shipment Management') }}<span
                                        class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                <ul class="dash-submenu">
                                    @if (Gate::check('manage goal'))
                                    <li
                                        class="dash-item {{ Request::route()->getName() == 'shipment.create' ? ' active' : '' }}">
                                        <a class="dash-link"
                                            href="{{ route('shipment.create') }}">{{ __('Add Shipment') }}</a>
                                    </li>
                                    @endif
                                    @if (Gate::check('manage goal'))
                                    <li
                                        class="dash-item {{ Request::route()->getName() == 'shipment.all.show' ? ' active' : '' }}">
                                        <a class="dash-link"
                                            href="{{ route('shipment.all.show') }}">{{ __('All Shipment') }}</a>
                                    </li>
                                    @endif
                                    <li
                                        class="dash-item {{ Request::route()->getName() == 'shipment.track' ? ' active' : '' }}">
                                        <a class="dash-link"
                                            href="{{ route('shipment.track') }}">{{ __('Track Shipment') }}</a>
                                    </li>
                                   
                                    <li
                                            class="dash-item {{ Request::route()->getName() == 'invoice.index' || Request::route()->getName() == 'invoice.create' || Request::route()->getName() == 'invoice.edit' || Request::route()->getName() == 'invoice.show' ? ' active' : '' }}">
                                            <a class="dash-link"
                                                href="{{ route('invoice.index') }}">{{ __('Invoice') }}</a>
                                        </li>
                                 
                                </ul>
                            </li>
                            {{-- @endif --}}

                            @if( Gate::check('manage product & service') || Gate::check('manage product & service'))
                            <li class="dash-item dash-hasmenu">
                                <a href="#!" class="dash-link ">
                                    <span class="dash-mtext">{{__('Inventory Managment')}}</span><span class="dash-arrow">
                                            <i data-feather="chevron-right"></i></span>
                                </a>
                                <ul class="dash-submenu">
                                    @if(Gate::check('manage product & service'))
                                        <li class="dash-item {{ (Request::segment(1) == 'productservice')?'active':''}}">
                                            <a href="{{ route('productservice.index') }}" class="dash-link">{{__('Product & Services')}}
                                            </a>
                                        </li>
                                    @endif
                                    @if(Gate::check('manage product & service'))
                                        <li class="dash-item {{ (Request::segment(1) == 'productstock')?'active':''}}">
                                            <a href="{{ route('productstock.index') }}" class="dash-link">{{__('Product Stock')}}
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                            @if( Gate::check('manage warehouse') ||  Gate::check('manage purchase')  || Gate::check('manage pos') || Gate::check('manage print settings'))
                            <li class="dash-item dash-hasmenu {{ (Request::segment(1) == 'warehouse' || Request::segment(1) == 'purchase' || Request::route()->getName() == 'pos.barcode' || Request::route()->getName() == 'pos.print' || Request::route()->getName() == 'pos.show')?' active dash-trigger':''}}">
                                <a href="#!" class="dash-link"><span class="dash-mtext">{{__('Warehouse management')}}</span><span class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                <ul class="dash-submenu {{ (Request::segment(1) == 'warehouse' || Request::segment(1) == 'purchase' || Request::route()->getName() == 'pos.barcode' || Request::route()->getName() == 'pos.print' || Request::route()->getName() == 'pos.show')?'show':''}}">
                                    <li class="dash-item {{ request()->is('reports-warehouse') ? 'active' : '' }}">
                                        <a class="dash-link" href="{{ route('report.warehouse') }}">{{__('Warehouse Report')}}</a>
                                    </li>
                                @if(Gate::check('manage vender'))
                                    <li class="dash-item {{ (Request::segment(1) == 'vender')?'active':''}}">
                                        <a class="dash-link" href="{{ route('vender.index') }}">{{__('Suppiler')}}</a>
                                    </li>
                                @endif
                                    @can('manage warehouse')
                                    <li class="dash-item {{ (Request::route()->getName() == 'warehouse.index' || Request::route()->getName() == 'warehouse.show') ? ' active' : '' }}"><a class="dash-link" href="{{ route('warehouse.index') }}">{{__('Warehouse')}}</a>
                                    </li>
                                @endcan
                                @can('manage purchase')
                                        <li class="dash-item {{ (Request::route()->getName() == 'purchase.index' || Request::route()->getName() == 'purchase.create' || Request::route()->getName() == 'purchase.edit' || Request::route()->getName() == 'purchase.show') ? ' active' : '' }}">
                                            <a class="dash-link" href="{{ route('purchase.index') }}">{{__('Purchase')}}</a>
                                        </li>
                                 @endcan
                                </ul>
                            </li>
                            @endif
                           


                        </ul>
                    </li>
                @endif
            @endif

            <!--------------------- End Operations & transport ----------------------------------->


             <!--------------------- Start Legal Contract ----------------------------------->

             @if ($show_dashboard == 1)
                @if (Gate::check('manage lead') ||
                        Gate::check('manage deal') ||
                        Gate::check('manage form builder') ||
                        Gate::check('manage contract'))
                    <li
                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'stages' || Request::segment(1) == 'labels' || Request::segment(1) == 'sources' || Request::segment(1) == 'lead_stages' || Request::segment(1) == 'pipelines' || Request::segment(1) == 'deals' || Request::segment(1) == 'leads' || Request::segment(1) == 'form_builder' || Request::segment(1) == 'form_response' || Request::segment(1) == 'contract' ? ' active dash-trigger' : '' }}">
                        <a href="#!" class="dash-link">
                            <span class="dash-micon">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 3H14V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0H8C7.46957 0 6.96086 0.210714 6.58579 0.585786C6.21071 0.960859 6 1.46957 6 2V3H3C2.20435 3 1.44129 3.31607 0.87868 3.87868C0.316071 4.44129 0 5.20435 0 6V15C0 15.7956 0.316071 16.5587 0.87868 17.1213C1.44129 17.6839 2.20435 18 3 18H17C17.7956 18 18.5587 17.6839 19.1213 17.1213C19.6839 16.5587 20 15.7956 20 15V6C20 5.20435 19.6839 4.44129 19.1213 3.87868C18.5587 3.31607 17.7956 3 17 3ZM8 2H12V3H8V2ZM18 15C18 15.2652 17.8946 15.5196 17.7071 15.7071C17.5196 15.8946 17.2652 16 17 16H3C2.73478 16 2.48043 15.8946 2.29289 15.7071C2.10536 15.5196 2 15.2652 2 15V9.39L6.68 11C6.78618 11.0144 6.89382 11.0144 7 11H13C13.1084 10.998 13.2161 10.9812 13.32 10.95L18 9.39V15ZM18 7.28L12.84 9H7.16L2 7.28V6C2 5.73478 2.10536 5.48043 2.29289 5.29289C2.48043 5.10536 2.73478 5 3 5H17C17.2652 5 17.5196 5.10536 17.7071 5.29289C17.8946 5.48043 18 5.73478 18 6V7.28Z" fill="#7D8198"/>
                                </svg>
                            </span>
                            <span
                                class="dash-mtext text-uppercase">{{ __('Legal') }}</span><span class="dash-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul
                            class="dash-submenu {{ Request::segment(1) == 'stages' || Request::segment(1) == 'insurance-management' || Request::segment(1) == 'sources' || Request::segment(1) == 'lead_stages' || Request::segment(1) == 'leads' || Request::segment(1) == 'form_builder' || Request::segment(1) == 'form_response' || Request::segment(1) == 'deals' || Request::segment(1) == 'pipelines' ? 'show' : '' }}">
                        
                                    {{-- start --}}
                                @if (\Auth::user()->type == 'company' || \Auth::user()->type == 'client')

                                <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'reports-monthly-attendance' || Request::segment(1) == 'reports-leave' || Request::segment(1) == 'reports-payroll' ? 'active dash-trigger' : '' }}"
                                    href="#hr-report" data-toggle="collapse" role="button"
                                    aria-expanded="{{ Request::segment(1) == 'reports-monthly-attendance' || Request::segment(1) == 'reports-leave' || Request::segment(1) == 'reports-payroll' ? 'true' : 'false' }}">
                                    <a class="dash-link" href="#">{{ __('Contract Managment') }}<span
                                            class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                    <ul class="dash-submenu">
                                        <li
                                            class="dash-item {{ request()->is('contract') ? 'active' : '' }}">
                                            <a class="dash-link"
                                                href="{{ route('contract.index') }}">{{ __('All Contract') }}</a>
                                        </li>
                                        <li
                                            class="dash-item {{ request()->is('contractType') ? 'active' : '' }}">
                                            <a class="dash-link"
                                                href="{{ route('contractType.index') }}">{{ __('Contract Type') }}</a>
                                        </li>

                                    </ul>
                                </li>
                            {{-- end --}}
                            
                            @endif
                        @can('manage complaint')
                            <li
                                class="dash-item {{ Request::route()->getName() == 'legal.dispute'  ? ' active' : '' }}">
                                <a class="dash-link" href="{{ route('disputes.index') }}">{{ __('Dispute Management') }}</a>
                            </li>

                        @endcan
                        @can('manage deal')
                            <li
                                class="dash-item {{ Request::route()->getName() == 'legal.insurance'  ? ' active' : '' }}">
                                <a class="dash-link" href="{{ route('legal.insurance') }}">{{ __('Insurance Management') }}</a>
                            </li>
                        @endcan

                        </ul>
                    </li>
                @endif
            @endif

         <!--------------------- End Legal Contract ----------------------------------->



            <!--------------------- Start Account ----------------------------------->

            @if ($show_dashboard == 1)
                @if (Gate::check('manage customer') ||
                        Gate::check('manage vender') ||
                        Gate::check('manage customer') ||
                        Gate::check('manage vender') ||
                        Gate::check('manage proposal') ||
                        Gate::check('manage bank account') ||
                        Gate::check('manage bank transfer') ||
                        Gate::check('manage invoice') ||
                        Gate::check('manage revenue') ||
                        Gate::check('manage credit note') ||
                        Gate::check('manage bill') ||
                        Gate::check('manage payment') ||
                        Gate::check('manage debit note') ||
                        Gate::check('manage chart of account') ||
                        Gate::check('manage journal entry') ||
                        Gate::check('balance sheet report') ||
                        Gate::check('ledger report') ||
                        Gate::check('trial balance report'))
                    <li
                        class="dash-item dash-hasmenu {{ Request::route()->getName() == 'print-setting' ||
                        Request::segment(1) == 'customer' ||
                        Request::segment(1) == 'vender' ||
                        Request::segment(1) == 'proposal' ||
                        Request::segment(1) == 'bank-account' ||
                        Request::segment(1) == 'bank-transfer' ||
                        Request::segment(1) == 'invoice' ||
                        Request::segment(1) == 'revenue' ||
                        Request::segment(1) == 'credit-note' ||
                        Request::segment(1) == 'taxes' ||
                        Request::segment(1) == 'product-category' ||
                        Request::segment(1) == 'product-unit' ||
                        Request::segment(1) == 'payment-method' ||
                        Request::segment(1) == 'custom-field' ||
                        Request::segment(1) == 'chart-of-account-type' ||
                        (Request::segment(1) == 'transaction' &&
                            Request::segment(2) != 'ledger' &&
                            Request::segment(2) != 'balance-sheet' &&
                            Request::segment(2) != 'trial-balance') ||
                        Request::segment(1) == 'goal' ||
                        Request::segment(1) == 'budget' ||
                        Request::segment(1) == 'chart-of-account' ||
                        Request::segment(1) == 'journal-entry' ||
                        Request::segment(2) == 'ledger' ||
                        Request::segment(2) == 'balance-sheet' ||
                        Request::segment(2) == 'trial-balance' ||
                        Request::segment(1) == 'bill' ||
                        Request::segment(1) == 'expense' ||
                        Request::segment(1) == 'payment' ||
                        Request::segment(1) == 'debit-note'
                            ? ' active dash-trigger'
                            : '' }}">
                       <a href="#!" class="dash-link">
                        <span class="dash-micon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.69141 12.2644V6.69141H10.3074V12.2644L9.49941 11.4414L8.69141 12.2644ZM13.0374 14.4954V2.69141H14.6534V12.8804L13.0374 14.4954ZM4.30741 16.6374V10.6914H5.92241V15.0224L4.30741 16.6374ZM4.19141 20.5494L9.48741 15.2534L13.0374 18.3034L19.7914 11.5494H17.4994V10.5494H21.4994V14.5494H20.4994V12.2574L13.0614 19.6954L9.51141 16.6454L5.60741 20.5494H4.19141Z" fill="#7D8198"/>
                            </svg>
                        </span>
                        <span class="dash-mtext text-uppercase">{{__('Finance & Accounting')}}</span><span class="dash-arrow">
                        <i data-feather="chevron-right"></i></span>
                </a>
                        <ul class="dash-submenu">
                        @can('show account dashboard')
                                <li class="dash-item {{ ( Request::segment(1) == null || Request::segment(1) == 'account-dashboard') ? ' active' : '' }}">
                                    <a class="dash-link" href="{{route('dashboard')}}">{{__(' Overview')}}</a>
                                </li>
                        @endcan
                            @if (Gate::check('manage invoice') || Gate::check('manage revenue') || Gate::check('manage credit note'))
                                <li
                                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'customer' || Request::segment(1) == 'proposal' || Request::segment(1) == 'invoice' || Request::segment(1) == 'revenue' || Request::segment(1) == 'credit-note' ? 'active dash-trigger' : '' }}">
                                    <a class="dash-link" href="#">{{ __('Accounting Management') }}<span
                                            class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                    <ul class="dash-submenu">
                                        {{-- start --}}
                                        <li
                                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'customer' || Request::segment(1) == 'proposal' || Request::segment(1) == 'invoice' || Request::segment(1) == 'revenue' || Request::segment(1) == 'credit-note' ? 'active dash-trigger' : '' }}">
                                        <a class="dash-link" href="#">{{ __('Invoice Management') }}<span
                                                class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                        <ul class="dash-submenu">
                                            @if(Gate::check('manage customer'))
                                            <li class="dash-item {{ (Request::segment(1) == 'customer')?'active':''}}">
                                                <a class="dash-link" href="{{route('customer.index')}}">{{__('Customer')}}</a>
                                            </li>
                                        @endif
                                        @can('invoice report')
                                            <li class="dash-item {{ (Request::route()->getName() == 'report.invoice.summary' ) ? ' active' : '' }}">
                                                <a class="dash-link" href="{{route('report.invoice.summary')}}">{{__('Invoice Summary')}}</a>
                                            </li>
                                        @endcan
                                            <li
                                                class="dash-item {{ Request::route()->getName() == 'invoice.index' || Request::route()->getName() == 'invoice.create' || Request::route()->getName() == 'invoice.edit' || Request::route()->getName() == 'invoice.show' ? ' active' : '' }}">
                                                <a class="dash-link"
                                                    href="{{ route('invoice.index') }}">{{ __('Invoice') }}</a>
                                            </li>

                                        </ul>
                                    </li>
                                    {{-- Budget Management --}}
                                <li
                                class="dash-item dash-hasmenu {{ Request::segment(1) == 'customer' || Request::segment(1) == 'proposal' || Request::segment(1) == 'invoice' || Request::segment(1) == 'revenue' || Request::segment(1) == 'credit-note' ? 'active dash-trigger' : '' }}">
                                <a class="dash-link" href="#">{{ __('Budget Management') }}<span
                                        class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                <ul class="dash-submenu">
                                @can('loss & profit report')
                                    <li class="dash-item {{ request()->is('reports-monthly-cashflow') || request()->is('reports-quarterly-cashflow') ? 'active' : '' }}">
                                        <a class="dash-link" href="{{route('report.monthly.cashflow')}}">{{__('Cash Flow')}}</a>
                                    </li>
                                 @endcan
                            @can('manage transaction')
                                <li class="dash-item {{ (Request::route()->getName() == 'transaction.index' || Request::route()->getName() == 'transfer.create' || Request::route()->getName() == 'transaction.edit') ? ' active' : '' }}">
                                    <a class="dash-link" href="{{ route('transaction.index') }}">{{__('Transaction')}}</a>
                                </li>
                            @endcan
                                    <li class="dash-item {{ (Request::route()->getName() == 'revenue.index' || Request::route()->getName() == 'revenue.create' || Request::route()->getName() == 'revenue.edit') ? ' active' : '' }}">
                                        <a class="dash-link" href="{{route('revenue.index')}}">{{__('Revenue')}}</a>
                                    </li>
                                    <li class="dash-item {{ (Request::route()->getName() == 'expense.index' || Request::route()->getName() == 'expense.create' || Request::route()->getName() == 'expense.edit' || Request::route()->getName() == 'expense.show') ? ' active' : '' }}">
                                        <a class="dash-link" href="{{ route('expense.index') }}">{{__('Expense')}}</a>
                                    </li>   

                                   
                                </ul>
                            </li>
                                        
                                    </ul>
                                </li>
                                
                            @endif

                            @if (Gate::check('manage constant tax') ||
                                    Gate::check('manage constant category') ||
                                    Gate::check('manage constant unit') ||
                                    Gate::check('manage constant payment method') ||
                                    Gate::check('manage constant custom field'))
                                <li
                                    class="dash-item {{ Request::segment(1) == 'taxes' || Request::segment(1) == 'product-category' || Request::segment(1) == 'product-unit' || Request::segment(1) == 'payment-method' || Request::segment(1) == 'custom-field' || Request::segment(1) == 'chart-of-account-type' ? 'active dash-trigger' : '' }}">
                                    <a class="dash-link"
                                        href="{{ route('taxes.index') }}">{{ __('Accounting Setup') }}</a>
                                </li>
                            @endif

                            @if (Gate::check('manage print settings'))
                                <li
                                    class="dash-item {{ Request::route()->getName() == 'print-setting' ? ' active' : '' }}">
                                    <a class="dash-link"
                                        href="{{ route('print.setting') }}">{{ __('Print Settings') }}</a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif
            @endif

            <!--------------------- End Account ----------------------------------->


            <!--------------------- Start User Managaement System ----------------------------------->


            <!--------------------- End User Managaement System----------------------------------->


            <!--------------------- Start Biz Development & Partnership ----------------------------------->
            @if($show_dashboard == 1)
                @if( Gate::check('manage lead') || Gate::check('manage deal') || Gate::check('manage form builder') || Gate::check('manage contract'))
                    <li class="dash-item dash-hasmenu {{ (Request::segment(1) == 'stages' || Request::segment(1) == 'labels' || Request::segment(1) == 'sources' || Request::segment(1) == 'lead_stages' || Request::segment(1) == 'pipelines' || Request::segment(1) == 'deals' || Request::segment(1) == 'leads'  || Request::segment(1) == 'form_builder' || Request::segment(1) == 'form_response' || Request::segment(1) == 'contract') ?' active dash-trigger':''}}">
                        <a href="#!" class="dash-link"
                        ><span class="dash-micon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.7097 8.70968C22.9597 7.45968 22.3897 5.99968 21.7097 5.28968L18.7097 2.28968C17.4497 1.03968 15.9997 1.60968 15.2897 2.28968L13.5897 3.99968H10.9997C9.09969 3.99968 7.99968 4.99968 7.43968 6.14968L2.99968 10.5897V14.5897L2.28968 15.2897C1.03968 16.5497 1.60968 17.9997 2.28968 18.7097L5.28968 21.7097C5.82968 22.2497 6.40968 22.4497 6.95968 22.4497C7.66968 22.4497 8.31968 22.0997 8.70968 21.7097L11.4097 18.9997H14.9997C16.6997 18.9997 17.5597 17.9397 17.8697 16.8997C18.9997 16.5997 19.6197 15.7397 19.8697 14.8997C21.4197 14.4997 21.9997 13.0297 21.9997 11.9997V8.99968H21.4097L21.7097 8.70968ZM19.9997 11.9997C19.9997 12.4497 19.8097 12.9997 18.9997 12.9997H17.9997V13.9997C17.9997 14.4497 17.8097 14.9997 16.9997 14.9997H15.9997V15.9997C15.9997 16.4497 15.8097 16.9997 14.9997 16.9997H10.5897L7.30968 20.2797C6.99968 20.5697 6.81968 20.3997 6.70968 20.2897L3.71968 17.3097C3.42968 16.9997 3.59968 16.8197 3.70968 16.7097L4.99968 15.4097V11.4097L6.99968 9.40968V10.9997C6.99968 12.2097 7.79969 13.9997 9.99969 13.9997C12.1997 13.9997 12.9997 12.2097 12.9997 10.9997H19.9997V11.9997ZM20.2897 7.28968L18.5897 8.99968H10.9997V10.9997C10.9997 11.4497 10.8097 11.9997 9.99969 11.9997C9.18969 11.9997 8.99968 11.4497 8.99968 10.9997V7.99968C8.99968 7.53968 9.16969 5.99968 10.9997 5.99968H14.4097L16.6897 3.71968C16.9997 3.42968 17.1797 3.59968 17.2897 3.70968L20.2797 6.68968C20.5697 6.99968 20.3997 7.17968 20.2897 7.28968Z" fill="#7D8198"/>
                            </svg>
                            </span
                            ><span class="dash-mtext text-sm text-uppercase">{{__('Business Dev & Partnership ')}}</span
                            ><span class="dash-arrow"><i data-feather="chevron-right"></i></span
                            ></a>
                        <ul class="dash-submenu {{ (Request::segment(1) == 'stages' || Request::segment(1) == 'labels' || Request::segment(1) == 'sources' || Request::segment(1) == 'lead_stages' || Request::segment(1) == 'leads'  || Request::segment(1) == 'form_builder' || Request::segment(1) == 'form_response' || Request::segment(1) == 'deals' || Request::segment(1) == 'pipelines')?'show':''}}">
                            @can('manage lead')
                                <li class="dash-item {{ (Request::route()->getName() == 'leads.list' || Request::route()->getName() == 'leads.index' || Request::route()->getName() == 'leads.show') ? ' active' : '' }}">
                                    <a class="dash-link" href="{{ route('leads.index') }}">{{__('Sales Opportunity')}}</a>
                                </li>
                            @endcan
                            @can('manage deal')
                                <li class="dash-item {{ (Request::route()->getName() == 'deals.list' || Request::route()->getName() == 'deals.index' || Request::route()->getName() == 'deals.show') ? ' active' : '' }}">
                                    <a class="dash-link" href="{{route('deals.index')}}">{{__('Prospect')}}</a>
                                </li>
                            @endcan
                        
                            @if(\Auth::user()->type=='company' || \Auth::user()->type=='client')
                                <li class="dash-item  {{ (Request::segment(1) == 'contract')?'active':''}}">
                                    <a class="dash-link" href="{{route('contract.index')}}">{{__('Contract')}}</a>
                                </li>
                            @endif
                            @if(Gate::check('manage lead stage') || Gate::check('manage pipeline') ||Gate::check('manage source') ||Gate::check('manage label') || Gate::check('manage stage'))
                                <li class="dash-item  {{(Request::segment(1) == 'stages' || Request::segment(1) == 'labels' || Request::segment(1) == 'sources' || Request::segment(1) == 'lead_stages' || Request::segment(1) == 'pipelines' || Request::segment(1) == 'product-category' || Request::segment(1) == 'product-unit' || Request::segment(1) == 'payment-method' || Request::segment(1) == 'custom-field' || Request::segment(1) == 'chart-of-account-type')? 'active dash-trigger' :''}}">
                                    <a class="dash-link" href="{{ route('pipelines.index') }}   ">{{__('CRM System Setup')}}</a>
                                                                            {{-- <ul class="dash-submenu">--}}
                                    {{--                                                @can('manage pipeline')--}}
                                    {{--                                                    <li class="dash-item  {{ (Request::route()->getName() == 'pipelines.index' ) ? ' active' : '' }}">--}}
                                    {{--                                                        <a class="dash-link" href="{{ route('pipelines.index') }}">{{__('Pipeline')}}</a>--}}
                                    {{--                                                    </li>--}}
                                    {{--                                                @endcan--}}
                                    {{--                                                @can('manage lead stage')--}}
                                    {{--                                                    <li class="dash-item {{ (Request::route()->getName() == 'lead_stages.index' ) ? 'active' : '' }}">--}}
                                    {{--                                                        <a class="dash-link" href="{{route('lead_stages.index')}}">{{__('Lead Stages')}}</a>--}}
                                    {{--                                                    </li>--}}
                                    {{--                                                @endcan--}}
                                    {{--                                                @can('manage stage')--}}
                                    {{--                                                    <li class="dash-item {{ (Request::route()->getName() == 'stages.index' ) ? 'active' : '' }}">--}}
                                    {{--                                                        <a class="dash-link" href="{{route('stages.index')}}">{{__('Deal Stages')}}</a>--}}
                                    {{--                                                    </li>--}}
                                    {{--                                                @endcan--}}
                                    {{--                                                @can('manage source')--}}
                                    {{--                                                    <li class="dash-item {{ (Request::route()->getName() == 'sources.index' ) ? ' active' : '' }}">--}}
                                    {{--                                                        <a class="dash-link" href="{{route('sources.index')}}">{{__('Sources')}}</a>--}}
                                    {{--                                                    </li>--}}
                                    {{--                                                @endcan--}}
                                    {{--                                                @can('manage label')--}}
                                    {{--                                                    <li class="dash-item {{ (Request::route()->getName() == 'labels.index' ) ? 'active' : '' }}">--}}
                                    {{--                                                        <a class="dash-link" href="{{route('labels.index')}}">{{__('Labels')}}</a>--}}
                                    {{--                                                    </li>--}}
                                    {{--                                                @endcan--}}
                                    {{--                                                <li class="dash-item {{ (Request::segment(1) == 'contractType')?'active open':''}}">--}}
                                    {{--                                                    <a class="dash-link" href="{{ route('contractType.index') }}">{{__('Contract Type')}}</a>--}}
                                    {{--                                                </li>--}}
                                    {{--                                            </ul> --}}
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            @endif
            <!--------------------- End Biz Development & Partnership ----------------------------------->

                  <!--------------------- Start Marketing & Communication ----------------------------------->

                  @if (Gate::check('manage product & service') || Gate::check('manage product & service'))
                    <li class="dash-item dash-hasmenu">
                        <a href="#!" class="dash-link ">
                            <span class="dash-micon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2835_400)">
                                    <path d="M21.375 3.15033C21.1171 2.9835 20.8222 2.88258 20.5162 2.85642C20.2102 2.83027 19.9024 2.87968 19.62 3.00033L10.365 6.64533C10.1459 6.7345 9.91156 6.78035 9.675 6.78033H3.75C3.25272 6.78033 2.77581 6.97787 2.42417 7.3295C2.07254 7.68114 1.875 8.15805 1.875 8.65533V8.80533H0V13.3053H1.875V13.5003C1.88675 13.9898 2.08947 14.4552 2.43983 14.7972C2.7902 15.1391 3.26042 15.3305 3.75 15.3303L6 20.1003C6.15236 20.4215 6.39222 20.6933 6.69204 20.8843C6.99187 21.0753 7.33949 21.178 7.695 21.1803H8.64C9.13468 21.1764 9.60775 20.9771 9.95614 20.6259C10.3045 20.2747 10.5 19.8 10.5 19.3053V15.5103L19.62 19.1553C19.8443 19.2446 20.0836 19.2904 20.325 19.2903C20.6996 19.2843 21.0643 19.1697 21.375 18.9603C21.6217 18.7937 21.8252 18.5708 21.9687 18.31C22.1121 18.0491 22.1914 17.7579 22.2 17.4603V4.69533C22.1986 4.3901 22.1228 4.08983 21.979 3.82058C21.8352 3.55133 21.6279 3.32126 21.375 3.15033ZM8.625 8.65533V13.5003H3.75V8.65533H8.625ZM8.625 19.3053H7.68L5.835 15.3303H8.625V19.3053ZM11.055 13.7253C10.8769 13.6343 10.6912 13.559 10.5 13.5003V8.55033C10.6894 8.51126 10.875 8.45606 11.055 8.38533L20.325 4.69533V17.4153L11.055 13.7253ZM22.245 9.18033V12.9303C22.7423 12.9303 23.2192 12.7328 23.5708 12.3812C23.9225 12.0295 24.12 11.5526 24.12 11.0553C24.12 10.558 23.9225 10.0811 23.5708 9.7295C23.2192 9.37787 22.7423 9.18033 22.245 9.18033Z" fill="#7D8198"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_2835_400">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                    
                            </span>
                            <span class="dash-mtext text-uppercase">{{ __('Marketing ') }}</span><span class="dash-arrow">
                                <i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="dash-submenu">
                            @if (Gate::check('manage product & service'))
                                <li class="dash-item {{ Request::segment(1) == 'market-strategy' ? 'active' : '' }}">
                                    <a href="{{ route('market.strategy') }}"
                                        class="dash-link">{{ __('Market Strategy') }}
                                    </a>
                                </li>
                            @endif
                            @if (Gate::check('manage product & service'))
                                <li class="dash-item {{ Request::segment(1) == 'market-campaigns' ? 'active' : '' }}">
                                    <a href="{{ route('market.campaigns') }}"
                                        class="dash-link">{{ __('Market Campaigns') }}
                                    </a>
                                </li>
                            @endif
                            @if (Gate::check('manage product & service'))

                            <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'reports-monthly-attendance' || Request::segment(1) == 'reports-leave' || Request::segment(1) == 'reports-payroll' ? 'active dash-trigger' : '' }}"
                                href="#hr-report" data-toggle="collapse" role="button"
                                aria-expanded="{{ Request::segment(1) == 'reports-monthly-attendance' || Request::segment(1) == 'reports-leave' || Request::segment(1) == 'reports-payroll' ? 'true' : 'false' }}">
                                <a class="dash-link" href="#">{{ __('Public relations') }}<span
                                        class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                <ul class="dash-submenu">
                                    <li class="dash-item {{ (Request::route()->getName() == 'post.all' ) ? ' active' : '' }}">
                                        <a class="dash-link" href="{{route('post.all')}}">{{__('All Posts')}}</a>
                                    </li>
                                    <li class="dash-item {{ (Request::route()->getName() == 'post.create') ? ' active' : '' }}">
                                        <a class="dash-link" href="{{ route('post.create') }}">{{__('Add Post')}}</a>
                                    </li>
                                    <li class="dash-item {{ (Request::route()->getName() == 'category.create') ? ' active' : '' }}">
                                        <a class="dash-link" href="{{ route('category.create') }}">{{__('Add Category')}}</a>
                                    </li>

                                </ul>
                            </li>
                        </ul>           
                    </li>
                    @endif
              @endif
  
              <!--------------------- End Marketing & Communication  ----------------------------------->


                  <!--------------------- Start Customer experience ----------------------------------->

                  @if (Gate::check('manage product & service') || Gate::check('manage product & service'))
                  <li class="dash-item dash-hasmenu">
                      <a href="#!" class="dash-link ">
                          <span class="dash-micon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.72 14.8408C19.07 13.9908 19.26 13.0808 19.26 12.0808C19.26 11.3608 19.15 10.6708 18.96 10.0308C18.31 10.1808 17.63 10.2608 16.92 10.2608C15.466 10.2623 14.0329 9.91428 12.7415 9.24598C11.4502 8.57768 10.3384 7.60871 9.5 6.42076C8.6031 8.59093 6.91112 10.3366 4.77 11.3008C4.73 11.5508 4.73 11.8208 4.73 12.0808C4.73 13.0355 4.91804 13.9808 5.2834 14.8629C5.64875 15.7449 6.18425 16.5463 6.85933 17.2214C8.22272 18.5848 10.0719 19.3508 12 19.3508C13.05 19.3508 14.06 19.1208 14.97 18.7108C15.54 19.8008 15.8 20.3408 15.78 20.3408C14.14 20.8908 12.87 21.1608 12 21.1608C9.58 21.1608 7.27 20.2108 5.57 18.5008C4.536 17.4699 3.76737 16.2038 3.33 14.8108H2V10.2608H3.09C3.42024 8.65327 4.17949 7.16517 5.28719 5.95435C6.39489 4.74353 7.80971 3.85516 9.38153 3.38352C10.9534 2.91187 12.6235 2.87453 14.2149 3.27546C15.8062 3.6764 17.2593 4.50065 18.42 5.66076C19.6802 6.91601 20.5398 8.51686 20.89 10.2608H22V14.8108H21.94L18.38 18.0808L13.08 17.4808V15.8108H17.91L18.72 14.8408ZM9.27 11.8508C9.57 11.8508 9.86 11.9708 10.07 12.1908C10.281 12.4035 10.3995 12.6911 10.3995 12.9908C10.3995 13.2904 10.281 13.578 10.07 13.7908C9.86 14.0008 9.57 14.1208 9.27 14.1208C8.64 14.1208 8.13 13.6208 8.13 12.9908C8.13 12.3608 8.64 11.8508 9.27 11.8508ZM14.72 11.8508C15.35 11.8508 15.85 12.3608 15.85 12.9908C15.85 13.6208 15.35 14.1208 14.72 14.1208C14.09 14.1208 13.58 13.6208 13.58 12.9908C13.58 12.6884 13.7001 12.3984 13.9139 12.1847C14.1277 11.9709 14.4177 11.8508 14.72 11.8508Z" fill="#7D8198"/>
                            </svg>    
                          </span>
                          <span class="dash-mtext text-uppercase">{{ __('Customer experience ') }}</span><span class="dash-arrow">
                              <i data-feather="chevron-right"></i></span>
                      </a>
                      <ul class="dash-submenu">
                          <li class="dash-item dash-hasmenu {{ (Request::segment(1) == 'support')?'active':''}}">
                            <a href="{{route('support.index')}}" class="dash-link">
                              <span class="dash-mtext">{{__('Customer Request')}}</span>
                            </a>
                        </li>
                          <li class="dash-item dash-hasmenu {{ (Request::segment(1) == 'support')?'active':''}}">
                            <a href="{{route('support.index')}}" class="dash-link">
                            <span class="dash-mtext">{{__('Claims management')}}</span>
                            </a>
                        </li>

                      <li class="dash-item dash-hasmenu {{ (Request::route()->getName() == 'customer.rating') ? 'active' : '' }}">
                        <a href="{{ route('customer.rating') }}" class="dash-link">
                           <span class="dash-mtext">{{ __('Customer Rating') }}</span>
                        </a>
                    </li>
                   
                      </ul>
                  </li>
              @endif
  
              <!--------------------- End Customer experience  ----------------------------------->

            <!--------------------- Start POs System ----------------------------------->

          
            <!--------------------- End POs System ----------------------------------->


                  <!--------------------- Start Messaging & Meeting ----------------------------------->

                  @if (Gate::check('manage product & service') || Gate::check('manage product & service'))
                  <li class="dash-item dash-hasmenu">
                      <a href="#!" class="dash-link ">
                          <span class="dash-micon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.5 8.11001V4.28001C6.5 4.1115 6.53327 3.94464 6.59791 3.78902C6.66255 3.63339 6.75728 3.49207 6.87667 3.37314C6.99606 3.25422 7.13776 3.16004 7.29363 3.09601C7.4495 3.03197 7.61649 2.99935 7.785 3.00001H21.47L19.32 6.72001V14.28C19.3207 14.4487 19.2878 14.6159 19.2234 14.7718C19.159 14.9277 19.0643 15.0693 18.9448 15.1884C18.8253 15.3074 18.6833 15.4016 18.5272 15.4654C18.371 15.5292 18.2037 15.5613 18.035 15.56H16.735V19.39C16.735 19.7291 16.601 20.0544 16.3622 20.2951C16.1233 20.5358 15.7991 20.6724 15.46 20.675H5.415C5.24606 20.675 5.0788 20.6416 4.92284 20.5766C4.76689 20.5117 4.62534 20.4165 4.50635 20.2966C4.38736 20.1767 4.29328 20.0344 4.22955 19.8779C4.16581 19.7215 4.13368 19.5539 4.135 19.385V11.835L2 8.11001H6.5ZM6.5 8.11001H7.965M16.735 14.09V9.39501C16.735 9.05507 16.6003 8.72898 16.3604 8.48814C16.1205 8.2473 15.7949 8.11133 15.455 8.11001H7.955M16.75 14.09V15.56M9.18 6.29001H16.845M8.235 11.935C8.48298 11.935 8.7208 12.0335 8.89614 12.2089C9.07149 12.3842 9.17 12.622 9.17 12.87C9.17 13.118 9.07149 13.3558 8.89614 13.5312C8.7208 13.7065 8.48298 13.805 8.235 13.805C7.98702 13.805 7.7492 13.7065 7.57386 13.5312C7.39851 13.3558 7.3 13.118 7.3 12.87C7.3 12.622 7.39851 12.3842 7.57386 12.2089C7.7492 12.0335 7.98702 11.935 8.235 11.935ZM12.61 11.935C12.7985 11.923 12.9862 11.9684 13.1484 12.0651C13.3106 12.1619 13.4397 12.3055 13.5187 12.477C13.5977 12.6486 13.6229 12.8401 13.591 13.0262C13.559 13.2124 13.4715 13.3845 13.3398 13.5199C13.2081 13.6553 13.0386 13.7477 12.8534 13.7848C12.6682 13.822 12.4761 13.8022 12.3024 13.7281C12.1287 13.6539 11.9815 13.5289 11.8802 13.3695C11.7789 13.2101 11.7283 13.0238 11.735 12.835C11.7401 12.5939 11.8381 12.3642 12.0086 12.1937C12.1791 12.0232 12.4089 11.9251 12.65 11.92L12.61 11.935ZM7.235 15.515H13.655C13.4501 16.2081 13.0265 16.8163 12.4475 17.2488C11.8686 17.6814 11.1652 17.9151 10.4425 17.9151C9.71978 17.9151 9.01645 17.6814 8.43747 17.2488C7.8585 16.8163 7.43493 16.2081 7.23 15.515H7.235Z" stroke="#7D8198" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>    
                          </span>
                          <span class="dash-mtext text-uppercase">{{ __('Messaging & Meeting') }}</span><span class="dash-arrow">
                              <i data-feather="chevron-right"></i></span>
                      </a>
                      <ul class="dash-submenu">
                        <li
                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'zoom-meeting' || Request::segment(1) == 'zoom-meeting-calender' ? 'active' : '' }}">
                        <a href="{{ route('zoom-meeting.index') }}" class="dash-link">
                            <span class="dash-mtext">{{ __('Zoom Meeting') }}</span>
                        </a>
                    </li>
                    <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'chats' ? 'active' : '' }}">
                        <a href="{{ url('chats') }}" class="dash-link">
                           <span class="dash-mtext">{{ __('Messenger') }}</span>
                        </a>
                    </li>
        
                    @if (\Auth::user()->type == 'company')
                        <li
                            class="dash-item dash-hasmenu {{ Request::segment(1) == 'notification-templates' ? 'active' : '' }}">
                            <a href="{{ route('notification_templates.index') }}" class="dash-link">
                                <span class="dash-mtext">{{ __('Notification Template') }}</span>
                            </a>
                        </li>
        
                        <li
                            class="dash-item dash-hasmenu {{ Request::segment(1) == 'email_template' || Request::route()->getName() == 'manage.email.language' ? ' active dash-trigger' : 'collapsed' }}">
                            <a href="#"
                            {{-- <a href="{{ route('manage.email.language', [$emailTemplate->id, \Auth::user()->lang]) }}" --}}
                                class="dash-link">
                                <span class="dash-mtext">{{ __('Email Template') }}</span></a>
                        </li>
        
                    @endif
        
        
                      </ul>
                  </li>
              @endif
  
              <!--------------------- End Messaging & Meeting  ----------------------------------->

            <!--------------------- Start apps integrations ----------------------------------->

            @if (Gate::check('manage product & service') || Gate::check('manage product & service'))
            <li class="dash-item">
                <a href="#!" class="dash-link ">
                    <span class="dash-micon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2835_404)">
                        <g clip-path="url(#clip1_2835_404)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1897 5.80614C10.2807 5.63555 10.4169 5.49337 10.5835 5.39526C10.7501 5.29716 10.9405 5.24694 11.1337 5.25014L13.2338 5.28214C13.4265 5.28527 13.6147 5.34141 13.7777 5.44443C13.9407 5.54744 14.0722 5.69335 14.1578 5.86614L14.9978 7.55414L16.4818 7.42814C16.6719 7.41196 16.8629 7.44791 17.0341 7.53213C17.2054 7.61635 17.3505 7.74566 17.4538 7.90614L18.5138 9.55014C18.6276 9.72718 18.6856 9.93434 18.6803 10.1448C18.6749 10.3552 18.6064 10.5591 18.4837 10.7301L17.7038 11.8221L18.5338 12.9181C18.7918 13.2581 18.8177 13.7221 18.5977 14.0901L17.5977 15.7661C17.4992 15.9313 17.3572 16.0662 17.1872 16.1561C17.0172 16.2461 16.8257 16.2876 16.6338 16.2761L15.0638 16.1801L14.0977 18.1581C14.0112 18.3347 13.8769 18.4834 13.71 18.5874C13.5431 18.6913 13.3504 18.7464 13.1538 18.7461H10.9897C10.7935 18.746 10.6012 18.6908 10.4347 18.5869C10.2682 18.4829 10.1341 18.3344 10.0478 18.1581L9.13975 16.3001L7.45975 16.4521C7.26595 16.4695 7.07113 16.4328 6.89702 16.3459C6.72292 16.259 6.57637 16.1255 6.47375 15.9601L5.41175 14.2501C5.29911 14.0686 5.24451 13.8571 5.25523 13.6438C5.26595 13.4304 5.34148 13.2254 5.47175 13.0561L6.43175 11.8061L5.65975 10.7281C5.53736 10.5569 5.46924 10.3529 5.46425 10.1425C5.45926 9.93204 5.51761 9.72498 5.63175 9.54814L6.69175 7.90414C6.79487 7.74397 6.93961 7.61487 7.11048 7.53067C7.28136 7.44647 7.47192 7.41034 7.66175 7.42614L9.25575 7.56214L10.1897 5.80614ZM11.3857 6.75414L10.4418 8.53014C10.3453 8.71187 10.1976 8.86125 10.017 8.95974C9.83633 9.05823 9.63075 9.10149 9.42575 9.08414L7.80575 8.94614L7.05775 10.1061L7.84575 11.2061C7.97684 11.3891 8.04566 11.6094 8.04206 11.8344C8.03846 12.0595 7.96263 12.2775 7.82575 12.4561L6.84975 13.7241L7.60175 14.9361L9.31375 14.7801C9.52588 14.7605 9.73897 14.8058 9.92472 14.9101C10.1105 15.0144 10.2601 15.1728 10.3538 15.3641L11.2718 17.2461H12.8717L13.8477 15.2521C13.9389 15.0661 14.0831 14.9112 14.2621 14.8069C14.4411 14.7027 14.647 14.6537 14.8538 14.6661L16.4498 14.7621L17.1537 13.5821L16.3057 12.4621C16.1709 12.2836 16.0965 12.0666 16.0937 11.8428C16.0908 11.619 16.1595 11.4001 16.2898 11.2181L17.0877 10.1061L16.3398 8.94614L14.8197 9.07414C14.6097 9.09205 14.3991 9.0463 14.2154 8.94285C14.0317 8.83941 13.8834 8.68305 13.7898 8.49414L12.9358 6.77814L11.3857 6.75414Z" fill="#7D8198"/>
                        <path d="M20.5621 14.8001C19.9554 16.673 18.7513 18.2953 17.1344 19.4184C15.5174 20.5415 13.5769 21.1034 11.61 21.0181C9.64313 20.9327 7.75851 20.2048 6.24492 18.9459C4.73134 17.687 3.6723 15.9665 3.23009 14.0481L4.93209 13.7121L1.69209 10.3601L-0.00390625 14.6941L1.79009 14.3421C2.29077 16.5941 3.51917 18.6185 5.28547 20.1025C7.05178 21.5865 9.25767 22.4475 11.5623 22.5524C13.8668 22.6574 16.1418 22.0004 18.0357 20.683C19.9296 19.3657 21.3368 17.4612 22.0401 15.2641L20.5621 14.8001ZM22.2341 9.72006C21.7332 7.46816 20.5046 5.4439 18.7381 3.96009C16.9717 2.47629 14.7657 1.61553 12.4612 1.51082C10.1566 1.40612 7.88168 2.06331 5.98797 3.38083C4.09425 4.69835 2.68715 6.60286 1.98409 8.80006L3.41009 9.26406C4.01661 7.39114 5.2205 5.76874 6.83729 4.64548C8.45408 3.52223 10.3946 2.96009 12.3614 3.0452C14.3283 3.13031 16.213 3.85798 17.7267 5.11669C19.2404 6.37541 20.2996 8.09574 20.7421 10.0141L19.0401 10.3521L22.2801 13.6961L23.9961 9.36806L22.2341 9.72006Z" fill="#7D8198"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 11.25C11.8011 11.25 11.6103 11.329 11.4697 11.4697C11.329 11.6103 11.25 11.8011 11.25 12C11.25 12.1989 11.329 12.3897 11.4697 12.5303C11.6103 12.671 11.8011 12.75 12 12.75C12.1989 12.75 12.3897 12.671 12.5303 12.5303C12.671 12.3897 12.75 12.1989 12.75 12C12.75 11.8011 12.671 11.6103 12.5303 11.4697C12.3897 11.329 12.1989 11.25 12 11.25ZM9.75 12C9.75 11.4033 9.98705 10.831 10.409 10.409C10.831 9.98705 11.4033 9.75 12 9.75C12.5967 9.75 13.169 9.98705 13.591 10.409C14.0129 10.831 14.25 11.4033 14.25 12C14.25 12.5967 14.0129 13.169 13.591 13.591C13.169 14.0129 12.5967 14.25 12 14.25C11.4033 14.25 10.831 14.0129 10.409 13.591C9.98705 13.169 9.75 12.5967 9.75 12Z" fill="#7D8198"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_2835_404">
                        <rect width="24" height="24" fill="white"/>
                        </clipPath>
                        <clipPath id="clip1_2835_404">
                        <rect width="24" height="24" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                        
                    </span>
                    <span class="dash-mtext text-uppercase">
                        {{ __('Apps & Integrations ') }}
                    </span>
                    <span class="dash-arrow">
                        <i data-feather="chevron-right"></i>
                    </span>
                </a>
                

            </li>
            @endif
           
        <!--------------------- End apps integrations  ----------------------------------->
        
        {{-- settings --}}
        <li class="mt-5 mb-3 d-flex justify-content-center">
            <input type="text" class="form-control w-75" readonly placeholder="Settings" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0;">    
        </li>
        {{--  --}}
        
        <li class="dash-item">
            <a href="#!" class="dash-link ">
                <span class="dash-micon">
                    <i class="fa-solid fa-circle-question"></i>  
                </span>
                <span class="dash-mtext text-uppercase">{{ __('Help ') }}</span>
            </a>

        </li>
        <li class="dash-item dash-hasmenu">
            <a href="#!" class="dash-link {{ Request::segment(1) == 'settings' ? ' active' : '' }}">
                <span class="dash-micon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2835_415)">
                        <g clip-path="url(#clip1_2835_415)">
                        <mask id="mask0_2835_415" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                        <path d="M18.343 7.5855C18.9806 8.49884 19.4121 9.53988 19.6075 10.6365H22V13.3635H19.6075C19.4121 14.4601 18.9806 15.5012 18.343 16.4145L20.0355 18.107L18.107 20.0355L16.4145 18.343C15.5012 18.9806 14.4601 19.4121 13.3635 19.6075V22H10.6365V19.6075C9.53988 19.4121 8.49884 18.9806 7.5855 18.343L5.893 20.0355L3.9645 18.107L5.657 16.4145C5.01937 15.5012 4.58791 14.4601 4.3925 13.3635H2V10.6365H4.3925C4.58791 9.53988 5.01937 8.49884 5.657 7.5855L3.9645 5.893L5.893 3.9645L7.5855 5.657C8.49884 5.01937 9.53988 4.58791 10.6365 4.3925V2H13.3635V4.3925C14.4601 4.58791 15.5012 5.01937 16.4145 5.657L18.107 3.9645L20.0355 5.893L18.343 7.5855Z" fill="white" stroke="white" stroke-width="4" stroke-linejoin="round"/>
                        <path d="M12 14.5C12.663 14.5 13.2989 14.2366 13.7678 13.7678C14.2366 13.2989 14.5 12.663 14.5 12C14.5 11.337 14.2366 10.7011 13.7678 10.2322C13.2989 9.76339 12.663 9.5 12 9.5C11.337 9.5 10.7011 9.76339 10.2322 10.2322C9.76339 10.7011 9.5 11.337 9.5 12C9.5 12.663 9.76339 13.2989 10.2322 13.7678C10.7011 14.2366 11.337 14.5 12 14.5Z" fill="black" stroke="black" stroke-width="4" stroke-linejoin="round"/>
                        </mask>
                        <g mask="url(#mask0_2835_415)">
                        <path d="M0 0H24V24H0V0Z" fill="#7D8198"/>
                        </g>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_2835_415">
                        <rect width="24" height="24" fill="white"/>
                        </clipPath>
                        <clipPath id="clip1_2835_415">
                        <rect width="24" height="24" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </span>
                <span class="dash-mtext text-uppercase">{{ __('Settings ') }}</span>
                <span class="dash-arrow">
                    <i data-feather="chevron-right"></i>
                </span>
            </a>
            <ul class="dash-submenu">
                @if (Gate::check('manage company settings'))
                    <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'settings' ? ' active' : '' }}">
                        <a href="{{ route('settings') }}" class="dash-link">
                            <span class="dash-mtext">{{ __('System Settings') }}</span>
                        </a>
                    </li>
                @endif
                @if (Gate::check('manage company settings'))
                    <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'settings' ? ' active' : '' }}">
                        <a href="{{ route('profile') }}" class="dash-link">
                        <span class="dash-mtext">{{ __('profile Settings') }}</span>
                        </a>
                    </li>
                @endif
                @include('landingpage::menu.landingpage')
            </ul>

        </li>
        <li class="dash-item">
            <a href="#!" class="dash-link ">
                <span class="dash-micon">
                    <i class="fa-solid fa-right-from-bracket text-danger"></i>
                </span>
                <span class="dash-mtext text-danger text-uppercase">{{ __('Logout ') }}</span>
            </a>

        </li>
        <li class="dash-item">
            <p class="text-muted text-center">
                <i class="fa-regular fa-copyright"></i> {{ date("Y") }} {{ __("LIMS. All rights reserved") }}
            </p>
        </li>
        <li class="dash-item">
            <div class="py-5"></div>
        </li>
        
        <!--------------------- Start System Setup ----------------------------------->

         




            <!--------------------- End System Setup ----------------------------------->

            </ul>
        @endif
        @if (\Auth::user()->type == 'client')
            <ul class="dash-navbar">
                @if (Gate::check('manage client dashboard'))
                    <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'dashboard' ? ' active' : '' }}">
                        <a href="{{ route('client.dashboard.view') }}" class="dash-link">
                            <span class="dash-micon"><i class="ti ti-home"></i></span><span
                                class="dash-mtext">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                @endif

                @if (Gate::check('manage deal'))
                    <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'deals' ? ' active' : '' }}">
                        <a href="{{ route('deals.index') }}" class="dash-link">
                            <span class="dash-micon"><i class="ti ti-rocket"></i></span><span
                                class="dash-mtext">{{ __('Deals') }}</span>
                        </a>
                    </li>
                @endif
                @if (Gate::check('manage contract'))
                    <li
                        class="dash-item dash-hasmenu {{ Request::route()->getName() == 'contract.index' || Request::route()->getName() == 'contract.show' ? 'active' : '' }}">
                        <a href="{{ route('contract.index') }}" class="dash-link">
                            <span class="dash-micon"><i class="ti ti-rocket"></i></span><span
                                class="dash-mtext">{{ __('Contract') }}</span>
                        </a>
                    </li>
                @endif


                @if (Gate::check('manage project'))
                    <li class="dash-item dash-hasmenu  {{ Request::segment(1) == 'projects' ? ' active' : '' }}">
                        <a href="{{ route('projects.index') }}" class="dash-link">
                            <span class="dash-micon"><i class="ti ti-share"></i></span><span
                                class="dash-mtext">{{ __('Project') }}</span>
                        </a>
                    </li>
                @endif

                @if (Gate::check('manage project'))
                    <li
                        class="dash-item  {{ Request::route()->getName() == 'project_report.index' || Request::route()->getName() == 'project_report.show' ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('project_report.index') }}">
                            <span class="dash-micon"><i class="ti ti-chart-line"></i></span><span
                                class="dash-mtext">{{ __('Project Report') }}</span>
                        </a>
                    </li>
                @endif

                @if (Gate::check('manage project task'))
                    <li class="dash-item dash-hasmenu  {{ Request::segment(1) == 'taskboard' ? ' active' : '' }}">
                        <a href="{{ route('taskBoard.view', 'list') }}" class="dash-link">
                            <span class="dash-micon"><i class="ti ti-list-check"></i></span><span
                                class="dash-mtext">{{ __('Tasks') }}</span>
                        </a>
                    </li>
                @endif

                @if (Gate::check('manage bug report'))
                    <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'bugs-report' ? ' active' : '' }}">
                        <a href="{{ route('bugs.view', 'list') }}" class="dash-link">
                            <span class="dash-micon"><i class="ti ti-bug"></i></span><span
                                class="dash-mtext">{{ __('Bugs') }}</span>
                        </a>
                    </li>
                @endif

                @if (Gate::check('manage timesheet'))
                    <li
                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'timesheet-list' ? ' active' : '' }}">
                        <a href="{{ route('timesheet.list') }}" class="dash-link">
                            <span class="dash-micon"><i class="ti ti-clock"></i></span><span
                                class="dash-mtext">{{ __('Timesheet') }}</span>
                        </a>
                    </li>
                @endif

                @if (Gate::check('manage project task'))
                    <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'calendar' ? ' active' : '' }}">
                        <a href="{{ route('task.calendar', ['all']) }}" class="dash-link">
                            <span class="dash-micon"><i class="ti ti-calendar"></i></span><span
                                class="dash-mtext">{{ __('Task Calender') }}</span>
                        </a>
                    </li>
                @endif

                <li class="dash-item dash-hasmenu">
                    <a href="{{ route('support.index') }}"
                        class="dash-link {{ Request::segment(1) == 'support' ? 'active' : '' }}">
                        <span class="dash-micon"><i class="ti ti-headphones"></i></span><span
                            class="dash-mtext">{{ __('Support') }}</span>
                    </a>
                </li>



            </ul>
        @endif

        {{-- <div class="navbar-footer border-top ">
            <div class="d-flex align-items-center py-3 px-3 border-bottom">
                <div class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="30" viewBox="0 0 29 30"
                        fill="none">
                        <circle cx="14.5" cy="15.1846" r="14.5" fill="#6FD943"></circle>
                        <path opacity="0.4"
                            d="M22.08 8.66459C21.75 8.28459 21.4 7.92459 21.02 7.60459C19.28 6.09459 17 5.18461 14.5 5.18461C12.01 5.18461 9.73999 6.09459 7.98999 7.60459C7.60999 7.92459 7.24999 8.28459 6.92999 8.66459C5.40999 10.4146 4.5 12.6946 4.5 15.1846C4.5 17.6746 5.40999 19.9546 6.92999 21.7046C7.24999 22.0846 7.60999 22.4446 7.98999 22.7646C9.73999 24.2746 12.01 25.1846 14.5 25.1846C17 25.1846 19.28 24.2746 21.02 22.7646C21.4 22.4446 21.75 22.0846 22.08 21.7046C23.59 19.9546 24.5 17.6746 24.5 15.1846C24.5 12.6946 23.59 10.4146 22.08 8.66459ZM14.5 19.6246C13.54 19.6246 12.65 19.3146 11.93 18.7946C11.52 18.5146 11.17 18.1646 10.88 17.7546C10.37 17.0346 10.06 16.1346 10.06 15.1846C10.06 14.2346 10.37 13.3346 10.88 12.6146C11.17 12.2046 11.52 11.8546 11.93 11.5746C12.65 11.0546 13.54 10.7446 14.5 10.7446C15.46 10.7446 16.35 11.0546 17.08 11.5646C17.49 11.8546 17.84 12.2046 18.13 12.6146C18.64 13.3346 18.95 14.2346 18.95 15.1846C18.95 16.1346 18.64 17.0346 18.13 17.7546C17.84 18.1646 17.49 18.5146 17.08 18.8046C16.35 19.3146 15.46 19.6246 14.5 19.6246Z"
                            fill="#162C4E"></path>
                        <path
                            d="M22.08 8.66459L18.18 12.5746C18.16 12.5846 18.15 12.6046 18.13 12.6146C17.84 12.2046 17.49 11.8546 17.08 11.5646C17.09 11.5446 17.1 11.5346 17.12 11.5146L21.02 7.60459C21.4 7.92459 21.75 8.28459 22.08 8.66459Z"
                            fill="#162C4E"></path>
                        <path
                            d="M11.9297 18.7947C11.9197 18.8147 11.9097 18.8347 11.8897 18.8547L7.98969 22.7647C7.60969 22.4447 7.24969 22.0847 6.92969 21.7047L10.8297 17.7947C10.8397 17.7747 10.8597 17.7647 10.8797 17.7547C11.1697 18.1647 11.5197 18.5147 11.9297 18.7947Z"
                            fill="#162C4E"></path>
                        <path
                            d="M11.9297 11.5746C11.5197 11.8546 11.1697 12.2045 10.8797 12.6145C10.8597 12.6045 10.8497 12.5846 10.8297 12.5746L6.92969 8.66453C7.24969 8.28453 7.60969 7.92453 7.98969 7.60453L11.8897 11.5146C11.9097 11.5346 11.9197 11.5546 11.9297 11.5746Z"
                            fill="#162C4E"></path>
                        <path
                            d="M22.08 21.7046C21.75 22.0846 21.4 22.4446 21.02 22.7646L17.12 18.8546C17.1 18.8346 17.09 18.8246 17.08 18.8046C17.49 18.5146 17.84 18.1646 18.13 17.7546C18.15 17.7646 18.16 17.7746 18.18 17.7946L22.08 21.7046Z"
                            fill="#162C4E"></path>
                    </svg>
                </div>
                <div>
                    <b class="d-block f-w-700">{{ __('You need help?') }}</b>
                    <span>{{ __('Contact VTC for support') }} </span>
                </div>
            </div>
        </div> --}}
    </div>
</div>
</nav>

<script>
    document.getElementById("sidebar-search").addEventListener("input", (e) => {
        var filter = e.target.value.toLowerCase();
        var nodes = document.getElementsByClassName('dash-item');
        for (let i = 0; i < nodes.length; i++) {
            if (nodes[i].innerHTML.toLowerCase().includes(filter)) {
            nodes[i].style.display = "block";
            } else {
            nodes[i].style.display = "none";
            }
        }
    });
</script>