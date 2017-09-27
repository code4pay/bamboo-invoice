<?php
$this->load->view('header');
?>
<h2><?php echo $page_title;?></h2>
<?php 
$this->load->view('login/loginform');
$this->load->view('signup/signupform');
$this->load->view('footer');
?>