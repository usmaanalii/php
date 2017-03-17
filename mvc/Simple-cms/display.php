<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <!--
    *********************************************************************************
    *
    * File: display.php   | For retrieving and displaying data from the DB.
    *
    *
    * Created by Jason Lengstorf for Ennui Design. Copyright (C) 2008 Ennui Design.
    *
    *        www.EnnuiDesign.com | answers@ennuidesign.com | (406) 270-4435
    *
    * -----------------------------------------------------------------------------
    *
    * This file was created to accompany an article written for CSS-Tricks.com
    *
    *********************************************************************************
  -->

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>Simple CMS with PHP</title>

    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>

  <body>
  	<div id="page-wrap">
    <?php

      include_once('_class/simpleCMS.php');
      $obj = new simpleCMS();

	  /* CHANGE THESE SETTINGS FOR YOUR OWN DATABASE */
      $obj->host = 'localhost';
      $obj->username = 'username';
      $obj->password = 'password';
      $obj->table = 'testDB';
      $obj->connect();

      if ( $_POST )
        $obj->write($_POST);

      echo ( $_GET['admin'] == 1 ) ? $obj->display_admin() : $obj->display_public();

    ?>
	</div>
  </body>

</html>
