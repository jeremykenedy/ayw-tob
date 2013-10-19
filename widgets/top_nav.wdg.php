<?php 
$user = $red->data->session->user; 
$page = $red->page;
?>

<div id="mainNav" class="navbar navbar-inverse" role="navigation">
	<div class="navbar-header">
		<?php $page->linkTo(array("href" => "home", "class" => "navbar-brand"), $red->page->image('friends.png', false, array('id' =>'navImage'))."<span class='nav-bar-brand-text'>trust.or.betray</span>");?>
	</div>
  <?php
  if ($user->authenticated){ ?>
	<ul class="nav navbar-nav navbar-right">
      <li><?php $page->linkTo(array("id" => "greeting_text", "href" => "profile"), "hello.".str_replace(' ','.',strtolower($user->username)));?></li>
      
      <li><?php $page->linkTo(array("id" => "signout"),"log.out");?></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">place.holder <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><?php $page->linkTo(array("href" => "home"),"home");?></li>
        </ul>
      </li>
    </ul>
    <?php 
    } ?>
</div>