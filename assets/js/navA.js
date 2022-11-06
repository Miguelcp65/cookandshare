$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');

    });
});
$(document).ready(function() {
    $('#sidebarCollapseX').on('click', function() {
        $('#sidebar').toggleClass('active');
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});