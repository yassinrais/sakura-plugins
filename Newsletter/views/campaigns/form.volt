<div class="col-12">
<!-- DataTales Example -->
        <div class="card shadow mt-0 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">{% if row is defined and row.id is defined %}{{ locale._("Edit") }} {{ locale._("Compaign") }} {{ row.id }}
            {% else %}{{ locale._("Create New") }} {{ locale._("Compaign") }}{% endif %}</h6>
        </div>
        <div class="card-body">
            <form method="post" >
                {% for e,t in form.getInputs() %}
                    <div class="form-group">
                        <label>{{ locale._(ucfirst(t)) }}</label>
                        {{ form.render(e) }} 
                    </div>
                {% endfor %}

                <div class="form-group"><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ locale._("Save") }}</button></div>
            </form>
        </div>
    </div>
</div>