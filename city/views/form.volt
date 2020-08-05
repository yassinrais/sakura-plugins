<div class="col-12">
<!-- DataTales Example -->
  	<div class="card shadow mt-0 mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold">{% if row is defined and row.id is defined %}Edit Row {{ row.id }}{% else %}Create New Bot{% endif %}</h6>
	    </div>
	    <div class="card-body">
	    	<form method="post" >
	    		<div class="form-group"><label>Name</label> {{ form.render('name') }} </div>
		    	<div class="form-group"><label>Name ASCII</label> {{ form.render('name_ascii') }} </div>
		    	<div class="form-group"><label>ISO-2</label> {{ form.render('iso2') }} </div>
		    	<div class="form-group"><label>Capital</label> {{ form.render('capital') }} </div>
		    	<div class="form-group"><label>Population</label> {{ form.render('population') }} </div>
		    	<div class="form-group"><label>Latitude</label> {{ form.render('lat') }} </div>
		    	<div class="form-group"><label>Longitude</label> {{ form.render('lng') }} </div>
		    	<div class="form-group"><label>Status</label> {{ form.render('status') }} </div>


		    	<div class="form-group"><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button></div>
	    	</form>
	    </div>
	</div>
</div>