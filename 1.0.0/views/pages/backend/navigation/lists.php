<table class="table table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr class="active" >
            <th class="col-sm-1">SL</th>
            <th>Label</th>
            <th>Slug</th>
            <th>Icon</th>
            <th>Parent</th>                                             
            <th>Sort</th>
            <th class="">Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table> 
 <script src="<?php echo base_url(); ?>assets/admin/plugin/dataTables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugin/dataTables/dataTables.bootstrap.js" type="text/javascript"></script>
<script>
    var datatable_url = '<?= base_url() ?>admin/ajax_datatable/navigation';
    var datatable_column = [
        {data: "menu_id"},
        {data: "label"},
        {data: "link"},
        {data: "icon",
            "render": function (data, type, full, meta)
            {
                var returns = '<i class="' + data + '"></i>';
                return returns;
            }
        },
        {data: "parent"},
        {data: "sort"},
        {data: "menu_id",
            "render": function (data, type, full, meta)
            {
                var returns = '<div class="btn-group" role="group" aria-label="...">'
                        + '<a class="btn btn-success btn-xs" data-toggle="tooltip"'
                        + 'onclick="ajax_modal(\'edit\',\'<?php echo translate('edit_category'); ?>\',\'<?php echo translate('successfully_edited!'); ?>\',\'navigation_edit\',' + full.menu_id + ')"'
                        + 'data-original-title="Edit" data-container="body">'
                        + '<i class="fa fa-pencil-square-o"></i> <?php echo translate('edit'); ?>'
                        + '</a>'
                        + '<a onclick="delete_confirm(' + full.menu_id + ' ,\'<?php echo translate('really_want_to_delete_this?'); ?>\')" class="btn btn-danger btn-xs" data-toggle="tooltip" '
                        + 'data-original-title="Delete" data-container="body">'
                        + '<i class="fa fa-times"></i> <?php echo translate('delete'); ?>'
                        + '</a>'
                        + '</div>';
                return returns;
            }

        }//refers to the expression in the "More Advanced DatatableModel Implementation"
    ]
</script>
<script src="<?php echo base_url(); ?>template/back/js/ajax_datatable.js"></script>