<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header" data-target="navbar-collapse-menu">
            <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
            <span class="sr-only">
        	Toggle navigation
    		</span>
    		<span class="icon-bar"></span>
    		<span class="icon-bar"></span>
    		<span class="icon-bar"></span>
    		</button>
            <a class="navbar-brand" href="#"></a>
        </div>

        <div class="navbar-collapse collapse" id="navbar-collapse-menu">

        <ul class="nav navbar-nav">
            <li><img src="<?php echo IMG.'logo.png';?>"style="text-align:right;"></li>
  			<li><a href="<?php echo(URL.'index.php/controller/index')?>">Home</a></li>
		</ul>
        <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" role="form" method="POST" enctype="multipart/form-data" action="<?php echo(URL.'index.php/controller/retrieve')?>">
                <div class="form-group">
                <input type="text" class="form-control" name="bookingID" placeholder="Retrieve Ticket">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form> 
        </ul>
        </div>
    </div>
</div>

