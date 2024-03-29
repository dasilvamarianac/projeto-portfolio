<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Exclusão de Projeto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Deseja realmente excluir este projeto? </p>
      </div>
      <div class="modal-footer">  
        <form method="post" action="{{ route('project.destroy', 1) }}" enctype="multipart/form-data" id="form_del">  
          @csrf 
          @method('PATCH')
          <div class="col-md-6">
              <input id="delid" type="hidden" class="form-control" name="id">            
              <input id="status" type="hidden" class="form-control @error('status') is-invalid @enderror" name="status"required autocomplete="status" autofocus value="0">
              @error('status')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <input type="submit" name="destroy" class="btn btn-primary input-lg" value="Excluir" />
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>