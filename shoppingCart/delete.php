<?php

session_start();
session_destroy();

header("location:template.php?content=display_shopping_cart.php");
