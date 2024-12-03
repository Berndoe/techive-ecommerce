<?php
//connect to the user account class
include_once("../classes/general_class.php");

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new customer_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//
function register_customer_fxn(
    $customer_name,
    $customer_email,
    $customer_pass,
    $customer_country,
    $customer_city,
    $customer_contact,
    $customer_image
) {

    $add_customer = new general_class();
    return $add_customer->register_customer(
        $customer_name,
        $customer_email,
        $customer_pass,
        $customer_country,
        $customer_city,
        $customer_contact,
        $customer_image
    );
}

function get_customer_fxn($customer_id)
{
    $get_customer = new general_class();

    return $get_customer->get_customer($customer_id);
}

function get_customer_email_fxn($customer_email) {
    $get_customer_email = new general_class();
    return $get_customer_email->get_customer_email($customer_email);
}

function get_customer_count_fxn()
{
    $get_customer_count = new general_class();
    return $get_customer_count->get_customer_count();
}

//--UPDATE--//
function update_customer_fxn(
    $customer_id,
    $customer_name,
    $customer_email,
    $customer_pass,
    $customer_city,
    $customer_contact,
    $customer_image
) {

    $update_customer = new general_class();
    return $update_customer->update_customer(
        $customer_id,
        $customer_name,
        $customer_email,
        $customer_pass,
        $customer_city,
        $customer_contact,
        $customer_image
    );
}

function update_customer_role_fxn($customer_id, $user_role) {
    $update_customer_role = new general_class();
    return $update_customer_role->update_customer_role($customer_id, $user_role);

}

//--DELETE--//
function delete_customer_fxn($customer_id)
{
    $get_customer = new general_class();

    return $get_customer->delete_customer($customer_id);
}

//--INSERT--//
function add_brand_fxn($brand_name)
{
    $add_brand = new general_class();
    return $add_brand->add_brand($brand_name);
}

//--SELECT--//
function get_brand_fxn($brand_id)
{
    $get_brand = new general_class();
    return $get_brand->get_brand($brand_id);
}
function get_brands_fxn($start = NULL, $end = NULL)
{
    $get_brands = new general_class();
    return $get_brands->get_brands($start, $end);
}

function get_brands_count_fxn()
{
    $get_brands_count = new general_class();
    return $get_brands_count->get_brand_count();
}

//--UPDATE--//
function update_brand_fxn($brand_id, $brand_name)
{
    $update_brand = new general_class();
    return $update_brand->update_brand($brand_id, $brand_name);
}

//--DELETE--//
function delete_brand_fxn($brand_id)
{
    $delete_brand = new general_class();
    return $delete_brand->delete_brand($brand_id);
}


//--INSERT--//
function add_category_fxn($category_name)
{
    $add_category = new general_class();
    return $add_category->add_category($category_name);
}

//--SELECT--//
function get_category_fxn($category_id)
{
    $get_category = new general_class();
    return $get_category->get_category($category_id);
}
function get_categories_fxn($start = NULL, $end = NULL)
{
    $get_categories = new general_class();
    return $get_categories->get_categories($start, $end);
}

function get_categories_count_fxn()
{
    $get_categories_count = new general_class();
    return $get_categories_count->get_category_count();
}
//--UPDATE--//
function update_category_fxn($category_id, $category_name)
{
    $update_category = new general_class();
    return $update_category->update_category($category_id, $category_name);
}

//--DELETE--//
function delete_category_fxn($category_id)
{
    $delete_category = new general_class();
    return $delete_category->delete_category($category_id);
}


//--SELECT--//
function get_product($product_id)
{
    $get_product = new general_class();
    return $get_product->get_product($product_id);
}

function get_products_fxn($start = NULL, $end = NULL)
{
    $get_products = new general_class();
    return $get_products->get_products($start, $end);
}

function get_products_count_fxn()
{
    $get_products_count = new general_class();
    return $get_products_count->get_product_count();
}

function get_stock_fxn($product_id) {
    $get_stock = new general_class();
    return $get_stock->get_stock($product_id);
}

function get_products_by_category_fxn($category_id)
{
    $get_products_by_category = new general_class();
    return $get_products_by_category->get_products_by_category($category_id);
}

function search_products_fxn($term)
{
    $search_products = new general_class();
    return $search_products->search_products($term);
}
//--INSERT--//
function add_product_fxn(
    $product_cat,
    $product_brand,
    $product_title,
    $product_price,
    $product_desc,
    $product_image,
    $product_keywords
) {
    $add_product = new general_class();
    return $add_product->add_product(
        $product_cat,
        $product_brand,
        $product_title,
        $product_price,
        $product_desc,
        $product_image,
        $product_keywords
    );
}
//--UPDATE--//
function update_product_fxn(
    $product_id,
    $product_cat,
    $product_brand,
    $product_title,
    $product_price,
    $stock_quantity,
    $product_desc,
    $product_keywords
) {
    $update_product = new general_class();
    return $update_product->update_product(
        $product_id,
        $product_cat,
        $product_brand,
        $product_title,
        $product_price,
        $stock_quantity,
        $product_desc,
        $product_keywords
    );
}

