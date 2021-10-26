<?php
session_start();
session_unset();
session_destroy();


echo "Username = " . $_SESSION['username'];

?>
<script>
  alert('Anda telah logout.')
  window.location = 'login.php'
</script>