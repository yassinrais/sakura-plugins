<div class="col-12 pb-3 text-right">
</div>
<div class="col-12">
<!-- DataTales Example -->
  <div class="card shadow mt-0 mb-4">
    <div class="card-header container-fluid">
        <div class="row">
            <div class="col-md-3">
                <h6 class="mt-2 font-weight-bold">{{ locale._("Campaigns List")}}</h6>
            </div>
            <div class="col-md-9 float-right text-right">
                <a href="{{ page.get('base_route') }}/campaigns/new" class="btn btn-success">Start New Campaign</a> 
            </div>
        </div>
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
            url: '{{ url(page.get('base_route') ~ '/campaigns/listajax') }}',
            method: 'POST'
        },
        columns: [
            { data: "id" , "title":"ID"},
            { data: "name" , "title":"{{ locale._("Name")}}"},
            { data: "description" , "title":"{{locale._("Description")}}"},
            { data: "c_start" , "title":"{{locale._("Start Date")}}"},
            { data: "c_end" , "title":"{{locale._("End Date")}}"},
            { data: "c_status" , "title":"{{locale._("Status")}}"},
            { data: "c_actions" , "title":"{{locale._("Actions")}}"}
        ]
    });
  });
</script>