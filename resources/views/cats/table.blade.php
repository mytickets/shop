@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Заголовок окна</h4>
        </div>
        <div class="modal-body">
          {{-- <p>Some text in the modal.</p> --}}
          <iframe id="iframe" src="" width="100%" height="700px"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        </div>
      </div>
      
    </div>
  </div>

<script type="text/javascript">

</script>
@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}

    <script type="text/javascript">


		$(document).on({

    // Disable search and ordering by default
		  click: function (event) {

		    var table = $(event.target).parents('.dataTables_wrapper').find('table.dataTable');
		    trIndex = $(this).index() + 1;
		    ident = table.find("tr:eq(" + trIndex + ")").find("td:eq(0)").text();
		    console.log(ident)
		    // $('#iframe').attr('src', '/cats/'+ident)
		    // $('#myModal').modal('show');

		  },
		  // mouseenter: function (event) {
		  //   var table = $(event.target).parents('.dataTables_wrapper').find('table.dataTable');
		  //   trIndex = $(this).index() + 1;
		  //   // table.find("tr:eq(" + trIndex + ")").addClass("hover");
		  //   table.find("tr:eq(" + trIndex + ")").addClass("hover");
		  // },
		  // mouseleave: function (event) {
		  //   var table = $(event.target).parents('.dataTables_wrapper').find('table.dataTable');
		  //   trIndex = $(this).index() + 1;
		  //   table.find("tr:eq(" + trIndex + ")").removeClass("hover");
		  // }
		}, ".dataTables_wrapper tbody tr");


      // $.extend( $.fn.dataTable.defaults, 

      // $.fn.dataTable.defaults = 
      // {
      //   searching: false,
      //   ordering:  true,
      //   columnDefs : [
      //       {
      //           targets : 1,
      //           data: "img",
      //           "render" : function ( url, type, full) {
      //               return '<a href="'+url+'" target="_blank"><img class="datatables_img img-responsive img-hover-zoom--colorize" src="'+url+'"/></a>';
      //           },
      //       },
      //   ],
      // }

    </script>


@endsection