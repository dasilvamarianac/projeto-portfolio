<div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inclusão de membro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('projectmember.store') }}" enctype="multipart/form-data" id="form_del">  
          @csrf 
          @method('POST')
          <div class="form-group row">
            <div class="col-md-6">
              <input id="project" type="hidden" class="form-control" name="project" value = "{{$id}}">            
            </div>
          </div>
          <div class="form-group row">
            <label for="indicator" class="col-md-4 col-form-label text-md-right">Membro</label>
            <div class="col-md-6">
              <select id="member"  class="form-control" name="member" required>
                @foreach($members as $row)
                  <option value="{{$row->id}}">
                    {{$row->name}}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">  
          <div class="col-md-6">
              <input id="delid" type="hidden" class="form-control" name="id">            
              <input id="status" type="hidden" class="form-control " name="status"required autocomplete="status" autofocus value="0">
          </div>
          <button type="submit" class="btn btn-primary input-lg"> Salvar </button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>