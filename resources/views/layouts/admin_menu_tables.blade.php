

<li class="{{ Request::is('cats*') ? 'active' : '' }}">
    <a href="{!! route('cats.index') !!}"><i class="fa fa-book"></i><span>Категории</span></a>
</li>


<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('products.index') !!}"><i class="fa fa-credit-card" aria-hidden="true"></i></i><span>Продукты</span></a>
</li>


<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
<span>Заказы</span></a>
</li>

@if (Auth::user()->role_type==0)


<li class="{{ Request::is('carts*') ? 'active' : '' }}">
    <a href="{!! route('carts.index') !!}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Корзины</span></a>
</li>

<li class="{{ Request::is('lineItems*') ? 'active' : '' }}">
    <a href="{!! route('lineItems.index') !!}"><i class="fa fa-cart-plus" aria-hidden="true"></i><span>Позиции</span></a>
</li>


<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user-secret" aria-hidden="true"></i><span>Пользователи</span></a>
</li>

{{-- <li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-circle-o  text-white"></i><span>Роли</span></a>
</li>

<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{!! route('permissions.index') !!}"><i class="fa fa-circle-o  text-white"></i><span>Разрешения</span></a>
</li>
 --}}
<li class="{{ Request::is('menus*') ? 'active' : '' }}">
    <a href="{!! route('menus.index') !!}"><i class="fa fa-bars" aria-hidden="true"></i><span>Меню</span></a>
</li>

@endif
<li class="{{ Request::is('metatexts*') ? 'active' : '' }}">
    <a href="{!! route('metatexts.index') !!}"><i class="fa fa-edit"></i><span>Мета метки</span></a>
</li>

