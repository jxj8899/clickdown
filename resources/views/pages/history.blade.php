@include('layouts.header')
<body>
    <div class="container">
        <h1>Attack Logs</h1>

        <!-- Table element where Tabulator will be instantiated -->
        <div id="history-table"></div>
    </div>


    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var table = new Tabulator("#history-table", {
                height: "800px", // Set height of the table
                layout: "fitColumns", // Fit columns to width of the table
                ajaxURL: "{{ route('api.history') }}", // Route to fetch data
                pagination: "local", // Enable front-end pagination
                paginationSize: 50, // Number of rows per page
                columns: [
                    { title: "ID", field: "id", width: 100 },
                    { title: "Status", field: "status" },
                    { title: "Message", field: "msg" },
                    { title: "API ID", field: "api_id", width: 100 },
                    { title: "Params", field: "params", formatter: "textarea" },
                    { title: "Created At", field: "created_at", width: 200 },
                ],
            });

            // Optionally, you can refresh the table every 5 seconds
            setInterval(function(){
                table.setData("{{ route('api.history') }}");
            }, 5000);
        });
    </script>

</body>