function update_stock_fxn($product_id, $stock_quantity)
{
    $update_stock = new general_class();
    return $update_stock->update_stock($product_id, $stock_quantity);
}

//--DELETE--//
function delete_product_fxn($product_id)
{
    $delete_product = new general_class();
    return $delete_product->delete_product($product_id);
}

//--SELECT--//
function check_duplicate_cart_fxn($product_id, $customer_id)
{
    $check_duplicate_cart = new general_class();
    return $check_duplicate_cart->check_duplicate_log($product_id, $customer_id);
}

function check_duplicate_cart_nlog_fxn($product_id, $ip_address)
{
    $check_duplicate_cart = new general_class();
    return $check_duplicate_cart->check_duplicate_nlog($product_id, $ip_address);
}

function get_cart_items_no_fxn($customer_id)
{
    $get_cart_items_no = new general_class();
    return $get_cart_items_no->get_cart_items_no($customer_id);
}

function get_cart_items_no_nlog_fxn($ip_address) {
    $get_cart_items_no = new general_class();
    return $get_cart_items_no->get_cart_items_no_nlog($ip_address);
}

function get_cart_value_fxn($customer_id)
{
    $get_cart_value = new general_class();
    return $get_cart_value->get_cart_value($customer_id);
}

function view_cart_fxn($customer_id)
{
    $view_cart = new general_class();
    return $view_cart->view_cart($customer_id);
}

function view_cart_nlog_fxn($ip_address) {
    $view_cart = new general_class();
    return $view_cart->view_cart_nlog($ip_address);

}

//--INSERT--//
function add_to_cart_fxn($product_id, $ip_address, $customer_id, $quantity)
{
    $add_cart = new general_class();
    return $add_cart->add_to_cart($product_id, $ip_address, $customer_id, $quantity);
}

function add_to_cart_nlog_fxn($product_id, $ip_address, $quantity)
{
    $add_cart = new general_class();
    return $add_cart->add_to_cart_nlog($product_id, $ip_address, $quantity);
}

//--UPDATE--//
function update_cart_fxn($product_id, $customer_id, $quantity, $duration)
{
    $update_cart = new general_class();
    return $update_cart->update_cart_item_qty($product_id, $customer_id, $quantity, $duration);
}

function update_cart_nlog_fxn($product_id, $customer_id, $quantity, $duration)
{
    $update_cart = new general_class();
    return $update_cart->update_cart_item_qty_nlog($product_id, $customer_id, $quantity, $duration);
}

function update_cart_user_id_fxn($customer_id, $ip_address)
{
    $update_cart = new general_class();
    return $update_cart->update_cart_with_user_id($customer_id, $ip_address);
}
//--DELETE--//
function delete_cart_item_fxn($product_id, $customer_id)
{
    $delete_cart = new general_class();
    return $delete_cart->delete_cart_item($product_id, $customer_id);
}

function delete_cart_item_nlog_fxn($product_id, $ip_address) {
    $delete_cart = new general_class();
    return $delete_cart->delete_cart_item_nlog($product_id, $ip_address);
}

function clear_cart_fxn($customer_id)
{
    $delete_cart = new general_class();
    return $delete_cart->clear_cart($customer_id);
}

//--SELECT--//
function get_orders_fxn($order_id)
{
    $get_orders = new general_class();
    return $get_orders->get_orders($order_id);
}

function get_order_details_fxn($order_id) {
    $get_order_details = new general_class();
    return $get_order_details->get_order_details($order_id);

}

function get_recent_order_fxn()
{
    $get_recent_order = new general_class();
    return $get_recent_order->get_recent_orders();
}  

function get_payment_fxn($order_id)
{
    $get_payment = new general_class();
    return $get_payment->get_payment($order_id);
}

//--INSERT--//
function add_order_fxn($customer_id, $invoice_no, $order_date, $order_status)
{
    $add_order = new general_class();
    return $add_order->add_order($customer_id, $invoice_no, $order_date, $order_status);
}

function add_order_details_fxn($order_id, $product_id, $qty)
{
    $add_order_details = new general_class();
    return $add_order_details->add_order_details($order_id, $product_id, $qty);
}

//--UPDATE--//
function update_order_status_fxn($order_id, $order_status)
{
    $update_order = new general_class();
    return $update_order->update_order_status($order_id, $order_status);
}


//--INSERT--//
function add_payment_fxn($amount, $customer_id, $order_id, $currency, $payment_date) {
    $add_payment = new general_class();
    return $add_payment->add_payment($amount, $customer_id, $order_id, $currency, $payment_date);
}

//--SELECT--//
function get_user_count_fxn() {
    $get_user = new general_class();
    return $get_user->get_user_count();
}

function get_all_users_fxn() {
    $get_all_users = new general_class();
    return $get_all_users->get_all_users();
}

//--INSERT--//
function add_to_contact_fxn($customer_name, $customer_email, $customer_message) {
    $add_contact = new general_class();
    return $add_contact->add_to_contact($customer_name, $customer_email, $customer_message);
}

function get_contacts_fxn() {
    $get_contact = new general_class();
    return $get_contact->get_contacts();
}