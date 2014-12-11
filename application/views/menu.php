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
  			<li <?php if($title=='home'){echo "class='active'";}?>><a href="<?php echo(URL.'index.php/controller/index')?>">Home</a></li>
  			<li <?php if($title=='location'){echo "class='active'";}?>><a href="<?php echo(URL.'index.php/controller/location')?>">Location</a></li>
			</ul>
        </div>
    </div>
</div>

