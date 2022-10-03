<?php 
    class database{
        protected $con;
        function __construct(){
            $this->con = new mysqli("localhost","root", "", "login_f");
        }
    } 