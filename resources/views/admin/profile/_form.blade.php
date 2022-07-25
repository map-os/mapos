    @include('partials.alerts')

    <form role="form" action="{{ route('admin.profile.update') }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row p-3">
            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="name">{{ __('messages.name') }}</label>
                    <input required type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Nome.." value="{{ $user->name ?? old('name') }}" autofocus>
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="email">{{ __('messages.email') }}</label>
                    <input required type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="Email.." value="{{ $user->email ?? old('email') }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="password">{{ __('messages.password') }}</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" placeholder="Senha..">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="password_confirmation">{{ __('messages.repeat_password') }}</label>
                    <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" placeholder="Senha..">
                    @if ($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    @endif
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ __('messages.save') }}</button>
            <a class="btn btn-light" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('messages.go_back') }}</a>
        </div>

    </form>
