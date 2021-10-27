<?php
session_start();
session_unset();
session_destroy();


echo "Email = " . $_SESSION['email'];

?>
<script>
  alert('Anda telah logout.')
  window.location = 'login2.php'
</script>