<?php defined('_JEXEC') or die(); ?>
<?php $product = $this->product?>
<?php include(dirname(__FILE__)."/load.js.php");?>
<div class="jshop productfull" id="comjshop">
<form name="product" method="post" action="<?php print $this->action?>" enctype="multipart/form-data" autocomplete="off">
    
    <h1><?php print $this->product->name?><?php if ($this->config->show_product_code){?> <span class="jshop_code_prod">(<?php print _JSHOP_EAN?>: <span id="product_code"><?php print $this->product->getEan();?></span>)</span><?php }?></h1>
    <?php print $this->_tmp_product_html_start;?>
    <?php if ($this->config->display_button_print) print printContent();?>
    
    <?php include(dirname(__FILE__)."/ratingandhits.php");?>
        
    <table class="jshop">
    <tr>
        <td class="image_middle">
            <?php print $this->_tmp_product_html_before_image;?>
            <?php if ($product->label_id){?>
                <div class="product_label">
                    <?php if ($product->_label_image){?>
                        <img src="<?php print $product->_label_image?>" alt="<?php print htmlspecialchars($product->_label_name)?>" />
                    <?php }else{?>
                        <span class="label_name"><?php print $product->_label_name;?></span>
                    <?php }?>
                </div>
            <?php }?>
            <?php if (count($this->videos)){?>
                <?php foreach($this->videos as $k=>$video){?>
					<?php if ($video->video_code){ ?>
					<div style="display:none" class="video_full" id="hide_video_<?php print $k?>"><?php echo $video->video_code?></div>
					<?php } else { ?>
					<a style="display:none" class="video_full" id="hide_video_<?php print $k?>" href=""></a>
					<?php } ?>
                <?php } ?>
            <?php }?>
            
            <span id='list_product_image_middle'>
			<?php print $this->_tmp_product_html_body_image?>
            <?php if(!count($this->images)){?>
                <img id = "main_image" src = "<?php print $this->image_product_path?>/<?php print $this->noimage?>" alt = "<?php print htmlspecialchars($this->product->name)?>" />
            <?php }?>
            <?php foreach($this->images as $k=>$image){?>
            <a class="lightbox" id="main_image_full_<?php print $image->image_id?>" href="<?php print $this->image_product_path?>/<?php print $image->image_full;?>" <?php if ($k!=0){?>style="display:none"<?php }?> title="<?php print htmlspecialchars($image->_title)?>">
                <img id = "main_image_<?php print $image->image_id?>" src = "<?php print $this->image_product_path?>/<?php print $image->image_name;?>" alt="<?php print htmlspecialchars($image->_title)?>" title="<?php print htmlspecialchars($image->_title)?>" />
                <div class="text_zoom">
                    <img src="<?php print $this->path_to_image?>search.png" alt="zoom" /> <?php print _JSHOP_ZOOM_IMAGE?>
                </div>
            </a>
            <?php }?>
            </span>
            <?php print $this->_tmp_product_html_after_image;?>
            
            <?php if ($this->config->product_show_manufacturer_logo && $this->product->manufacturer_info->manufacturer_logo!=""){?>
            <div class="manufacturer_logo">
                <a href="<?php print SEFLink('index.php?option=com_jshopping&controller=manufacturer&task=view&manufacturer_id='.$this->product->product_manufacturer_id, 2);?>">
                    <img src="<?php print $this->config->image_manufs_live_path."/".$this->product->manufacturer_info->manufacturer_logo?>" alt="<?php print htmlspecialchars($this->product->manufacturer_info->name);?>" title="<?php print htmlspecialchars($this->product->manufacturer_info->name);?>" border="0" />
                </a>
            </div>
            <?php }?>
        </td>
        <td class="jshop_img_description">
            <?php print $this->_tmp_product_html_before_image_thumb;?>
            <span id='list_product_image_thumb'>
            <?php if ( (count($this->images)>1) || (count($this->videos) && count($this->images)) ) {?>
                <?php foreach($this->images as $k=>$image){?>
                    <img class="jshop_img_thumb" src="<?php print $this->image_product_path?>/<?php print $image->image_thumb?>" alt="<?php print htmlspecialchars($image->_title)?>" title="<?php print htmlspecialchars($image->_title)?>" onclick="showImage(<?php print $image->image_id?>)" />
                <?php }?>
            <?php }?>
            </span>
            <?php print $this->_tmp_product_html_after_image_thumb;?>
            <?php if (count($this->videos)){?>
                <?php foreach($this->videos as $k=>$video){?>
					<?php if ($video->video_code) { ?>
					<a href="#" id="video_<?php print $k?>" onclick="showVideoCode(this.id);return false;"><img class="jshop_video_thumb" src="<?php print $this->video_image_preview_path."/"; if ($video->video_preview) print $video->video_preview; else print 'video.gif'?>" alt="video" /></a>
					<?php } else { ?>
                    <a href="<?php print $this->video_product_path?>/<?php print $video->video_name?>" id="video_<?php print $k?>" onclick="showVideo(this.id, '<?php print $this->config->video_product_width;?>', '<?php print $this->config->video_product_height;?>'); return false;"><img class="jshop_video_thumb" src="<?php print $this->video_image_preview_path."/"; if ($video->video_preview) print $video->video_preview; else print 'video.gif'?>" alt="video" /></a>
					<?php } ?>
                <?php } ?>
            <?php }?>
            <?php print $this->_tmp_product_html_after_video;?>
        </td>
    </tr>
    </table>

    <div class="jshop_prod_description">
        <?php print $this->product->description; ?>
    </div>
    
    <?php if ($this->product->product_url!=""){?>
    <div class="prod_url">
        <a target="_blank" href="<?php print $this->product->product_url;?>"><?php print _JSHOP_READ_MORE?></a>
    </div>
    <?php }?>

    <?php if ($this->config->product_show_manufacturer && $this->product->manufacturer_info->name!=""){?>
    <div class="manufacturer_name">
        <?php print _JSHOP_MANUFACTURER?>: <span><?php print $this->product->manufacturer_info->name?></span>
    </div>
    <?php }?>

    <?php if (count($this->attributes)){?>
    <div class="jshop_prod_attributes">
        <table class="jshop">
        <?php foreach($this->attributes as $attribut){?>
            <?php if ($attribut->grshow){?>
            <tr>
                <td class="attributgr_title" colspan="2">
                    <span class="attributgr_name"><?php print $attribut->groupname?></span>
                </td>
            </tr>
            <?php }?>
        <tr>
            <td class="attributes_title">
                <span class="attributes_name"><?php print $attribut->attr_name?>:</span><span class="attributes_description"><?php print $attribut->attr_description;?></span>
            </td>
            <td>
                <span id='block_attr_sel_<?php print $attribut->attr_id?>'>
                <?php print $attribut->selects?>
                </span>
            </td>
        </tr>
        <?php }?>
        </table>
    </div>
    <?php }?>
    
    <?php if (count($this->product->freeattributes)){?>
    <div class="prod_free_attribs">
        <table class="jshop">
        <?php foreach($this->product->freeattributes as $freeattribut){?>
        <tr>
            <td class="name"><span class="freeattribut_name"><?php print $freeattribut->name;?></span> <?php if ($freeattribut->required){?><span>*</span><?php }?><span class="freeattribut_description"><?php print $freeattribut->description;?></span></td>
            <td class="field"><?php print $freeattribut->input_field;?></td>
        </tr>
        <?php }?>
        </table>
        <?php if ($this->product->freeattribrequire) {?>
        <div class="requiredtext">* <?php print _JSHOP_REQUIRED?></div>
        <?php }?>
    </div>
    <?php }?>
    
    <?php if ($this->product->product_is_add_price){?>
    <div class="price_prod_qty_list_head"><?php print _JSHOP_PRICE_FOR_QTY?></div>
    <table class="price_prod_qty_list">
    <?php foreach($this->product->product_add_prices as $k=>$add_price){?>
        <tr>
            <td class="qty_from" <?php if ($add_price->product_quantity_finish==0){?>colspan="3"<?php } ?>>
                <?php if ($add_price->product_quantity_finish==0) print _JSHOP_FROM?>
                <?php print $add_price->product_quantity_start?> <?php print $this->product->product_add_price_unit?>
            </td>
            <?php if ($add_price->product_quantity_finish > 0){?>
            <td class="qty_line"> - </td>
            <?php } ?>
            <?php if ($add_price->product_quantity_finish > 0){?>
            <td class="qty_to">
                <?php print $add_price->product_quantity_finish?> <?php print $this->product->product_add_price_unit?>
            </td>
            <?php } ?>
            <td class="qty_price">
                <span id="pricelist_from_<?php print $add_price->product_quantity_start?>"><?php print formatprice($add_price->price)?><?php print $add_price->ext_price?></span> <span class="per_piece">/ <?php print $this->product->product_add_price_unit?></span>
            </td>
        </tr>
    <?php }?>
    </table>
    <?php }?>
    
    <div class="old_price" <?php if ($this->product->product_old_price==0){?>style="display:none"<?php }?>>
        <?php print _JSHOP_OLD_PRICE?>: <span class="old_price" id="old_price"><?php print formatprice($this->product->product_old_price)?><?php print $this->product->_tmp_var_old_price_ext;?></span>
    </div>
    
    <?php if ($this->product->product_price_default > 0 && $this->config->product_list_show_price_default){?>
        <div class="default_price"><?php print _JSHOP_DEFAULT_PRICE?>: <span id="pricedefault"><?php print formatprice($this->product->product_price_default)?></span></div>
    <?php }?>        
    
    <?php if ($this->product->_display_price){?>
    <div class="prod_price">
        <?php print _JSHOP_PRICE?>: <span id="block_price"><?php print formatprice($this->product->getPriceCalculate())?><?php print $this->product->_tmp_var_price_ext;?></span>
    </div>
    <?php }?>
    <?php print $this->product->_tmp_var_bottom_price;?>
    
    <?php if ($this->config->show_tax_in_product && $this->product->product_tax > 0){?>
        <span class="taxinfo"><?php print productTaxInfo($this->product->product_tax);?></span>
    <?php }?>
    <?php if ($this->config->show_plus_shipping_in_product){?>
        <span class="plusshippinginfo"><?php print sprintf(_JSHOP_PLUS_SHIPPING, $this->shippinginfo);?></span>
    <?php }?>
    <?php if ($this->product->delivery_time != ''){?>
        <div class="deliverytime" <?php if ($product->hide_delivery_time){?>style="display:none"<?php }?>><?php print _JSHOP_DELIVERY_TIME?>: <?php print $this->product->delivery_time?></div>
    <?php }?>
    <?php if ($this->config->product_show_weight && $this->product->product_weight > 0){?>
        <div class="productweight"><?php print _JSHOP_WEIGHT?>: <span id="block_weight"><?php print formatweight($this->product->getWeight())?></span></div>
    <?php }?>
    
    <?php if ($this->product->product_basic_price_show){?>
        <div class="prod_base_price"><?php print _JSHOP_BASIC_PRICE?>: <span id="block_basic_price"><?php print formatprice($this->product->product_basic_price_calculate)?></span> / <?php print $this->product->product_basic_price_unit_name;?></div>
    <?php }?>
    
    <?php if (is_array($this->product->extra_field)){?>
        <div class="extra_fields">
        <?php foreach($this->product->extra_field as $extra_field){?>
            <?php if ($extra_field['grshow']){?>
            <div class='block_efg'>
            <div class='extra_fields_group'><?php print $extra_field['groupname']?></div>
            <?php }?>
            <div><span class="extra_fields_name"><?php print $extra_field['name'];?></span><?php if ($extra_field['description']) {?> <span class="extra_fields_description"><?php print $extra_field['description'];?></span><?php } ?>: <span class="extra_fields_value"><?php print $extra_field['value'];?></span></div>
            <?php if ($extra_field['grshow']){?>
            </div>
            <?php }?>
        <?php }?>
        </div>
    <?php }?>
    
    <?php if ($this->product->vendor_info){?>
        <div class="vendorinfo">
            <?php print _JSHOP_VENDOR?>: <?php print $this->product->vendor_info->shop_name?> (<?php print $this->product->vendor_info->l_name." ".$this->product->vendor_info->f_name;?>),
            ( 
            <?php if ($this->config->product_show_vendor_detail){?><a href="<?php print $this->product->vendor_info->urlinfo?>"><?php print _JSHOP_ABOUT_VENDOR?></a>,<?php }?> 
            <a href="<?php print $this->product->vendor_info->urllistproducts?>"><?php print _JSHOP_VIEW_OTHER_VENDOR_PRODUCTS?></a> )
        </div>
    <?php }?>
    
    <?php if (!$this->config->hide_text_product_not_available){ ?>
        <div class = "not_available" id="not_available"><?php print $this->available?></div>
    <?php }?>
    
    <?php if ($this->config->product_show_qty_stock){?>
        <div class="qty_in_stock"><?php print _JSHOP_QTY_IN_STOCK?>: <span id="product_qty"><?php print sprintQtyInStock($this->product->qty_in_stock);?></span></div>
    <?php }?>
    
    <?php print $this->_tmp_product_html_before_buttons;?>
    <?php if (!$this->hide_buy){?>                         
        <table class="prod_buttons" style="<?php print $this->displaybuttons?>">
        <tr>
            <td class="prod_qty">
                <?php print _JSHOP_QUANTITY?>:&nbsp;
            </td>
            <td class="prod_qty_input">
                <input type="text" name="quantity" id="quantity" onkeyup="reloadPrices();" class="inputbox" value="<?php print $this->default_count_product?>" /><?php print $this->_tmp_qty_unit;?>
            </td>        
            <td class="buttons">            
                <input type="submit" class="button" value="<?php print _JSHOP_ADD_TO_CART?>" onclick="jQuery('#to').val('cart');" />
                <?php if ($this->enable_wishlist){?>
                    <input type="submit" class="button" value="<?php print _JSHOP_ADD_TO_WISHLIST?>" onclick="jQuery('#to').val('wishlist');" />
                <?php }?>
                <?php print $this->_tmp_product_html_buttons;?>
            </td>
            <td id="jshop_image_loading" style="display:none"></td>
        </tr>
        </table>
    <?php }?>
    <?php print $this->_tmp_product_html_after_buttons;?>
    
<input type="hidden" name="to" id='to' value="cart" />
<input type="hidden" name="product_id" id="product_id" value="<?php print $this->product->product_id?>" />
<input type="hidden" name="category_id" id="category_id" value="<?php print $this->category_id?>" />
</form>

<?php print $this->_tmp_product_html_before_demofiles; ?>
<div id="list_product_demofiles"><?php include(dirname(__FILE__)."/demofiles.php");?></div>
<?php
if ($this->config->product_show_button_back){?>
<div class="button_back">
<input type="button" class="button" value="<?php print _JSHOP_BACK;?>" onclick="<?php print $this->product->button_back_js_click;?>" />
</div>
<?php }?>
<?php
    print $this->_tmp_product_html_before_related;
    include(dirname(__FILE__)."/related.php");
    print $this->_tmp_product_html_before_review;
    include(dirname(__FILE__)."/review.php");
?>
<?php print $this->_tmp_product_html_end;?>
</div>