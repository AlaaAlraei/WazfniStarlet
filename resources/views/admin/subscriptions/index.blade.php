@extends('layouts.admin')
@section('content')
@can('subscription_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.subscriptions.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.subscription.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.subscription.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-subscription">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.subscription.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.subscription.fields.user_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.subscription.fields.expiry') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscriptions as $key => $subscription)
                        <tr class="{{ date('Y-m-d', strtotime("+".$subscription->type->num_month." month")) < date('Y-m-d') ? 'bg-danger' : '' }}" data-entry-id="{{ $subscription->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $subscription->id ?? '' }}
                            </td>
                            <td>
                                {{ $subscription->user->name ?? '' }} {{ $subscription->user->last_name ?? '' }}
                            </td>
                            <td>
                                {{ date('Y-m-d', strtotime("+".$subscription->type->num_month." month")) < date('Y-m-d') ? 'Expiry' : 'Active' }}
                            </td>
                            <td>
                                @can('subscription_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.subscriptions.show', $subscription->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('subscription_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.subscriptions.edit', $subscription->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('subscription_delete')
                                    <form action="{{ route('admin.subscriptions.destroy', $subscription->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('subscription_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.subscriptions.massDestroy') }}",
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
  $('.datatable-subscription:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
