<div class="content fl">

		<div class="contentbox">
			
			<input type="submit" value="Bestätigen" class="button-bl" />
			<input type="submit" value="Abbrechen" class="button-re" />

		</div>
		<div id="json"><?php print_r($data); ?></div>

		<script type="text/javascript">
$(document).ready(function() {

	$('#example').dataTable( {

		"ajax": "<?php echo $data['baseurl']; ?>settings/getUsers",

		"columns": [ {
					"data": "B_ID",
					"title": "ID"
				}, {
					"data": "B_Vorname",
					"title": "Vorname" 
				}, {
					"data": "B_Nachname",
					"title": "Nachname"
				}, {
					"data": "B_email",
					"title": "E-Mail"
				}, {
					"data": "Bg_ID",
					"title": "Bg_ID"
				}, {
					"data": "B_LastLogin",
					"title": "LastLogin"
				}, {
					"data": "Resethash",
					"title": "Resethash"
				}, {
					"data": "B_Username",
					"title": "Username"
				}, {
					"data": "B_Passwort",
					"title": "Passwort"
				} ],


	} );


});
</script>
		

							
							
					<table id="example" class="display" cellspacing="0" width="100%">

					</table>


	</div>