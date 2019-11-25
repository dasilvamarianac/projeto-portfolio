<div class="modal fade" id="progressmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Acompanhamento Semanal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('progress.store') }}" enctype="multipart/form-data" id="form_create">  
          @csrf 
          @method('POST')
          <div class="form-group row">
            <div class="col-md-8">
              <input id="project" type="hidden" class="form-control" name="project" value = "{{$data->id}}">            
            </div>
          </div>
          <div class="form-group row"  id="just">
            <label for="inform" class="col-md-2 col-form-label text-md-right">Informe</label>
            <div class="col-md-10">
              <textarea name="inform"   cols="50" rows="15" class="form-control input-lg"  maxlength="1000" id="inform" required ></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">  
          <button type="submit" class="btn btn-primary input-lg"> Salvar </button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>