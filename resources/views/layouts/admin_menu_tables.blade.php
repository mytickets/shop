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










<li class="{{ Request::is('cats*') ? 'active' : '' }}">
    <a href="{!! route('cats.index') !!}"><i class="fa fa-edit"></i><span>Cats</span></a>
</li>





<li class="{{ Request::is('carts*') ? 'active' : '' }}">
    <a href="{!! route('carts.index') !!}"><i class="fa fa-edit"></i><span>Carts</span></a>
</li>

<li class="{{ Request::is('lineItems*') ? 'active' : '' }}">
    <a href="{!! route('lineItems.index') !!}"><i class="fa fa-edit"></i><span>Line Items</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>

