<!DOCTYPE html>
<html>
<head>
  <script src="../../dist/sweetalert.min.js"></script>
  <script src="../../dist/sweetalert.js"></script>
  <link rel="stylesheet" type="text/css" href="../../dist/sweetalert.css">
</head>
<body>

<?php

class alerts{

  function alertSuccess(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Nice!","Successfuly Created!","success");';
      echo '}, 1000);</script>';
  }

   function alertSold(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Nice!","Unit has been Sold!","success");';
      echo '}, 1000);</script>';
  }

  function alertWarning(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Opps! Sorry!","Data Already Existing!","error");';
      echo '}, 1000);</script>';
  }

   function alertWarnAsh(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Opps! Sorry!","An error occurred because: $error1,$error2","error");';
      echo '}, 1000);</script>';
  }

  function alertMax(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Opps! Sorry!","This section reach max limit of block!","warning");';
      echo '}, 1000);</script>';

  }

  function alertUpdate(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Nice!","Successfuly Updated!","success");';
      echo '}, 1000);</script>';

  }

  function alertChange(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Opps! Sorry!","Insufficient Amount Paid!","error");';
      echo '}, 1000);</script>';
  }

}



?>

</body>
</html>