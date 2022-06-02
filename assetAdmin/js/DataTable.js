$(document).ready(function () {
  var dataTable = $("#filtertable").DataTable({
    pageLength: 7,
    aoColumnDefs: [
      {
        bSortable: false,
        aTargets: ["nosort"],
      },
    ],
    columnDefs: [{ type: "date-dd-mm-yyyy", aTargets: [5] }],
    aoColumns: [null, null, null, null, null, null, null, null],
    order: false,
    bLengthChange: false,
    dom: '<"clear">ct<"clear"p><"clear">',
  });
  $("#filterbox").keyup(function () {
    dataTable.search(this.value).draw();
  });
});
