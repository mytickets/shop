@section('css')

@endsection

	{{-- <hr> --}}
	{{-- <script type="text/javascript" src="/js/salvattore.min.js"></script> --}}



	<div class="grid">
	{{-- <div class="grid js-masonry" --}}
  		{{-- data-masonry-options='{ "itemSelector": ".grid-item", "columnWidth": 200 }'> --}}
		@foreach ( App\Models\Product::all()->take(40) as $line)

		        <div class="box col-md-2 grid-item">
		            <div class="box-body">
		            	{{ $line->name ?? "Название" }}
					</div>
				</div>

		@endforeach
	</div>



@section('scripts')
	<script type="text/javascript">

		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		  var target = $(e.target).attr("href") // activated tab
		  // alert(target);
			$('.grid').masonry({
			  itemSelector: '.grid-item',
			  // columnWidth: 200
			});	
		});


	</script>


<script type="text/javascript">

	    $.extend( $.fn.dataTable.defaults, {

	        columnDefs : [
	            {
	                targets : 0,
	                data: "a",
	                "render" : function ( url, type, full) {
	                    console.log(url)
	                    return '<a href="'+url+'">'+url+'</a>';
	                }
	            }
	        ],

	    } );


// $('.nav-tabs a').click(function(e){
// 	e.preventDefault()
// 	$(this).tab('show');
// })


			// $('ul.nav-tabs li a').click(function (e) {
			  // e.preventDefault()
			  // $(this).tab('show')

				// $('.nav-tabs a').on('shown.bs.tab', function(event){
				  // var x = $(event.target).text();         // active tab
				  // var y = $(event.relatedTarget).text();
				// console.log(y)
				  
				// });

			// })


		

			// $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			// shown.bs.tab	

			// var target = $(e.target).attr("href") // activated tab
			// console.log(target)
			// alert(target);




			
		// })();
	
</script>



@endsection