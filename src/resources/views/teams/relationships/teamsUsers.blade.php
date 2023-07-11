<div class="m-3">
    @can('user_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('users.create') }}">
                    {{ trans('pqeAdmin::global.add') }} {{ trans('pqeAdmin::cruds.user.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('pqeAdmin::cruds.user.title_singular') }} {{ trans('pqeAdmin::global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-teamsUsers">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                &nbsp;
                            </th>
                            <th>
                                {{ trans('pqeAdmin::cruds.user.fields.id') }}
                            </th>
                            <th>
                                {{ trans('pqeAdmin::cruds.user.fields.username') }}
                            </th>
                            <th>
                                {{ trans('pqeAdmin::cruds.user.fields.name') }}
                            </th>
                            <th>
                                {{ trans('pqeAdmin::cruds.user.fields.status') }}
                            </th>
                            <th>
                                {{ trans('pqeAdmin::cruds.user.fields.email') }}
                            </th>
                            <th>
                                {{ trans('pqeAdmin::cruds.user.fields.is_admin') }}
                            </th>
                            <th>
                                {{ trans('pqeAdmin::cruds.user.fields.external_auth') }}
                            </th>
                            <th>
                                {{ trans('pqeAdmin::cruds.user.fields.email_verified_at') }}
                            </th>
                            <th>
                                {{ trans('pqeAdmin::cruds.user.fields.teams') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td>

                                </td>
                                <td>
                                    @can('user_access')
                                        <a class="btn btn-xs btn-primary" href="{{ route('users.show', $user->id) }}">
                                            {{ trans('pqeAdmin::global.view') }}
                                        </a>
                                    @endcan

                                    @can('user_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('users.edit', $user->id) }}">
                                            {{ trans('pqeAdmin::global.edit') }}
                                        </a>
                                    @endcan


                                </td>
                                <td>
                                    {{ $user->id ?? '' }}
                                </td>
                                <td>
                                    {{ $user->username ?? '' }}
                                </td>
                                <td>
                                    {{ $user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $dropdowns->getItem('STATUS_SELECT',$user->status) ?? '' }}
                                </td>
                                <td>
                                    {{ $user->email ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $user->is_admin ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $user->is_admin ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <span style="display:none">{{ $user->external_auth ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $user->external_auth ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ $user->email_verified_at ?? '' }}
                                </td>
                                <td>
                                    @foreach($user->teams as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
	pageLength: {{ trans('pqeAdmin::config.pgLen') }},
	lengthMenu: [[ {{ trans('pqeAdmin::config.lenMenu') }} ], [ {{ trans('pqeAdmin::config.desMenu') }}, "All" ]]
  });
  let table = $('.datatable-rolesUsers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection