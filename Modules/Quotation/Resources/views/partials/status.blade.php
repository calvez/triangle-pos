@if ($data->status == '{{ __('triangle.Pending')}}')
    <span class="badge badge-info">
        {{ $data->status }}
    </span>
@else
    <span class="badge badge-success">
        {{ $data->status }}
    </span>
@endif
