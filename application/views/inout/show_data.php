<!-- <table>
<tbody>
	<tr>
		<th> Document</th>
	</tr>

</tbody>
</table>
 -->

 <h5 class="tit"> <?php echo $title; ?> </h5>
 <ul>
 <?php foreach( $result as $doc) { ?>
 	<li> <?php echo $doc; ?> </li>
 <?php } ?>
 </ul>
</div>