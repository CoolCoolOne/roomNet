<?php

$connect = mysqli_connect('localhost','root','123','room');

if (!$connect) {
    die('errorconnect with DB room');
}
