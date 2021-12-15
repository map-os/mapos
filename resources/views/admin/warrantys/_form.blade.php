    <form role="form"
        action="{{ $warranty->exists ? route('admin.warrantys.update', ['warranty' => $warranty->getKey()]) : route('admin.warrantys.store') }}"
        method="POST">
        @method($warranty->exists ? 'PUT' : 'POST')
        @csrf
        <div class="row p-3">
            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="date_warranty">{{ __('messages.date_warranty') }}</label>
                    <input type="date" class="form-control {{ $errors->has('date_warranty') ? 'is-invalid' : '' }}"
                        id="date_warranty" name="date_warranty" placeholder="Data Exemplo"
                        value="{{ $warranty->date_warranty ?? old('date_warranty') }}" autofocus>
                    @if ($errors->has('date_warranty'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date_warranty') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="ref_warranty">{{ __('messages.ref_warranty') }}</label>
                    <input type="text" class="form-control {{ $errors->has('ref_warranty') ? 'is-invalid' : '' }}"
                        id="ref_warranty" name="ref_warranty" placeholder="Ex: TV, CELULAR..."
                        value="{{ $warranty->ref_warranty ?? old('ref_warranty') }}">
                    @if ($errors->has('ref_warranty'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ref_warranty') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-12">
                <div class="mb-2">
                    <label for="text_warranty">{{ __('messages.text_warranty') }}</label>
                    <textarea class="form-control {{ $errors->has('text_warranty') ? 'is-invalid' : '' }}"
                        id="text_warranty" name="text_warranty"
                        placeholder="{{ __('messages.text_warranty') }}">{{ $warranty->text_warranty ?? old('text_warranty') }}</textarea>
                    @if ($errors->has('text_warranty'))
                        <div class="invalid-feedback">
                            {{ $errors->first('text_warranty') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="user_id">{{ __('messages.user_id') }}</label>
                    <input type="text" class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}"
                        id="user_id" name="user_id" value="{{ $warranty->user_id ?? old('user_id') }}">
                    @if ($errors->has('user_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('user_id') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                    {{ __('messages.save') }}</button>
                <a class="btn btn-light" href="{{ route('admin.warrantys.index') }}"><i class="fa fa-arrow-left"></i>
                    {{ __('messages.go_back') }}</a>
            </div>
    </form>
