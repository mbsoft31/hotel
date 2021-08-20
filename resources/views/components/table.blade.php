@props(["id" => "datatable"])
<table id="{{$id}}" {{ $attributes->merge(["class" => "min-w-full divide-y divide-gray-200"]) }}>
    {{ $slot }}
</table>
@push("scripts")
    <script>
        const dataTable = new DataTable("#hotel_table");
    </script>
@endpush

@push("styles")
    <link href="{{ asset("css/simple-datatable.css") }}" rel="stylesheet" type="text/css">
    <style>
        .dataTable-bottom ul li{
            font-size: 18px;
            font-weight: 600;
        }

        div.dataTable-bottom > div {
            font-size: 18px;
            font-weight: 400;
        }
        .dataTable-top, .dataTable-bottom {
            padding: 1rem 1.5rem;
        }

        .dataTable-input {
            border-color: slategray;
            border-radius: 4px;
            width: 24rem;
        }

        .dataTable-selector {
            padding-left: 1.5rem !important;
            padding-right: 1.5rem !important;
            border-color: slategray;
            border-radius: 4px;
            width: 6rem;
        }
    </style>
@endpush
