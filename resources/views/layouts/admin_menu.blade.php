
        <li class="header">Навигация</li>
{{-- http://127.0.0.1:8000/manager --}}
        @if (Auth::user()->role_type!=4)
            <li class="{{ Request::is('manager') ? 'active' : '' }}">
              <a href="/manager">
                <i class="fa fa-circle-o text-success"></i> Менджер
              </a>
            </li>
        @endif

        @include('layouts.admin_menu_tables')


{{-- @if (Auth::user()->role_type==0) --}}
@if (false)

        <li class="treeview menu-open active">
          <a href="#">
            <i class="fa fa-share"></i> <span>Дополнения</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="/api/docs"  target="_blank"><i class="fa fa-book"></i> <span>Документация</span></a></li>
            <li class="treeview" style="display: none;">
              <a href="#"><i class="fa fa-circle-o text-blue"></i> Visual
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu menu-open">

                <li><a href="/widgets/"><i class="fa fa-circle-o"></i> Виджеты</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-pie-chart"></i> Графики
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu menu-open">
                    <li><a href="/chartjs"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                    <li><a href="/flot"><i class="fa fa-circle-o"></i> Flot</a></li>
                  </ul>
                </li>

                <li class="treeview">
                  <a href="#"><i class="fa fa-pie-chart"></i> Шаблоны
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu menu-open">
                    <li><a href="http://www.crusader12.com/Yoshi/"><i class="fa fa-circle-o"></i> Demo1</a></li>
                    <li><a href="http://activiotic.com/products/fluid/"><i class="fa fa-circle-o"></i> Demo fluid</a></li>
                    <li><a href="http://activiotic.com/products/blob/"><i class="fa fa-circle-o"></i> Demo blob</a></li>
                    <li><a href="http://activiotic.com/products/pave/"><i class="fa fa-circle-o"></i> Demo pave</a></li>
                    
                    {{-- http://www.crusader12.com/Yoshi/ --}}
                    {{-- https://previews.customer.envatousercontent.com/files/16687559/index.html --}}
                    {{-- https://demonisblack.com/code/2016/fishanimation/canvas/ --}}
                    {{-- http://activiotic.com/products/fluid/ --}}
                  </ul>
                </li>


              </ul>
            </li>

                
            <li class="treeview menu-open active">
              <a href="#"><i class="fa fa-circle-o  text-green"></i> Разработка
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
                        {{-- <li class="active treeview menu-open"> --}}

              <ul class="treeview-menu">
                <li><a href="/generator_builder"><i class="fa fa-circle-o text-orange"></i> Генераторы </a></li>


                <li class="treeview menu-open active">
                  {{-- <a href="#"><i class="fa fa-pie-circle-o"></i> Debug --}}
                  <a href="#"><i class="fa fa-circle-o  text-red"></i> Отладка
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu menu-open active">
                    <li><a href="/telescope"><i class="fa fa-circle-o"></i> Telescope</a></li>
                    <li><a href="/prequel"><i class="fa fa-circle-o"></i> Prequel</a></li>
                    <li><a href="/phpinfo"><i class="fa fa-circle-o"></i>phpinfo()</a></li>
                  </ul>
                </li>


              </ul>
            </li>

            <li><a href="/file_manager1"><i class="fa fa-circle-o text-red"></i> Файлы </a></li>

          </ul>



        </li>
@endif
        <li class="header">ССЫЛКИ</li>
        <li><a href="/" target="_blank"><i class="fa fa-link text-aqua" aria-hidden="true"></i> <span>Сайт</span></a></li>
