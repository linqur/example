<?php
include_once 'header_mail.html';
$email = $_POST['email'];
$title = $_POST['title'];
$massage = $_POST['massage'];
echo "<br/> $email <br/> $title <br/> $massage <br/>";
include_once 'footer.html';

