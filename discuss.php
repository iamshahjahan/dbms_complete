<!DOCTYPE html>
<html>
<head>
	<title>
		Discuss
	</title>
</head>
<body>
	<?php require_once('header1.php');?>
	<form class="form-horizontal tpad" role="form">
	  <fieldset>
	       <legend>Comment</legend>
	       <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Topic</label>
		    <div class="col-sm-10">
		      <input type="text" name="topic" class="form-control" id="topic" placeholder="Topic">
		    </div>
		  </div>
	       
		   <div class="form-group">
		   <label for="inputEmail3" class="col-sm-2 control-label">Message</label>
		    <div class="col-sm-10">
		      <textarea class="form-control" rows="3" name="message" placeholder="Message"></textarea>
		             
		    </div>
		    </div>

		   <div class="form-group">
		   <label for="inputEmail3" class="col-sm-2 control-label">Tags</label>
		    <div class="col-sm-10">
		      <label class="checkbox-inline">
			  <input type="checkbox" id="namaz" value="Namaz"> Namaz
			</label>

			<label class="checkbox-inline">
			  <input type="checkbox" id="roza" value="roza"> Roza 
			</label>

			<label class="checkbox-inline">
			  <input type="checkbox" id="Tohid" value="Tohid"> Tohid
			</label>
		    <label class="checkbox-inline">
			  <input type="checkbox" id="jakat" value="Jakat"> Jakat
			</label>
		             <label class="checkbox-inline">
			  <input type="checkbox" id="hajj" value="hajj"> hajj
			</label>
		             <label class="checkbox-inline">
			  <input type="checkbox" id="Manners" value="Manners"> Manners
			</label>
		             
		    </div>
		    </div>
					    
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-success">Sign in</button>
			    </div>
			  </div>
			
	      
		</fieldset>
</form>
<?php require_once('footer.php');?>
</body>
</html>