<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-circle-o  text-white"></i><span>Пользователи</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-circle-o  text-white"></i><span>Роли</span></a>
</li>

<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{!! route('permissions.index') !!}"><i class="fa fa-circle-o  text-white"></i><span>Разрешения</span></a>
</li>

<li class="{{ Request::is('menus*') ? 'active' : '' }}">
    <a href="{!! route('menus.index') !!}"><i class="fa fa-circle-o  text-white"></i><span>Меню</span></a>
</li>

