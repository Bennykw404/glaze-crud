/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$("#table-1").DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('glaze.list') }}",
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
