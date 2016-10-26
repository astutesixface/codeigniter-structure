

                    <form role="form" id="navigation_edit" action="<?php echo base_url(); ?>admin/navigation/save_navigation/<?php if(!empty($menu_info->menu_id)){ echo $menu_info->menu_id;} ?>" method="post" class="form-horizontal form-groups-bordered">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Label<span class="requireds"> *</span></label>
                            <div class="col-sm-5">                         
                                <input type="text" name="label" value="<?php echo $menu_info->label ?>" class="form-control required" placeholder="Menu Label"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Slug<span class="requireds"> *</span></label>
                            <div class="col-sm-5">                         
                                <input type="text" name="link" value="<?php echo $menu_info->link ?>" class="form-control required" placeholder="Menu Link"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Icon<span class="requireds"> *</span></label>
                            <div class="col-sm-5">                         
                                <input type="text" name="icon" value="<?php echo $menu_info->icon ?>" class="form-control required" placeholder="Menu Icon"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Parent</label>
                            <div class="col-sm-5">                         
                                <select name="parent" class="form-control">
                                    <option value="">Select Parent...</option>
                                    
                                   <?php if (count($nav)): foreach ($nav as $v_nav) : ?>
                                    <option value="<?php echo $v_nav->menu_id ?>"
                                            <?php echo $menu_info->parent == $v_nav->menu_id ? 'selected':'' ?>>
                                            <?php echo $v_nav->label ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Sort<span class="requireds"> *</span></label>
                            <div class="col-sm-5">                         
                                <input type="text" name="sort" value="<?php echo $menu_info->sort ?>" class="form-control required" placeholder="Menu Sorting"/>
                            </div>
                        </div>
 
                    </form>
<script>               
$(document).ready(function() {
		$("form").submit(function(e){
			return false;
		});
	});
</script>