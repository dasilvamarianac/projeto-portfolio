<div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atualizar Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('statuschange.store') }}" enctype="multipart/form-data" id="form_create">  
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
            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

            <div class="col-md-6">
              <select id="status" class="form-control" name="status" required>
                @if($data->status == 1)
                <option value="1">Em Análise</option>
                @elseif($data->status == 2)
                <option value="2">Análise Realizada</option>
                @elseif($data->status == 3)
                <option value="3">Análise Aprovada</option>
                @elseif($data->status == 4)
                <option value="4">Iniciado</option>
                @elseif($data->status == 5)
                <option value="5">Planejado</option>
                @elseif($data->status == 6)
                <option value="6">Em Andamento</option>
                @elseif($data->status == 7)
                <option value="7">Encerrado</option>
                @endif
                <option value="8">Cancelado</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="indicator" class="col-md-4 col-form-label text-md-right">Responsável última etapa</label>
            <div class="col-md-6">
              <select id="responsible"  class="form-control" name="responsible" required>
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
          <div class="col-md-8">
              <input id="delid" type="hidden" class="form-control" name="id">            
              @error('status')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <button type="submit" class="btn btn-primary input-lg"> Salvar </button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>