<div class="col-12">
<!-- DataTales Example -->
  <div class="card shadow mt-0 mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold">Cities List</h6>
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
    $.fn.dataTable.ext.errMode = 'none';
    $('#discordbots-dataTable').DataTable({
        serverSide: true,
        searchDelay: 1000,
        ajax: {
            url: '{{ url(page.get('base_route') ~ '/ajax') }}',
            method: 'POST'
        },
        columns: [
            { data: "id" , "title":"ID"},
            { data: "name" , "title":"Name"},
            {data: "name_ascii" , "title":"Name Ascii"},
            {data: "population" , "title":"Population"},
            {data: "lat" , "title":"Latitude"},
            {data: "lng" , "title":"Longitude"},
            {% if country_plugin is defined and country_plugin == true %}
              {data: "country" , "title":"Country"},
              {% else %}
              {data: "iso2" , "title":"Country ISO-2"},
            {% endif %}
            {data: "c_status" , "title":"Status"},
            {data: "c_actions" , "title":"Actions"}
        ]
    });
  });
</script>