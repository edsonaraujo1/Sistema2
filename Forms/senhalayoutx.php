<?php
        //Includes
        require_once("vcl/vcl.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class Unit2 extends Page
        {
               public $Edit12 = null;
               public $Label15 = null;
               public $Edit11 = null;
               public $Label14 = null;
               public $Edit10 = null;
               public $Label13 = null;
               public $Edit9 = null;
               public $Label10 = null;
               public $Label9 = null;
               public $Edit37 = null;
               public $Label29 = null;
               public $Label8 = null;
               public $Label40 = null;
               public $Label39 = null;
               public $Label7 = null;
               public $Edit6 = null;
               public $Edit3 = null;
               public $Label4 = null;
               public $Edit2 = null;
               public $Label3 = null;
               public $Edit1 = null;
               public $Edit4 = null;
               public $Edit5 = null;
               public $Memo1 = null;
               public $Edit8 = null;
               public $Edit7 = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label12 = null;
               public $Label11 = null;
               public $Label2 = null;
               public $Shape3 = null;
               public $Menssage = null;
               public $Label1 = null;
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
