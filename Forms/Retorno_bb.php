<?php
        //Includes
        require_once("vcl/vcl.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class Unit2 extends Page
        {
               public $Image6 = null;
               public $Image5 = null;
               public $Image4 = null;
               public $Label5 = null;
               public $Label3 = null;
               public $Image3 = null;
               public $RadioButton3 = null;
               public $Image2 = null;
               public $RadioButton2 = null;
               public $Image1 = null;
               public $RadioButton1 = null;
               public $Edit2 = null;
               public $Edit1 = null;
               public $Label1 = null;
               public $Label68 = null;
               public $Label4 = null;
               public $Label26 = null;
               public $Label22 = null;
               public $Label11 = null;
               public $Label2 = null;
               public $Shape3 = null;
               public $Shape2 = null;
               public $Shape1 = null;
        }

        global $application;

        global $Unit2;

        //Creates the form
        $Unit2=new Unit2($application);

        //Read from resource file
        $Unit2->loadResource(__FILE__);

        //Shows the form
        $Unit2->show();

?>
