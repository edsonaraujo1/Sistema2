<?php
        //Includes
        require_once("vcl/vcl.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class Unit1 extends Page
        {
               public $Label7 = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $Image7 = null;
               public $Image6 = null;
               public $Image5 = null;
               public $Image4 = null;
               public $Image3 = null;
               public $Image2 = null;
               public $Image1 = null;
               public $Label71 = null;

        }

        global $application;

        global $Unit1;

        //Creates the form
        $Unit1=new Unit1($application);

        //Read from resource file
        $Unit1->loadResource(__FILE__);

        //Shows the form
        $Unit1->show();

?>
