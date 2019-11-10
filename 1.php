<?php

$name = "PHPPOT";
$mcolor = "primary";
$m = "V";
// $node_ident=$node->ident;
// $count1 = count(App\Models\Cat::where('parent_id',$node->ident)->get());
// $count2 = count(App\Models\Product::where('cat_id',$node->ident)->get());
// $node_name=$node->name;

$node_ident="ident";
$count1 = 32;
$count2 = 123;
$node_name="Name";

$html = <<<EOT
  <li>
	<span class="badge label label-$mcolor menu_check" data-id="$node_ident">$m</span>
	<span class="badge label label-primary">
 		$count1 кат.
 	</span>
 	<span class="badge label label-info">
 		$count2 шт.
 	</span>
 	<span class="badge label label-success">
 		<a style="color:black;" data-toggle="collapse" href="#cola_$node->ident">
 			$node_name
 			<i class="fa fa-caret-down" aria-hidden="true"></i>
 		</a>
 	</span>
 	<a target="_blank" href="/cats/$node->ident">
 		<i class="fa fa-link" aria-hidden="true"></i>
	</a>
EOT; 


echo $html;
