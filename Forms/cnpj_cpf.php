<?php
        //Includes
        require_once("vcl/vcl.inc.php");
        use_unit("menus.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class Unit5 extends Page
        {
               public $Label5 = null;
               public $Label4 = null;
               public $Image3 = null;
               public $Label3 = null;
               public $Memo1 = null;
               public $Image2 = null;
               public $Image1 = null;
               public $Edit1 = null;
               public $Label2 = null;
               public $Shape3 = null;
               public $Label1 = null;
               public $Shape2 = null;
               public $Shape1 = null;
        }

        global $application;

        global $Unit5;

        //Creates the form
        $Unit5=new Unit5($application);

        //Read from resource file
        $Unit5->loadResource(__FILE__);

        //Shows the form
        $Unit5->show();

?>