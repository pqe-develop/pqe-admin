<ul class="nav navbar navbar-left d-flex d-inline-flex link-dark" style="margin-right:auto; ">
     @can('general_element_access')
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownCommons" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa-fw nav-icon fas fa-cogs"></i>
                {{ trans('pqeAdmin::cruds.generalElement.title') }}
                <i class="right fa fa-fw fa-angle-right nav-icon"></i>
            </a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbardropdownCommons">
                @can('country_access')
                    <a href="{{ route('countries.index') }}"
                        class="dropdown-item bg-dark {{ request()->is('tables/countries') || request()->is('tables/countries/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-flag">
  
                        </i>
                        {{ trans('pqeAdmin::cruds.country.title') }}
                    </a>
                @endcan
                @can('currency_access')
                    <a href="{{ route('currencies.index') }}"
                        class="dropdown-item bg-dark {{ request()->is('tables/currencies') || request()->is('tables/currencies/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-cogs">
  
                        </i>
  
                        {{ trans('pqeAdmin::cruds.currency.title') }}
  
                    </a>
                @endcan
                @can('currency_history_access')
                    <a href="{{ route('currency-histories.index') }}"
                        class="dropdown-item bg-dark {{ request()->is('tables/currency-histories') || request()->is('tables/currency-histories/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-cogs">
  
                        </i>
  
                        {{ trans('pqeAdmin::cruds.currencyHistory.title') }}
  
                    </a>
                @endcan
                @can('company_access')
                    <a href="{{ route('companies.index') }}"
                        class="dropdown-item bg-dark {{ request()->is('tables/companies') || request()->is('tables/companies/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-cogs">
  
                        </i>
  
                        {{ trans('pqeAdmin::cruds.company.title') }}
  
                    </a>
                @endcan
                @can('companies_bank_holiday_access')
                    <a href="{{ route('companies-bank-holidays.index') }}"
                        class="dropdown-item bg-dark {{ request()->is('tables/companies-bank-holidays') || request()->is('tables/companies-bank-holidays/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-cogs">
  
                        </i>
  
                        {{ trans('pqeAdmin::cruds.companiesBankHoliday.title') }}
  
                    </a>
                @endcan
				@can('dropdown_access')
    				<a href="{{ route('dropdowns.index') }}"
    						class="dropdown-item bg-dark {{ request()->is('dropdowns') || request()->is('dropdowns/*') ? 'active' : '' }}">
    						<i class="fa-fw nav-icon fas fa-cogs">
      
    						</i> {{ trans('pqeAdmin::cruds.dropdowns.title') }}
    				</a>
				@endcan
            </div>
        </li>
    @endcan
    @can('user_management_access')
        <li
            class="nav-item dropdown {{ request()->is('permissions*') ? 'menu-open' : '' }} {{ request()->is('roles*') ? 'menu-open' : '' }} {{ request()->is('users*') ? 'menu-open' : '' }} {{ request()->is('audit-logs*') ? 'menu-open' : '' }} {{ request()->is('teams*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownUsers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-fw nav-icon fas fa-users"></i>
                {{ trans('pqeAdmin::cruds.userManagement.title') }}
                <i class="right fa fa-fw fa-angle-right nav-icon"></i>
            </a>
  
            <div class="dropdown-menu bg-dark" aria-labelledby="navbardropdownUsers">
                @can('permission_access')
                    <a href="{{ route('permissions.index') }}"
                        class="dropdown-item bg-dark {{ request()->is('permissions') || request()->is('permissions/*') ? 'active' : '' }}"
                        class="dropdown-item bg-dark">
                        <i class="fa-fw nav-icon fas fa-unlock-alt"></i> {{ trans('pqeAdmin::cruds.permission.title') }}
  
                    </a>
                @endcan
                @can('role_access')
                    <a href="{{ route('roles.index') }}"
                        class="dropdown-item bg-dark {{ request()->is('roles') || request()->is('roles/*') ? 'active' : '' }}"
                        class="dropdown-item bg-dark">
                        <i class="fa-fw nav-icon fas fa-briefcase"></i>{{ trans('pqeAdmin::cruds.role.title') }}
  
                    </a>
                @endcan
                @can('user_access')
                    <a href="{{ url('/admin')}}"
                        class="dropdown-item bg-dark {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}"
                        class="dropdown-item bg-dark">
                        <i class="fa-fw nav-icon fas fa-user"> </i> {{ trans('pqeAdmin::cruds.user.title') }}
                    </a>
                @endcan
                @can('user_create')
                    <a href="{{ url('/users') }}"
                        class="dropdown-item bg-dark {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}"
                        class="dropdown-item bg-dark">
                        <i class="fa-fw nav-icon fas fa-user"> </i> {{ trans('pqeAdmin::cruds.user.titleEdit') }}
                    </a>
                @endcan
                @can('audit_log_access')
                    <a href="{{ route('audit-logs.index') }}"
                        class="dropdown-item bg-dark {{ request()->is('audit-logs') || request()->is('audit-logs/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-file-alt"></i>{{ trans('pqeAdmin::cruds.auditLog.title') }}
  
                    </a>
                @endcan
                @can('team_access')
                    <a href="{{ route('teams.index') }}"
                        class="dropdown-item bg-dark {{ request()->is('teams') || request()->is('teams/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-users"> </i> {{ trans('pqeAdmin::cruds.team.title') }}
  
                    </a>
                @endcan
            </div>
        </li>
    @endcan
    @can('user_alert_access')
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('user-alerts.index') }}"
                class="dropdown-item bg-dark {{ request()->is('user-alerts') || request()->is('user-alerts/*') ? 'active' : '' }}">
                <i class="fa-fw nav-icon fas fa-bell"></i>{{ trans('pqeAdmin::cruds.userAlert.title') }}
            </a>
        </li>
    @endcan
 </ul>
