
        <li class="header">Навигация</li>
        <li class="active treeview menu-open">
          <a href="/lte1/#">
            <i class="fa fa-dashboard"></i> <span>Разработка</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="/generator_builder"><i class="fa fa-circle-o"></i> Generator </a></li>
            <li><a href="/schema_builder"><i class="fa fa-circle-o"></i> Schema builder </a></li>

            <li><a href="/mind_map"><i class="fa fa-circle-o"></i> Карта </a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="/lte1/#">
            <i class="fa fa-table"></i> <span>Таблицы</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @include('layouts.admin_menu_tables')
            <li><a href="/lte1/pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="/lte1/pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="/lte1/#">
            <i class="fa fa-share"></i> <span>Дополнения</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            {{-- <li><a href="/lte1/#"><i class="fa fa-circle-o"></i> Level One</a></li> --}}
            <li><a href="/lte1/#"><i class="fa fa-circle-o"></i> Виджеты</a></li>
            <li class="treeview">
              <a href="/lte1/#"><i class="fa fa-pie-chart"></i> Графики
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/chartjs"><i class="fa fa-circle-o"></i> ChartJS</a></li>
              </ul>
            </li>


          </ul>
        </li>

        <li class="header">ССЫЛКИ</li>
        <li><a href="/docs"><i class="fa fa-book"></i> <span>Документация</span></a></li>
        <li><a href="/direct"><i class="fa fa-circle-o text-red"></i> <span>Реклама</span></a></li>
        <li><a href="/anal"><i class="fa fa-circle-o text-yellow"></i> <span>Аналитика</span></a></li>
        <li><a href="/site"><i class="fa fa-circle-o text-aqua"></i> <span>Сайт</span></a></li>
