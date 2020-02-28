<ul>
<li><a class="<?php if($isActive == 'home'){echo 'active';} else { echo '';} ?>" href="<?= base_url(); ?>index.php?/Home">Home</a></li>
 <li><a class="<?php if($isActive == 'edit'){echo 'active';} else { echo '';} ?>" href="<?= base_url(); ?>index.php?/Edit">Edit</a></li>
 <li><a class="<?php if($isActive == 'quiz'){echo 'active';} else { echo '';} ?>" href="<?= base_url(); ?>index.php?/Quiz">Quiz</a></li>
 <li><a class="<?php if($isActive == 'about'){echo 'active';} else { echo '';} ?>" href="<?= base_url(); ?>index.php?/About">About</a></li>


</ul>
