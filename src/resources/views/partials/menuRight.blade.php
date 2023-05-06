                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto align-left">
                    <li class="nav-item dropdown notifications-menu">
                    <!-- It will display only count recently assign. Read flag we are considering for this. -->
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownAlerts" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-bell"></i>
                            @php($alertsCount = \Auth::user()->userUserAlerts()->where('read', false)->count())
                                @if($alertsCount > 0)
                                    <span class="badge badge-warning navbar-badge">
                                        {{ $alertsCount }}
                                    </span>
                                @endif
                        </a>
                        <div class="dropdown-menu navbar-expand-lg" style="width: 400px;" aria-labelledby="navbardropdownAlerts">
                            @if(count($alerts = \Auth::user()->userUserAlerts()->withPivot('read')->where('close',false)->limit(10)->orderBy('created_at', 'ASC')->get()->reverse()) > 0)
                                @foreach($alerts as $alert)
                                
                                    <div class="row" style="margin-left: 0.5px;">
                                    @can('user_management_access')
                                    <form action="{{ route('tables.user-alerts.destroy', $alert->id) }}" method="POST" onsubmit="return confirm('{{ trans('pqeAdmin::global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <li>
                                            <a class="tooltips" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <button type="submit"  style="border: 0; background: none;">
                                            <i class="fas fa-trash text-dark" aria-hidden="true"></i>
                                            </button>
                                            </a>
                                        </li> 
                                    </form>
                                    @endcan
                                    <form action="{{ route('tables.user-alerts.close', $alert->id) }}" method="POST" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{$alert->id}}">
                                            <li><a class="tooltips" data-toggle="tooltip" data-placement="top" title="Close">
                                            <button type="submit" onclick="return confirm('{{ trans('pqeAdmin::global.areYouSuretoClose') }}');" style="border: 0; background: none;">
                                            <i class="fas fa-times text-danger"></i>
                                            </button>
                                            </a>
                                            </li>
                                    </form>
                                    <a class="text-success" class="tooltips" data-toggle="tooltip" data-placement="top" title="Read" href="{{ $alert->alert_link ? url($alert->alert_link) : "#" }}" target="_blank" rel="noopener noreferrer"> <i class="fab fa-readme"></i> 
                                            @if($alert->pivot->read === 0) <strong> @endif
                                                {{ $alert->alert_text }}
                                                @if($alert->pivot->read === 0) </strong> @endif
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center">
                                    {{ trans('pqeAdmin::global.no_alerts') }}
                                </div>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLogout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->username }} - {{auth()->user()->name }} 
                        </a>
                        <div class="dropdown-menu navbar-expand-lg bg-dark" aria-expanded="navbarDropdownLogout">
                            <a href="#" class="dropdown-item bg-dark"
                                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                <p>
                                    <i class="fas fa-fw fa-sign-out-alt nav-icon">
                    
                                    </i>{{ trans('pqeAdmin::pqeAdmin::global.logout') }}
                                </p>
                            </a>
                        </div>

                    </li>
                </ul>
