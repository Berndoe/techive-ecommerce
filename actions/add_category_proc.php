<?php 
include "../controllers/general_controller.php";

if(isset($_POST['add_category'])) {
    $category_name = $_POST['cat_name'];

    $add_category = add_category_fxn($category_name);

    if($add_category) {
        echo "<script>
        alert('Category added');
        
      </script>"; 

        header("Location: ../view/categories.php");
    }
    else {
        echo "<script>
        alert('Category added 2');
        
      </script>"; 
        header("Location: ../view/add_category.php");

    }
}
else {
    echo "<script>
        alert('Category added 2');
        
      </script>"; 
    echo "Form submission not detected.";
    header("Location: ../view/add_category.php");
}

?>