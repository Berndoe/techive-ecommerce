<?php
//connect to database class
require("../settings/db_class.php");
define("USER_ROLE", 1);

/**
 *General class to handle all functions 
 */
/**
 *@author David Sampah
 *
 */

class general_class extends db_connection
{
    // -- Customers -- //

    //--INSERT--//
    /**
     * Registering a customer
     */
    public function register_customer(
        $customer_name,
        $customer_email,
        $customer_pass,
        $customer_country,
        $customer_city,
        $customer_contact,
        $customer_image
    ) {

        $ndb = new db_connection();
        $customer_name = mysqli_real_escape_string($ndb->db_conn(), $customer_name);
        $customer_email = mysqli_real_escape_string($ndb->db_conn(), $customer_email);
        $customer_pass = mysqli_real_escape_string($ndb->db_conn(), $customer_pass);
        $hashed_password = mysqli_real_escape_string($ndb->db_conn(), password_hash($customer_pass, PASSWORD_DEFAULT));
        $customer_country = mysqli_real_escape_string($ndb->db_conn(), $customer_country);
        $customer_city = mysqli_real_escape_string($ndb->db_conn(), $customer_city);
        $customer_contact = mysqli_real_escape_string($ndb->db_conn(), $customer_contact);
        $customer_image = mysqli_real_escape_string($ndb->db_conn(), $customer_image);
        $user_role = USER_ROLE;


        $sql = "INSERT INTO customer(customer_name, customer_email, customer_pass, customer_country, customer_city,
        customer_contact, customer_image, user_role) VALUES ('$customer_name', '$customer_email', '$hashed_password', '$customer_country',
        '$customer_city', '$customer_contact', '$customer_image', '$user_role')";

