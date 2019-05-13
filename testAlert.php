<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
					<script src="../js/dist/sweetalert.min.js"></script>
					<link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
					<script>
					$( document ).ready(function() {
swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel plx!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
						
					}); </script>