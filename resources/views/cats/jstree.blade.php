@section('css')
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
		{{-- <link rel="stylesheet" type="text/css" href="/css/bootstrap-treeview.min.css"> --}}
@endsection

	<div id="tree">	</div>

<script src="/js/bootstrap-treeview.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>

<script type="text/javascript">
    {{-- window.jstree = require('https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js'); --}}

jQuery(function($) {

	$('#tree').jstree({ 'core' : {
	    'data' : [
			@foreach ( App\Models\Cat::all() as $line)
			       { "id" : {{ $line->ident }}, "parent" : {!! $line->parent_id === 0 ? '"#"' : $line->parent_id !!}, "text" : "{{ $line->name }}" },
			@endforeach
	    	]
		}
	 });

  });



    


</script>




@section('scripts')



@endsection