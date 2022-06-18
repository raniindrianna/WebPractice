<?php

session_start();
session_destroy();

header("location:template.php?content=displayCourseCart.php");
