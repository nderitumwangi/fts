
<?php
echo '<script type="text/javascript">

swal("Good job!", "You clicked the button!", "success");
 </script>';
?>
<!DOCTYPE html>
<head>

        <script type="text/javascript" src="../assets/js/sweetalert.min.js">
        </script>
        <link rel="stylesheet" type="text/css" href="../assets/css/sweetalert.css">
    

<script type="text/javascript">
    swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel plx!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    swal("Deleted!", "Your imaginary file has been deleted.", "success");
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
})
</script>

</head>


</html>
