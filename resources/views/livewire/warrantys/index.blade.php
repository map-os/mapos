<div class="table-responsive p-3">

    @include('partials.alerts')

    <div class="row align-items-center justify-content-between mb-2">

        <div class="col col-sm-6 text-left">
            <a class="btn btn-success" href="{{ route('admin.warrantys.create') }}">
                <i class="fa fa-plus"></i> {{ __('messages.create_warranty') }}
            </a>
        </div>
        <div class="col col-sm-4">
            <div class="input-group"><span class="input-group-text" id="basic-addon2"><span
                        class="fas fa-search"></span></span>
                <input type="text" wire:model="search" class="form-control"
                    placeholder="{{ __('messages.search') }}...">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            <table class="table table-sm table-hover table-centered table-nowrap mb-0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{ __('messages.date_warranty') }}</th>
                        <th class="text-center">{{ __('messages.ref_warranty') }}</th>
                        <th class="text-center">{{ __('messages.text_warranty') }}</th>
                        <th class="text-center">{{ __('messages.user_id') }}</th>
                        <th class="text-center">{{ __('messages.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($warrantys as $warranty)
                        <tr class="text-center">
                            <td>{{ $warranty->getKey() }}</td>
                            <td>{{ date('d/m/Y', strtotime($warranty->date_warranty)) }}</td>
                            <td>{{ $warranty->ref_warranty }}</td>
                            <td>{{ $warranty->text_warranty }}</td>
                            <td>{{ $warranty->user->name }}</td>
                            <td>
                                <div class="btn-group"><button
                                        class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon icon-sm"><span class="fas fa-ellipsis-h icon-dark"></span>
                                        </span>
                                        <span class="sr-only">__('messages.actions')</span></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.warrantys.show', $warranty) }}"><span
                                                class="fas fa-eye mr-2"></span>{{ __('messages.view') }}</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.warrantys.edit', $warranty) }}"><span
                                                class="fas fa-edit mr-2"></span>{{ __('messages.edit') }}</a>
                                        <a class="dropdown-item text-danger"
                                            wire:click="destroy({{ $warranty->id }})" href="#"><span
                                                class="fas fa-trash-alt mr-2"></span>{{ __('messages.delete') }}</a>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="5">{{ __('messages.no_records') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-2">
                {{ $warrantys->links() }}
            </div>

        </div>
    </div>

</div>
