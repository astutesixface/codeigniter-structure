jQuery(function () {
    "use strict";
    function toggleBasicTableFns() {
        var $btable = $(".basic-table"), btns = [".btable-bordered", ".btable-striped", ".btable-condensed", ".btable-hover"];
        btns.forEach(function (btn) {
            $btable.find(btn).on("click touchstart", function (e) {
                var tableClass = $(this).data("table-class");
                e.preventDefault(), $(this).toggleClass("active"), $btable.find("table").toggleClass(tableClass)
            }
            )
        }
        )
    }
    function initDataTable() {
        var $dataTable = $(".data-table");
        var $table = $dataTable.find("table");
        var table = $table.DataTable({
            data: datass, columns: columnss, searching: !0, dom: "rtip", pageLength: 10
        }
        );
        $dataTable.find(".searchInput").on("keyup", function () {
            table.search(this.value).draw()
        }
        ), $dataTable.find(".lengthSelect").on("change", function () {
            table.page.len(this.value).draw()
        }
        ), $dataTable.find(".dataTables_info").css({
            "margin-left": "20px", "font-size": "12px"
        });
   
        
    }
    function _init() {
        toggleBasicTableFns(), initDataTable()
//        $('. tfoot th').each( function () {
//        var title = $(this).text();
//        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
//    } );
// 
//    // DataTable
//    var table = $('.data-table').DataTable();
// 
//    // Apply the search
//    table.columns().every( function () {
//        var that = this;
// 
//        $( 'input', this.footer() ).on( 'keyup change', function () {
//            if ( that.search() !== this.value ) {
//                that
//                    .search( this.value )
//                    .draw();
//            }
//        } );
//    } );
    }
    _init()
}

);