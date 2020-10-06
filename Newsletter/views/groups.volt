<div class="col-12">
<!-- DataTales Example -->
  <div class="card shadow mt-0 mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold">{{ locale._("Groups List")}}</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="table-dataTable" width="100%" cellspacing="0">
          <thead>
          </thead>
          <tfoot>
          </tfoot>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  window.addEventListener("DOMContentLoaded", (event) => {
    $.fn.dataTable.ext.errMode = 'none';
    $('#table-dataTable').DataTable({
        serverSide: true,
        searchDelay: 1000,
        ajax: {
            url: '{{ url(page.get('base_route') ~ '/groupsajax') }}',
            method: 'POST'
        },
        columns: [
            { data: "id" , "title":"ID"},
            { data: "name" , "title":"{{ locale._("Name")}}"},
            { data: "c_subsribers" , "title":"{{ locale._("Total Subscribers")}}"},
            { data: "description" , "title":"{{locale._("Description")}}"},
            { data: "c_status" , "title":"{{locale._("Status")}}"},
            { data: "c_actions" , "title":"{{locale._("Actions")}}"}
        ]
    });
  });
</script>