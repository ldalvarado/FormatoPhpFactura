		
		<!--
			No saben lo que sufri 
			att: Luis Daniel.
		-->

		<script src="views/web/js/jquery.countdown.min.js"></script>
	    <script src="views/web/bootstrap/js/bootstrap.min.js"></script>
	    <!--<script src="views/web/js/waypoints.min.js"></script>-->
	    <script src="views/web/js/application.js"></script>
	    <!--<script src="views/web/morris/js/morris.min.js"></script>-->
	    <script src="views/web/morris/js/raphael.2.1.0.min.js"></script>
	    <script src="views/web/todo/js/todos.js"></script>
	    <script>
	        $(document).ready(function() {
	            app.timer();
	            app.map();
	            app.weather();
	            app.morrisPie();
	        });
	    </script>   
		<script src="views/web/icheck/js/icheck.min.js"></script>
	    <script>
	        $(document).ready(function() {
	            $('input').iCheck({
	                checkboxClass: 'icheckbox_flat-grey',
	                radioClass: 'iradio_flat-grey'
	            });

	        });
	    </script>
		<script src="views/web/js/sweetalert.min.js"></script>
		<script src="views/web/js/jquery.validate.min.js"></script>
	    <script src="views/app/js/nias.js"></script>
    	<?php
    	if(isset($_SESSION['app_id'])){
    		if($_users[$_SESSION['app_id']]['nivel'] == 3){ 
    	?>
    	<script src="views/app/js/users.js"></script>
    	<script src="views/app/js/admi.js"></script>
    	<script src="views/web/datatables/js/jquery.dataTables.js"></script>
    	<script src="views/web/datatables/js/dataTables.bootstrap.js"></script>
	    	<script>
	        $(document).ready(function() {
	            $('#userdata').dataTable();
	        });
	    </script>
    	<?php }else{ ?>
		<script src="views/app/js/users.js"></script>
    	<?php }} ?>
	    <!--<script src="views/web/js/main.js"></script>-->
	</body>
</html>