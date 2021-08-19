            <tr>
                <?php do_action('mep_ticket_type_list_row_start',$field, $post_id); ?>
                    <td align="Left"><?php echo $field['option_name_t']; ?>
                        <?php if ($mep_available_seat == 'on') { ?><div class="xtra-item-left"><?php echo max($total_ticket_left, 0); ?>

                                <?php echo mep_get_option('mep_left_text', 'label_setting_sec') ? mep_get_option('mep_left_text', 'label_setting_sec') : _e('Left:', 'mage-eventpress');  ?>

                            </div> <?php } ?>
                    </td>
                    <td class="ticket-qty">
                        <span class="tkt-qty">
                            <?php echo mep_get_option('mep_ticket_qty_text', 'label_setting_sec') ? mep_get_option('mep_ticket_qty_text', 'label_setting_sec') : _e('Ticket Qty:', 'mage-eventpress');  ?>
                        </span>
                        <?php
                        $tic_price=mep_get_price_including_tax($post_id,$ticket_price);
                        $actual_price=strip_tags(wc_price(mep_get_price_including_tax($post_id,$ticket_price)));
                        
                        $data_price=str_replace(get_woocommerce_currency_symbol(), '', $actual_price);
                        $data_price=str_replace(wc_get_price_thousand_separator(), '', $data_price);
						$data_price=str_replace(wc_get_price_decimal_separator(), '.', $data_price);
                        if ($total_left > 0) {
                            if ($qty_t_type == 'dropdown') { ?>
                                <select name="option_qty[]" id="eventpxtp_<?php echo $count; ?>" <?php if ($total_left <= 0) { ?> style='display: none!important;' <?php } ?> class='extra-qty-box etp'>
                                    <?php
                                    for ($i = $total_min_seat; $i <= $total_left; $i++) { ?>
                                        <option value="<?php echo $i; ?>" <?php if ($i == $default_quantity) {
                                                                                echo 'Selected';
                                                                            } ?>><?php echo $i; ?>
                                            <?php echo mep_get_option('mep_ticket_text', 'label_setting_sec') ? mep_get_option('mep_ticket_text', 'label_setting_sec') : _e('Ticket:', 'mage-eventpress');  ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            <?php } else { ?>

                                <div class="mage_input_group">
                                    <span class="fa fa-minus qty_dec"></span>
                                    <input id="eventpxtp_<?php echo $count; ?>" type="text" class='extra-qty-box etp' name='option_qty[]' data-price='<?php echo $data_price; ?>' value='<?php echo $default_quantity; ?>' min="<?php echo $total_min_seat; ?>" max="<?php echo max($total_left, 0); ?>">
                                    <span class="fa fa-plus qty_inc"></span>
                                </div>
                            <?php }
                        } else {
                            ?>
                            <input id="eventpxtp_<?php echo $count; ?>" type="hidden" class='extra-qty-box etp' name='option_qty[]' data-price='0' value='0' min="0" max="0">
                            <?php echo mep_get_option('mep_no_seat_available_text', 'label_setting_sec') ? mep_get_option('mep_no_seat_available_text', 'label_setting_sec') : _e('No Seat Availables', 'mage-eventpress');                      
                        }
                        $ticket_name = mep_remove_apostopie($field['option_name_t']);
                            do_action('mep_after_ticket_type_qty', $post_id, $ticket_name, $field, $default_quantity,$start_date);
                        ?>
                    </td>
                    <td class="ticket-price"><span class="tkt-pric">
                            <?php echo mep_get_option('mep_per_ticket_price_text', 'label_setting_sec') ? mep_get_option('mep_per_ticket_price_text', 'label_setting_sec') : _e('Per Ticket Price:', 'mage-eventpress');  ?>
                        </span> <strong><?php echo wc_price(mep_get_price_including_tax($post_id,$ticket_price)); ?></strong>
                        <?php if ($total_seats > 0) { ?>
                            <p style="display: none;" class="price_jq"><?php echo $tic_price > 0 ? $tic_price : 0;  ?></p>

                        <?php } ?>
                    </td>
                    <?php do_action('mep_ticket_type_list_row_end',$field, $post_id); ?>
                </tr>
                <tr>
                    <td colspan="<?php echo apply_filters('mep_hidden_row_colspan_no',3); ?>" class='user-innnf'>
                        <input type="hidden" name='mep_event_start_date[]' value="<?php echo $start_date; ?>">
                        <input type="hidden" name='option_name[]' value='<?php echo mep_remove_apostopie($field['option_name_t']); ?>'>
                        <input type="hidden" name='option_price[]' value='<?php echo $ticket_price; ?>'>
                        <input type="hidden" name='max_qty[]' value='<?php if(array_key_exists('option_max_qty',$field)){ echo $field['option_max_qty']; }else{ echo ''; } ?>'>
                        <div class="user-info-sec">
                            <div id="dadainfo_<?php echo $count; ?>" class="dada-info"></div>
                        </div>
                    </td>
                </tr>