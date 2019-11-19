<div class="modal fade" id="valuermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atualizar indicador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('indicatorvalue.store') }}" enctype="multipart/form-data" id="form_create">  
          @csrf 
          @method('POST')
          <div class="form-group row">
            <div class="col-md-8">
              <input id="project" type="hidden" class="form-control" name="project" value = "{{$data->id}}">            

              @error('status')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="indicator_project" class="col-md-4 col-form-label text-md-right">Indicador</label>
            <div class="col-md-6">
              <select id="indicator_project"  class="form-control" name="indicator_project" required>
                @foreach($indicators as $row)
                  <option value="{{$row->id}}">
                    {{$row->name}}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row"  id="scope">
            <label for="value" class="col-md-4 col-form-label text-md-right" >Valor</label>

            <div class="col-md-6">
              <input type="text" name="value" id="value" required class="form-control" />
            </div>
          </div>
      </div>
      <div class="modal-footer">  
          <div class="col-md-8">
              <input id="delid" type="hidden" class="form-control" name="id">            
          </div>
          <button type="submit" class="btn btn-primary input-lg"> Salvar </button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>