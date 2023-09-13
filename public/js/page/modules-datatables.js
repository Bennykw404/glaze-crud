"use strict";

$("#table-1").DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: {
        url: "{{ route('dataga.index') }}",
        type: "GET",
    },
    columns: [
        { data: "DT_RowIndex" },
        { data: "name" },
        {
            data: "created_at",
            render: function (value) {
                if (value === null) return "";
                return moment(value).format("DD/MM/YYYY HH:mm");
            },
        },
        { data: "dept" },
        { data: "shift" },
        { data: "grub" },
        { data: "density" },
        { data: "viscosity" },
        { data: "weight" },
    ],
    order: [[0, "desc"]],
});
