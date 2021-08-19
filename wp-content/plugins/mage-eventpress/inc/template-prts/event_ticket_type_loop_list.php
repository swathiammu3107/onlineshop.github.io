<?php
if (!defined('ABSPATH')) {
    die;
} // Cannot access pages directly.

add_action('mep_event_ticket_type_loop_list', 'mep_event_ticket_type_loop_list_html');
if (!function_exists('mep_event_ticket_type_loop_list_html')) {
    function mep_event_ticket_type_loop_list_html($post_id)
    {

        $mep_available_seat         = get_post_meta($post_id, 'mep_available_seat', true) ? get_post_meta($post_id, 'mep_available_seat', true) : 'on';
        $mep_event_ticket_type      = get_post_meta($post_id, 'mep_event_ticket_type', true) ? get_post_meta($post_id, 'mep_event_ticket_type', true) : array();
        ob_start();
        $count                     = 1;
        $seat_plan                 = get_post_meta($post_id, 'mepsp_event_seat_plan_info', true) ? get_post_meta($post_id, 'mepsp_event_seat_plan_info', true) : [];
        $seat_plan_visible         = get_post_meta($post_id, 'mp_event_seat_plan_visible', true) ? get_post_meta($post_id, 'mp_event_seat_plan_visible', true) : '1';
        $event_expire_date         = get_post_meta($post_id, 'event_expire_datetime', true) ? get_post_meta($post_id, 'event_expire_datetime', true) : '';

        if (class_exists('MP_ESP_Frontend') && sizeof($seat_plan) > 0 && $seat_plan_visible ==2) {
            
            $event_start_date       = get_post_meta($post_id, 'event_start_date', true) . ' ' . get_post_meta($post_id, 'event_start_time', true);            
            $ticket_type_file_path  = apply_filters('mep_ticket_type_file_path',mep_template_file_path('single/ticket_type_list.php'),$post_id);            
            require($ticket_type_file_path);

        }else{
 
        foreach ($mep_event_ticket_type as $field) {

            $current_time           = apply_filters('mep_ticket_current_time',current_time('Y-m-d H:i'),$event_expire_date,$post_id);
            $ticket_type_name       = array_key_exists('option_name_t',$field)  ? mep_remove_apostopie($field['option_name_t']) : '';
            $ticket_type            = array_key_exists('option_qty_t_type',$field)  ? $field['option_qty_t_type'] : 'input';
            $ticket_type_qty        = array_key_exists('option_qty_t',$field) ? $field['option_qty_t'] : 0;
            $ticket_type_price      = array_key_exists('option_price_t',$field) ? $field['option_price_t'] : 0;
            $qty_t_type             = $ticket_type;
            $total_quantity         = isset($field['option_qty_t']) ? $field['option_qty_t'] : 0;
            $sale_end_datetime      = isset($field['option_sale_end_date_t']) ? date('Y-m-d H:i',strtotime($field['option_sale_end_date_t'])) : date('Y-m-d H:i',strtotime($event_expire_date));
            $default_qty            = isset($field['option_default_qty_t']) && $field['option_default_qty_t'] > 0 ? $field['option_default_qty_t'] : 0;
            $total_resv_quantity    = isset($field['option_rsv_t']) ? $field['option_rsv_t'] : 0;
            $event_date             = get_post_meta($post_id, 'event_start_date', true) . ' ' . get_post_meta($post_id, 'event_start_time', true);
            $event_start_date       = get_post_meta($post_id, 'event_start_date', true) . ' ' . get_post_meta($post_id, 'event_start_time', true);
            $total_sold             = (int) mep_ticket_type_sold($post_id, $ticket_type_name, $event_date);
            $total_tickets          = (int) $total_quantity - ((int) $total_sold + (int) $total_resv_quantity);
            $total_seats            = apply_filters('mep_total_ticket_of_type', $total_tickets, $post_id, $field, $event_date);
            $total_min_seat         = apply_filters('mep_ticket_min_qty', 0, $post_id, $field);
            $default_quantity       = apply_filters('mep_ticket_default_qty', $default_qty, $post_id, $field);
            $total_left             = apply_filters('mep_total_ticket_of_type', $total_tickets, $post_id, $field, $event_date);
            $total_ticket_left      = apply_filters('mep_total_ticket_left_of_type', $total_tickets, $post_id, $field, $event_date);
            $ticket_price           = apply_filters('mep_ticket_type_price', $ticket_type_price, $ticket_type_name, $post_id, $field);
            $passed                 = apply_filters('mep_ticket_type_validation', true);
            $start_date             = get_post_meta($post_id, 'event_start_datetime', true);
            $default_path           = mep_template_file_path('single/ticket_type_list.php'); 
            $ticket_type_file_path  = apply_filters('mep_ticket_type_file_path',$default_path,$post_id);

            if (strtotime($current_time) < strtotime( $sale_end_datetime ) ) {
                require($ticket_type_file_path);
            }

            $count++;
        } 
    }
       $loop_list = ob_get_clean();
       echo apply_filters('mep_event_ticket_type_loop', $loop_list, $post_id);
    }
}