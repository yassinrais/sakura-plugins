<div class="col-12">
<!-- DataTales Example -->
  <div class="card shadow mt-0 mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold">{{ locale._("Cities List")}}</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="cities-dataTable" width="100%" cellspacing="0">
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
    $('#cities-dataTable').DataTable({
        serverSide: true,
        searchDelay: 1000,
        ajax: {
            url: '{{ url(page.get('base_route') ~ '/ajax') }}',
            method: 'POST'
        },
        columns: [
            { data: "id" , "title":"ID"},
            { data: "name" , "title":"{{ locale._("Name")}}"},
            {data: "name_ascii" , "title":"{{ locale._("Name")}} Ascii"},
            {data: "population" , "title":"{{locale._("Population")}}"},
            {data: "lat" , "title":"{{locale._("Latitude")}}"},
            {data: "lng" , "title":"{{locale._("Longitude")}}"},
            {% if country_plugin is defined and country_plugin == true %}
              {data: "country" , "title":"{{locale._("Country")}}"},
              {% else %}
              {data: "iso2" , "title":"{{locale._("Country ISO-2")}}"},
            {% endif %}
            {data: "c_status" , "title":"{{locale._("Status")}}"},
            {data: "c_actions" , "title":"{{locale._("Actions")}}"}
        ]
    });
  });
</script>