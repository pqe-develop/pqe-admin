<!DOCTYPE html>
<html>

<head>
    @include('pqeAdmin::partials.head')
    @yield('styles')
    <style>
    .navbar .nav-item .dropdown-menu{ display: none; }
    .navbar .nav-item:hover .nav-link{   }
    .navbar .nav-item:hover .dropdown-menu{ display: block; }
    </style>
</head>

<body class="sidebar-mini layout-fixed" style="height: auto;">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand bg-dark navbar-light border-bottom py-lg-0">
            <div class="container-fluid" style="margin-top: 12px">
                @include('pqeAdmin::partials.menuLeft')
                <ul class="nav navbar navbar-left d-flex d-inline-flex link-dark" style="margin-right:auto; ">
                    @can('hr_management_access')
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown2" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa-fw nav-icon fas fa-address-card"> </i>{{ trans('cruds.hrManagement.title') }}
                                <i class="right fa fa-fw fa-angle-right nav-icon"></i>
                            </a>
                            <div class="dropdown-menu bg-dark" aria-labelledby="navbardropdown2">
                                @can('resource_access')
                                    <a href="{{ route('resources.index3') }}"
                                        class="dropdown-item bg-dark {{ request()->is('resources') || request()->is('resources/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.resource.title') }}
                                    </a>
                                @endcan
                                @can('contract_access')
                                    <a href="{{ route('contracts.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('contracts') || request()->is('contracts/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.contract.title') }}
                                    </a>
                                    <a href="{{ route('contract-details.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('contract-details') || request()->is('contract-details/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.contractDetail.title') }}
                                    </a>
                                @endcan
                                @can('salary_access')
                                    <a href="{{ route('salaries.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('salaries') || request()->is('salaries/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.salary.title') }}
                                    </a>
                                @endcan
                                @can('education_access')
                                    <a href="{{ route('education.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('education') || request()->is('education/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.education.title') }}
                                    </a>
                                @endcan
                                @can('job_experience_access')
                                    <a href="{{ route('job-experiences.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('job_experience') || request()->is('job_experience/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.jobExperience.title') }}
                                    </a>
                                @endcan
                                @can('language_access')
                                    <a href="{{ route('languages.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('languages') || request()->is('languages/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.language.title') }}
                                    </a>
                                @endcan
                                @can('training_access')
                                    <a href="{{ route('trainings.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('trainings') || request()->is('trainings/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.training.title') }}
                                    </a>
                                @endcan
                                @can('presentation_access')
                                    <a href="{{ route('presentations.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('presentations') || request()->is('presentations/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.presentation.title') }}
                                    </a>
                                @endcan
                                @can('professionals_ass_access')
                                    <a href="{{ route('professionals-ass.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('professionals_ass') || request()->is('professionals_ass/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.professionalsAss.title') }}
                                    </a>
                                @endcan
                                @can('publications_access')
                                    <a href="{{ route('publications.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('publications') || request()->is('publications/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.publication.title') }}
                                    </a>
                                @endcan
                                @can('benefit_access')
                                    <a href="{{ route('benefits.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('benefits') || request()->is('benefits/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.benefit.title') }}
                                    </a>
                                @endcan
                                @can('partner_access')
                                    <a href="{{ route('partners.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('partners') || request()->is('partners/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.partner.title') }}
                                    </a>
                                @endcan
                                @can('grading_access')
                                    <a href="{{ route('gradings.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('gradings') || request()->is('gradings/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.grading.title') }}
                                    </a>
                                @endcan
                                @can('medical_check_access')
                                    <a href="{{ route('hse-medical-checks.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('medical_checks') || request()->is('medical_checks/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.hseMedicalCheck.title') }}
                                    </a>
                                @endcan
                                @can('course_access')
                                    <a href="{{ route('hse-courses.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('courses') || request()->is('courses/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.hseCourse.title') }}
                                    </a>
                                @endcan
                                @can('dpi_assign_access')
                                    <a href="{{ route('hse-dpi-assigns.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('dpi_assigns') || request()->is('dpi_assigns/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        {{ trans('cruds.hseDpiAssign.title') }}
                                    </a>
                                @endcan
                            </div>
                        </li>
                    @endcan
                    @can('general_element_access')
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown3" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa-fw nav-icon fas fa-cogs"></i>
                                {{ trans('cruds.generalElement.title') }}
                                <i class="right fa fa-fw fa-angle-right nav-icon"></i>
                            </a>
                            <div class="dropdown-menu bg-dark" aria-labelledby="navbardropdown3">
                                @can('job_grade_access')
                                    <a href="{{ route('job-grades.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('job-grades') || request()->is('job-grades/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">
                                        </i> {{ trans('cruds.jobGrade.title') }}
                                    </a>
                                @endcan
                                @can('partner_level_access')
                                    <a href="{{ route('partner-levels.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('partner-levels') || request()->is('partner-levels/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">
                                        </i> {{ trans('cruds.partnerLevel.title') }}
                                    </a>
                                @endcan
                                @can('highest_degree_access')
                                    <a href="{{ route('highestdegrees.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('highestdegrees') || request()->is('highestdegrees/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">
                                        </i> {{ trans('cruds.highestDegree.title') }}
                                    </a>
                                @endcan
                                @can('benefit_type_access')
                                    <a href="{{ route('benefit-type.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('benefit-type') || request()->is('benefit-type') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">
                                        </i> {{ trans('cruds.benefitTypes.title') }}
                                    </a>
                                @endcan
                                @can('dropdown_access')
                                    <a href="{{ route('dropdowns.index') }}"
                                            class="dropdown-item bg-dark {{ request()->is('dropdowns') || request()->is('dropdowns/*') ? 'active' : '' }}">
                                            <i class="fa-fw nav-icon fas fa-cogs">
                                            </i> {{ trans('pqeAdmin::cruds.dropdowns.title') }}
                                    </a>
                                @endcan
                                @can('audit_log_access')
                                    <a href="{{ route('audit-logs.index') }}"
                                        class="dropdown-item bg-dark {{ request()->is('audit-logs') || request()->is('audit-logs/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt"></i>{{ trans('pqeAdmin::cruds.auditLog.title') }}
                                    </a>
                                @endcan
                            </div>
                        </li>
                    @endcan
                </ul>
                @include('pqeAdmin::partials.menuRight')
            </div>
        </nav>
        @include('pqeAdmin::partials.contentWrapper')
        @include('pqeAdmin::partials.footer')
    </div>
    @include('pqeAdmin::partials.scripts')
    @yield('scripts')
</body>
</html>
@include('pqeAdmin::partials.styles')
