<script type = "text/javascript">
function isEmptyValue(value){
    var pattern = /\S/;
    return ret = (pattern.test(value)) ? (true) : (false);
}
</script>
<div id="search_js">
<form name = "searchForm" method = "post" action="<?php print SEFLink("index.php?option=com_jshopping&controller=search&task=result", 1);?>" onsubmit = "return isEmptyValue(jQuery('#jshop_search').val())">
<input type="hidden" name="setsearchdata" value="1"/>
<input type = "hidden" name = "category_id" value = "<?php print $category_id?>" />
<?php if($add_desc_in_search == 1) {?>
<input type="hidden" name="add_desc_in_search" value="1"/>
<?php } ?>
<input type = "text" class = "inputbox"  name = "search" id = "jshop_search" value = "<?php print $search?>" />
<input class = "button"  type = "submit" value = "<?php print _JSHOP_SEARCH?>" />
<?php if ($adv_search) {?>
<br /><a href = "<?php print $adv_search_link?>"><?php print _JSHOP_ADVANCED_SEARCH?></a>
<?php } ?>
</div>
</form>


