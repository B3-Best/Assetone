<div class="content fl">

		
		<div class="contentbox-large">
		
					<h3>Raum Selector</h3>

					<div id="room-sel-left" class="fl" style="width: 54%;">

						<section id="floorplans">

						<div class="parent" style="overflow: hidden; position: relative;">
							<div id="svgFloorplan" class="panzoom" style="-webkit-transform: matrix(1, 0, 0, 1, 0, 0); -webkit-backface-visibility: hidden; -webkit-transform-origin: 50% 50%; cursor: move; transition: -webkit-transform 200ms ease-in-out; -webkit-transition: -webkit-transform 200ms ease-in-out;">
								<?php include("assets/media/img/floorplan.svg"); ?>
							</div>
						</div>
						
						<div class="button-gr" style="position: absolute; left: 80px; top: 440px; min-width: 50px; min-height: 10px;">
							<button class="zoom-in ico-rselector-magnifier fl" style="margin: 0 10px 0 5px; cursor: pointer;"></button>
							<button class="zoom-out ico-rselector-mover fl" style="margin: 0 10px 0 5px; cursor: pointer;"></button>
							<div class="reset ico-rselector-mouse fl" style="margin: 0 10px 0 5px; cursor: pointer;"></div>
							<input style="width: 50px;" type="range" class="zoom-range" step="0.05" min="0.4" max="5">
						</div>

							<!-- Floorplan SVG Elements -->
							<script src="<?php echo $data['baseurl']; ?>assets/lib/js/jquery.mousewheel.js"></script>
							<script src="<?php echo $data['baseurl']; ?>assets/lib/js/jquery.panzoom.js"></script>
	
							<script type="text/javascript">
							(function() {
								var $section = $('section').first();
									$section.find('.panzoom').panzoom({
									$zoomIn: $section.find(".zoom-in"),
									$zoomOut: $section.find(".zoom-out"),
									$zoomRange: $section.find(".zoom-range"),
									$reset: $section.find(".reset")
								});
							})();
							
							var colorCache = null;
							var lastSelectedCache = null;
							$('rect[id^="R"]').click(function() {
								$('#room-sel-right').fadeIn();
								$('#rooms-tablebox').slideDown('slow');
								
								if (lastSelectedCache != this && lastSelectedCache != null){
									colorCache = $("#" + this.id).css("fill");
									$("#" + lastSelectedCache.id).css({"fill": colorCache});
								}
								lastSelectedCache = this;						
								$("#" + this.id).css({"fill": "#fef163"});
								loadDataTable(this.id);
							});
							</script>
						</section>
						
						<div id="room-sel-path" class="button-gr" style="position: absolute; top: 105px; left: 390px; min-width: 50px; min-height: 10px;">
							Stockwerk 1 / R002
						</div>
						
					</div>
					
					<div class="cnt-split-vertical fl" style="height: 400px;"></div>
					
					<div id="room-sel-right" class="fl" style="display: none; width: 40%; padding: 0 0 0 30px;">
					
						<h5>R002</h5>
						<table>
					  	  <tbody>
							<tr>
						  	   <td style="width: 20%; border-right: 1px solid #ddd;">ID:</td>
						  	   <td style="padding: 0 0 0 10px;">002</td>
							</tr>
							<tr>
						  	   <td style="width: 20%; border-right: 1px solid #ddd;">Bezeichnung:</td>
						  	   <td style="padding: 0 0 0 10px;">Labor</td>
							</tr>
							<tr>
						  	   <td style="width: 20%; border-right: 1px solid #ddd;">PCs:</td>
						  	   <td style="padding: 0 0 0 10px;">11</td>
							</tr>
							<tr>
						  	   <td style="width: 20%; border-right: 1px solid #ddd;">Beamer:</td>
						  	   <td style="padding: 0 0 0 10px;">Ja</td>
							</tr>
					  	  </tbody>
						</table>
					
					</div>
					
				</div>
				<div id="rooms-tablebox" class="contentbox-large" style="display: none;">
				<script type="text/javascript">
					var dataTable = null;
					
					function loadDataTable(roomName)
					{
						if (dataTable == null)
						{
							dataTable = $('#table-layer').DataTable( {
								"ajax": "<?php echo $data['baseurl']; ?>rooms/getRoomComponents/"+roomName,

								"columns": [ {
											"data": "K_ID",
											"title": "ID"
										}, {
											"data": "K_Name",
											"title": "Bezeichnung" 
										}, {
											"data": "K_Art_Bezeichnung",
											"title": "Art"
										}, {
											"data": "count",
											"title": "Anzahl"
										} ,{
											"data": "L_Name",
											"title": "Lieferant"
										},{
											"data": "R_Bezeichnung",
											"title": "Raum"
										}
										,{
											"data": "K_Hersteller",
											"title": "Hersteller"
										}],
							});
						}
						else
						{
							dataTable.ajax.url("<?php echo $data['baseurl']; ?>rooms/getRoomComponents/"+roomName).load();
						}
					}
			</script>
			
			
			<table id="table-layer" class="display"></table>
		</div>
		<div class="contentbox">
			<h3>Raum hinzufügen</h3>
			<div id="add-comp-left" class="fl" style="width: 328px">
				<p>Bezeichnung</p>
				<input class="input_def" id="name" name="name" value="" />
				<p><input type="submit" value="Hinzufügen" onClick="addRoom()" class="button-bl" /></p>
				<p id="add-comp-result"></p>
			</div>
		</div>
	</div>