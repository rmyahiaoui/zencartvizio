<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_whats_new.php 6128 2007-04-08 04:53:32Z birdbrain $
 */
  $content = "";
  $whats_new_box_counter = 0;
  while (!$random_whats_new_sidebox_product->EOF) {
    $whats_new_box_counter++;
    $whats_new_price = zen_get_products_display_price($random_whats_new_sidebox_product->fields['products_id']);
    $content .= '<div class="sideBoxContent centeredContent">';
	
	 $content .= '<div class="product">
					<div class="top-border">
						<div class="right-border">
							<div class="bot-border">
								<div class="left-border">
									<div class="left-top">
										<div class="right-top">
											<div class="right-bot">
												<div class="left-bot">
													<div class="prod-indent">';
	
    $content .= '<div class="img"><a href="' . zen_href_link(zen_get_info_page($random_whats_new_sidebox_product->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($random_whats_new_sidebox_product->fields['master_categories_id']) . '&products_id=' . $random_whats_new_sidebox_product->fields['products_id']) . '">' . zen_image(DIR_WS_IMAGES . $random_whats_new_sidebox_product->fields['products_image'], $random_whats_new_sidebox_product->fields['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></div>';
    $content .= '<a class="name" href="' . zen_href_link(zen_get_info_page($random_whats_new_sidebox_product->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($random_whats_new_sidebox_product->fields['master_categories_id']) . '&products_id=' . $random_whats_new_sidebox_product->fields['products_id']) . '">' . $random_whats_new_sidebox_product->fields['products_name'] . '</a>';
    $content .= '<div class="price">' . $whats_new_price . '</div>';
	
	$content .= '<div class="buttons">';
	$content .= '<a href="' . zen_href_link(FILENAME_PRODUCTS_NEW, zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $random_whats_new_sidebox_product->fields["products_id"]) . '">' . zen_image_button(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT) . '</a>&nbsp;&nbsp;&nbsp;';
	
	$content .= '<a href="' . zen_href_link(zen_get_info_page($random_whats_new_sidebox_product->fields["products_id"]), 'cPath=' . zen_get_generated_category_path_rev($random_whats_new_sidebox_product->fields["master_categories_id"]) . '&products_id=' . $random_whats_new_sidebox_product->fields["products_id"]) . '">' . zen_image_button(BUTTON_IMAGE_GOTO_PROD_DETAILS, BUTTON_GOTO_PROD_DETAILS_ALT) . '</a>';
	
	
	$content .= '</div></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
	
    $content .= '</div>';
    $random_whats_new_sidebox_product->MoveNextRandom();
  }
?>