        return $this->db_query($sql);
    }

    //--SELECT--//
    /**
     * Retrieving the customer information
     */
    public function get_customer($customer_id)
    {
        $ndb = new db_connection();
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);

        $sql = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
        return $this->db_fetch_one($sql);
    }

    public function get_customer_email($customer_email)
    {
        $ndb = new db_connection();
        $customer_email = mysqli_real_escape_string($ndb->db_conn(), $customer_email);

        $sql = "SELECT * FROM customer WHERE customer_email = '$customer_email'";
        return $this->db_fetch_one($sql);

    }

    public function get_customer_count()
    {
        $sql = "SELECT COUNT(*) AS customer_count FROM customer WHERE user_role = '1'";
        $result = $this->db_fetch_all($sql);
        return $result[0]['customer_count'];
    }

    //--UPDATE--//
    /**
     * Updating the customer information
     */
    public function update_customer(
        $customer_id,
        $customer_name,
        $customer_email,
        $customer_pass,
        $customer_city,
        $customer_contact,
        $customer_image,
    ) {

        $sql = "UPDATE customer SET 
            customer_name = '$customer_name', 
            customer_email = '$customer_email', 
            customer_pass = '$customer_pass', 
            customer_city = '$customer_city', 
            customer_contact = '$customer_contact',
            customer_image = '$customer_image', 
        WHERE 
            customer_id = '$customer_id'";

        return $this->db_query($sql);
    }

    public function update_customer_role($customer_id, $user_role)
    {
        $ndb = new db_connection();
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);
        $user_role = mysqli_real_escape_string($ndb->db_conn(), $user_role);

        $sql = "UPDATE customer SET user_role = '$user_role' WHERE customer_id = '$customer_id'";
        return $this->db_query($sql);
    }

    //--DELETE--//
    /**
     * Deleting the customer information
     */
    public function delete_customer($customer_id)
    {
        $ndb = new db_connection();
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);

        $sql = "DELETE FROM customer WHERE customer_id = '$customer_id'";
        return $this->db_query($sql);
    }

    // -- BRANDS -- //

    // --INSERT--//
    public function add_brand($brand_name)
    {
        $ndb = new db_connection();
        $brandName = mysqli_real_escape_string($ndb->db_conn(), $brand_name);

        $sql = "INSERT INTO brands (brand_name) VALUES ('$brandName')";
        return $this->db_query($sql);
    }

    // -- SELECT-- //
    public function get_brand($brand_id)
    {
        $ndb = new db_connection();
        $brand_id = mysqli_real_escape_string($ndb->db_conn(), $brand_id);

        $sql = "SELECT * FROM brands WHERE brand_id = '$brand_id'";
        return $this->db_fetch_one($sql);
    }

    public function get_brands($start = NULL, $end = NULL)
    {
        $sql = "SELECT * FROM brands";
        if ($start != NULL) {
            $sql .= " LIMIT $start, $end";
        }
        return $this->db_fetch_all($sql);
    }

    public function get_brand_count()
    {
        $sql = "SELECT COUNT(*) AS brand_count FROM brands";
        $result = $this->db_fetch_all($sql);
        return $result[0]['brand_count'];
    }


    // --UPDATE-- //
    public function update_brand($brand_id, $brand_name)
    {
        $ndb = new db_connection();
        $brand_name = mysqli_real_escape_string($ndb->db_conn(), $brand_name);
        $brand_id = mysqli_real_escape_string($ndb->db_conn(), $brand_id);
        $sql = "UPDATE brands SET brand_name = '$brand_name' WHERE brand_id = '$brand_id'";

        return $this->db_query($sql);
    }

    // --DELETE-- //
    public function delete_brand($brand_id)
    {
        $ndb = new db_connection();
        $brand_id = mysqli_real_escape_string($ndb->db_conn(), $brand_id);

        $sql = "DELETE FROM brands WHERE brand_id = '$brand_id'";
        return $this->db_query($sql);
    }

    // -- Categories -- //

    // --INSERT--//
    public function add_category($category_name)
    {
        $ndb = new db_connection();
        $category_name = mysqli_real_escape_string($ndb->db_conn(), $category_name);

        $sql = "INSERT INTO categories (cat_name) VALUES ('$category_name')";
        return $this->db_query($sql);
    }


    // -- SELECT-- //
    public function get_category($category_id)
    {
        $ndb = new db_connection();
        $category_id = mysqli_real_escape_string($ndb->db_conn(), $category_id);

        $sql = "SELECT * FROM categories WHERE cat_id = '$category_id'";
        return $this->db_fetch_one($sql);
    }

    public function get_categories($start = NULL, $end = NULL)
    {
        $sql = "SELECT * FROM categories";
        if ($start != NULL) {
            $sql .= " LIMIT $start, $end";
        }
        return $this->db_fetch_all($sql);
    }


    public function get_category_count()
    {
        $sql = "SELECT COUNT(*) AS category_count FROM categories";
        $result = $this->db_fetch_all($sql);
        return $result[0]['category_count'];
    }


    // --UPDATE-- //
    public function update_category($category_id, $category_name)
    {
        $ndb = new db_connection();
        $category_name = mysqli_real_escape_string($ndb->db_conn(), $category_name);
        $category_id = mysqli_real_escape_string($ndb->db_conn(), $category_id);

        $sql = "UPDATE categories SET cat_name = '$category_name' WHERE cat_id = '$category_id'";

        return $this->db_query($sql);
    }

    // --DELETE-- //
    public function delete_category($category_id)
    {
        $ndb = new db_connection();
        $category_id = mysqli_real_escape_string($ndb->db_conn(), $category_id);

        $sql = "DELETE FROM categories WHERE cat_id = '$category_id'";
        return $this->db_query($sql);
    }

    // --SELECT-- //
    public function get_product($product_id)
    {
        $ndb = new db_connection();
        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);

        $sql = "SELECT * FROM products LEFT JOIN categories 
        ON products.product_cat = categories.cat_id LEFT JOIN brands
        ON products.product_brand = brands.brand_id WHERE product_id = '$product_id'";
        return $this->db_fetch_one($sql);
    }

    public function get_products($start = NULL, $end = NULL)
    {
        $sql = "SELECT * FROM products LEFT JOIN categories 
        ON products.product_cat = categories.cat_id LEFT JOIN brands
        ON products.product_brand = brands.brand_id";
        if ($start != NULL) {
            $sql .= " LIMIT $start, $end";
        }
        return $this->db_fetch_all($sql);
    }

    public function get_product_count()
    {
        $sql = "SELECT COUNT(*) AS product_count FROM products";
        $result = $this->db_fetch_all($sql);
        return $result[0]['product_count'];
    }

    public function get_stock($product_id)
    {
        $ndb = new db_connection();
        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);

        $sql = "SELECT stock_quantity AS stock FROM products WHERE product_id = '$product_id'";
        return $this->db_fetch_one($sql);
    }


    public function get_products_by_category($category_id)
    {
        $ndb = new db_connection();
        $category_id = mysqli_real_escape_string($ndb->db_conn(), $category_id);

        $sql = "SELECT * FROM products LEFT JOIN categories 
        ON products.product_cat = categories.cat_id LEFT JOIN brands
        ON products.product_brand = brands.brand_id WHERE product_cat = '$category_id'";

        return $this->db_fetch_all($sql);
    }
    public function search_products($keyword)
    {
        $ndb = new db_connection();
        $keyword = mysqli_real_escape_string($ndb->db_conn(), $keyword);

        $sql = "SELECT p.product_id, p.product_cat, c.cat_name, p.product_title, 
        p.stock_quantity, p.product_price, p.product_desc, p.product_image FROM 
        products p JOIN categories c ON p.product_cat = c.cat_id WHERE 
        p.product_title LIKE '%$keyword%' OR p.product_keywords LIKE '%$keyword%' ";

        return $this->db_fetch_all($sql);
    }


    // --INSERT-- //
    public function add_product(
        $product_cat,
        $product_brand,
        $product_title,
        $product_price,
        $product_desc,
        $product_image,
        $product_keywords
    ) {

        $ndb = new db_connection();
        $product_cat = mysqli_real_escape_string($ndb->db_conn(), $product_cat);
        $product_brand = mysqli_real_escape_string($ndb->db_conn(), $product_brand);
        $product_title = mysqli_real_escape_string($ndb->db_conn(), $product_title);
        $product_price = mysqli_real_escape_string($ndb->db_conn(), $product_price);
        $product_desc = mysqli_real_escape_string($ndb->db_conn(), $product_desc);
        $product_image = mysqli_real_escape_string($ndb->db_conn(), $product_image);
        $product_keywords = mysqli_real_escape_string($ndb->db_conn(), $product_keywords);

        $values = "'$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords'";

        $sql = "INSERT INTO products (product_cat, product_brand, product_title, 
        product_price, product_desc, product_image, product_keywords) VALUES ($values)";

        return $this->db_query($sql);
    }


    // --UPDATE-- //
    public function update_product(
        $product_id,
        $product_cat,
        $product_brand,
        $product_title,
        $product_price,
        $stock_quantity,
        $product_desc,
        $product_keywords
    ) {


        $ndb = new db_connection();
        $product_cat = mysqli_real_escape_string($ndb->db_conn(), $product_cat);
        $product_brand = mysqli_real_escape_string($ndb->db_conn(), $product_brand);
        $product_title = mysqli_real_escape_string($ndb->db_conn(), $product_title);
        $product_price = mysqli_real_escape_string($ndb->db_conn(), $product_price);
        $stock_quantity = mysqli_real_escape_string($ndb->db_conn(), $stock_quantity);
        $product_desc = mysqli_real_escape_string($ndb->db_conn(), $product_desc);
        $product_keywords = mysqli_real_escape_string($ndb->db_conn(), $product_keywords);


        $sql = "UPDATE products SET  
        product_cat = '$product_cat', 
        product_brand = '$product_brand', 
        product_title = '$product_title', 
        product_price = '$product_price', 
        stock_quantity = '$stock_quantity',
        product_desc = '$product_desc',
        product_keywords = '$product_keywords'
    WHERE 
        product_id = '$product_id'";

        return $this->db_query($sql);
    }

    public function update_stock($product_id, $r_qty)
    {
        $sql = "UPDATE products SET stock_quantity ='$r_qty' WHERE product_id ='$product_id'";
        return $this->db_query($sql);
    }

    // --DELETE-- //
    public function delete_product($product_id)
    {
        $ndb = new db_connection();
        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);

        $sql = "DELETE FROM products WHERE product_id = '$product_id'";
        return $this->db_query($sql);
    }


    //--SELECT--//
    public function check_duplicate_log($product_id, $customer_id)
    {
        $ndb = new db_connection();
        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);

        $sql = "SELECT * FROM cart WHERE p_id = '$product_id' AND c_id = '$customer_id'";
        return $this->db_fetch_all($sql);
    }

    public function check_duplicate_nlog($product_id, $ip_address) {
        $ndb = new db_connection();
        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);
        $ip_address = mysqli_real_escape_string($ndb->db_conn(), $ip_address);

        $sql = "SELECT * FROM cart WHERE p_id = '$product_id' AND ip_add = '$ip_address'";
        return $this->db_fetch_all($sql);
    }

    public function view_cart($customer_id)
    {
        $ndb = new db_connection();
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);

        $sql = "SELECT * FROM cart LEFT JOIN products ON cart.p_id = products.product_id LEFT JOIN 
        customer ON cart.c_id = customer.customer_id WHERE c_id = '$customer_id'";
        return $this->db_fetch_all($sql);
    }


    public function view_cart_nlog($ip_address)
    {
        $ndb = new db_connection();
        $ip_address = mysqli_real_escape_string($ndb->db_conn(), $ip_address);

        $sql = "SELECT * FROM cart LEFT JOIN products ON cart.p_id = products.product_id WHERE ip_add = '$ip_address'";
        return $this->db_fetch_all($sql);
    }

    public function get_cart_items_no($customer_id)
    {
        $ndb = new db_connection();
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);

        $sql = "SELECT SUM(qty) AS count FROM cart WHERE c_id = '$customer_id'";
        return $this->db_fetch_one($sql);
    }

    public function get_cart_items_no_nlog($ip_address)
    {
        $ndb = new db_connection();
        $ip_address = mysqli_real_escape_string($ndb->db_conn(), $ip_address);

        $sql = "SELECT count(c_id) AS count FROM cart WHERE ip_add = '$ip_address'";
        return $this->db_query($sql);
    }

    public function get_cart_value($customer_id)
    {
        $ndb = new db_connection();
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);

        $sql = "SELECT SUM(products.product_price * cart.qty * cart.duration) as result FROM cart JOIN products ON (products.product_id = cart.p_id) WHERE cart.c_id = '$customer_id'";
        return $this->db_fetch_one($sql);
    }

    //--INSERT--/
    public function add_to_cart($product_id, $ip_address, $customer_id, $quantity)
    {
        $ndb = new db_connection();

        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);
        $ip_address = mysqli_real_escape_string($ndb->db_conn(), $ip_address);
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);
        $quantity = mysqli_real_escape_string($ndb->db_conn(), $quantity);

        $sql = "INSERT INTO cart (p_id, ip_add, c_id, qty) VALUES ('$product_id', '$ip_address', '$customer_id', '$quantity')";
        return $this->db_query($sql);
    }

    public function add_to_cart_nlog($product_id, $customer_id, $quantity)
    {
        $ndb = new db_connection();

        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);
        $quantity = mysqli_real_escape_string($ndb->db_conn(), $quantity);

        $sql = "INSERT INTO cart (p_id, ip_add, qty) VALUES ('$product_id', '$customer_id', '$quantity')";
        return $this->db_query($sql);
    }

    
    //--UPDATE--//

    public function update_cart_item_qty($product_id, $customer_id, $qty, $duration)
    {
        $ndb = new db_connection();
        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);
        $qty = mysqli_real_escape_string($ndb->db_conn(), $qty);
        $duration = mysqli_real_escape_string($ndb->db_conn(), $duration);

        $sql = "UPDATE cart SET qty ='$qty', duration = '$duration' WHERE p_id ='$product_id' AND c_id ='$customer_id'";
        return $this->db_query($sql);
    }

    public function update_cart_item_qty_nlog($product_id, $ip_address, $qty, $duration)
    {
        $ndb = new db_connection();
        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);
        $ip_address = mysqli_real_escape_string($ndb->db_conn(), $ip_address);
        $qty = mysqli_real_escape_string($ndb->db_conn(), $qty);
        $duration = mysqli_real_escape_string($ndb->db_conn(), $duration);

        $sql = "UPDATE cart SET qty ='$qty', duration = '$duration' WHERE p_id ='$product_id' AND ip_add ='$ip_address'";
        return $this->db_query($sql);
    }


    public function update_cart_with_user_id($customer_id, $ip_add)
    {
        $ndb = new db_connection();
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);
        $ip_add = mysqli_real_escape_string($ndb->db_conn(), $ip_add);

        $sql = "UPDATE cart SET c_id ='$customer_id' WHERE ip_add ='$ip_add'";
        return $this->db_query($sql);
    }

    //--DELETE--//
    public function delete_cart_item($product_id, $customer_id)
    {
        $ndb = new db_connection();
        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);

        $sql = "DELETE FROM cart WHERE p_id ='$product_id' AND c_id = '$customer_id'";
        return $this->db_query($sql);
    }

    //--DELETE--//
    public function delete_cart_item_nlog($product_id, $ip_address)
    {
        $ndb = new db_connection();
        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);
        $ip_address = mysqli_real_escape_string($ndb->db_conn(), $ip_address);

        $sql = "DELETE FROM cart WHERE p_id ='$product_id' AND ip_add = '$ip_address'";
        return $this->db_query($sql);
    }

    public function clear_cart($customer_id)
    {
        $ndb = new db_connection();
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);

        $sql = "DELETE FROM cart WHERE c_id = '$customer_id'";
        return $this->db_query($sql);
    }


    //--SELECT--//
    public function get_orders($order_id)
    {
        $ndb = new db_connection();
        $order_id = mysqli_real_escape_string($ndb->db_conn(), $order_id);

        $sql = "SELECT * FROM orders WHERE order_id = '$order_id'";
        return $this->db_fetch_all($sql);
    }

    public function get_all_orders() {
        $sql = "SELECT * FROM orders";
        return $this->db_fetch_all($sql);
    }

    public function get_recent_orders()
    {
        $sql = "SELECT MAX(order_id) as recent FROM orders";
        return $this->db_fetch_one($sql);
    }

    public function get_order_details($order_id)
    {
        $ndb = new db_connection();
        $order_id = mysqli_real_escape_string($ndb->db_conn(), $order_id);

        $sql = "SELECT products.product_title, products.product_image, products.product_price, orderdetails.qty, orderdetails.qty*products.product_price as result
         FROM orderdetails JOIN products ON (orderdetails.product_id = products.product_id) WHERE order_id ='$order_id'";
        return $this->db_fetch_all($sql);
    }

    public function get_payment($order_id)
    {
        $ndb = new db_connection();
        $order_id = mysqli_real_escape_string($ndb->db_conn(), $order_id);

        $sql = "SELECT amt FROM payment WHERE order_id ='$order_id'";
        return $this->db_fetch_one($sql);
    }

    //--INSERT--//
    public function add_order($customer_id, $invoice_no, $order_date, $order_status)
    {
        $ndb = new db_connection();
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);
        $invoice_no = mysqli_real_escape_string($ndb->db_conn(), $invoice_no);
        $order_date = mysqli_real_escape_string($ndb->db_conn(), $order_date);
        $order_status = mysqli_real_escape_string($ndb->db_conn(), $order_status);

        $sql = "INSERT INTO orders (customer_id, invoice_no, order_date, order_status) VALUES ('$customer_id', '$invoice_no','$order_date', '$order_status')";
        return $this->db_query($sql);
    }

    public function add_order_details($order_id, $product_id, $qty)
    {
        $ndb = new db_connection();
        $order_id = mysqli_real_escape_string($ndb->db_conn(), $order_id);
        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);
        $qty = mysqli_real_escape_string($ndb->db_conn(), $qty);

        $sql = "INSERT INTO orderdetails (order_id, product_id, qty) VALUES ('$order_id', '$product_id', '$qty')";
        return $this->db_query($sql);
    }

    //--UPDATE--//
    public function update_order_status($product_id, $order_id)
    {
        $ndb = new db_connection();
        $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);
        $order_id = mysqli_real_escape_string($ndb->db_conn(), $order_id);
        
        $sql = "UPDATE orders SET order_status ='fulfilled' WHERE order_id ='$order_id'";
        return $this->db_query($sql);
    }


    //--INSERT--//
    public function add_payment($amount, $customer_id, $order_id, $currency, $payment_date)
    {
        $ndb = new db_connection();
        $amount = mysqli_real_escape_string($ndb->db_conn(), $amount);
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);
        $order_id = mysqli_real_escape_string($ndb->db_conn(), $order_id);
        $currency = mysqli_real_escape_string($ndb->db_conn(), $currency);
        $payment_date = mysqli_real_escape_string($ndb->db_conn(), $payment_date);

        $sql = "INSERT INTO payment (amt, customer_id, order_id, currency, payment_date) VALUES ('$amount', '$customer_id', '$order_id', '$currency', '$payment_date')";
        return $this->db_query($sql);
    }

    //--SELECT--//
    public function get_all_users() {
        $sql = "SELECT * FROM customer";
        return $this->db_fetch_all($sql);
    }
    
    public function get_user_count() {
        $sql = "SELECT COUNT(*) AS user_count FROM customer";
        $result = $this->db_fetch_all($sql);
        return $result[0]['user_count'];
    }

    //--SELECT--//
    public function add_to_contact($customer_name, $customer_email, $message) {
        $ndb = new db_connection();
        $customer_name = mysqli_real_escape_string($ndb->db_conn(), $customer_name);
        $customer_email = mysqli_real_escape_string($ndb->db_conn(), $customer_email);
        $message = mysqli_real_escape_string($ndb->db_conn(), $message);

        $sql = "INSERT INTO customer_contact (customer_name, customer_email, customer_message) VALUES ('$customer_name', '$customer_email', '$message')";
        return $this->db_query($sql);
    }

    public function get_contacts() {
        $sql = "SELECT * FROM customer_contact";
        return $this->db_fetch_all($sql);
    }
}
