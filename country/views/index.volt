<div class="col-12">
<!-- DataTales Example -->
  <div class="card shadow mt-0 mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold">Countries List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="discordbots-dataTable" width="100%" cellspacing="0">
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
    $('#discordbots-dataTable').DataTable({
        serverSide: true,
        ajax: {
            url: '{{ url(page.get('base_route') ~ '/ajax') }}',
            method: 'POST'
        },
        columns: [
            {data: "id" , "title":"ID"},
            {data: "num" , "title":"Number Code"},
            {data: "iso2" , "title":"ISO-2"},
            {data: "iso3" , "title":"ISO-3"},
            {data: "name" , "title":"Name"},
            {data: "title" , "title":"Title"},
            {data: "c_status" , "title":"Status"},
            {data: "c_actions" , "title":"Actions"}
        ]
    });
  });
</script>