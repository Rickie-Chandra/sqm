<br/>
<footer>
<style type="text/css">footer {color:#FFFFCC;}</style>
<div class="navbar navbar-inverse navbar-static-bottom">
	<div class="col-lg-6">
	Social Media:<br />
		<a href="<?php echo $footer[0]->fb;?>">
		<img src="<?echo IMG.'fb.png';?>" style="text-align:left;"></a>
		<a href="<?php echo $footer[0]->twitter;?>">
		<img src="<?echo IMG.'twitter.png';?>"style="text-align:left;"></a>
		<a href="<?php echo $footer[0]->insta;?>">
		<img src="<?echo IMG.'instagram.png';?>"style="text-align:left;"></a>
	</div>

    <div class="col-lg-6" align="right">
		<h6>
		<?php
		echo $footer[0]->add1."<br />";
		echo $footer[0]->add2."<br />";
		echo $footer[0]->add3;
		?>
		</h6>
	</div>
</div>

</footer>