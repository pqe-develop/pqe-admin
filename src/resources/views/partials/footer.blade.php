        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> {{ trans('panel.version') }}
            </div>
            <strong> &copy;</strong> {{ trans('pqeAdmin::global.allRightsReserved') }}
        </footer>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
