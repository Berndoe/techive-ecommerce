<?

session_start();

unset($_SESSION['customer_id']);

unset($_SESSION['user_role']);

echo "<script>
        alert('Successfully logged out');
        window.location.href = '../index.php';
      </script>";


?>