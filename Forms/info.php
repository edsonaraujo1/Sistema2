<?php
        //Includes
        require_once("vcl/vcl.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class Unit2 extends Page
        {
               public $Label4 = null;
               public $Label3 = null;
               public $Shape7 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $Image3 = null;
               public $Shape6 = null;
               public $Image2 = null;
               public $Image1 = null;
               public $Shape5 = null;
               public $Shape4 = null;
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