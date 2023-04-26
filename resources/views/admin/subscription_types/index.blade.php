@extends('layouts.admin')
@section('content')
@can('subscription_type_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.subscription_types.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.subscription_type.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.subscription_type.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-subscription_type">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.subscription_type.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.subscription_type.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.subscription_type.fields.permissions') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscription_types as $key => $subscription_type)
                        <tr data-entry-id="{{ $subscription_type->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $subscription_type->id ?? '' }}
                            </td>
                            <td>
                                {{ $subscription_type->title ?? '' }}
                            </td>
                            <td>
                                @foreach($subscription_type->permissions as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('subscription_type_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.subscription_types.show', $subscription_type->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('subscription_type_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.subscription_types.edit', $subscription_type->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('subscription_type_delete')
                                    <form action="{{ route('admin.subscription_types.destroy', $subscription_type->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('subscription_type_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.subscription_types.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-subscription_type:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
