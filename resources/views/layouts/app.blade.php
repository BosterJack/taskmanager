<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .draggable {
            cursor: move;
        }
        .sortable-placeholder {
            border: 2px dashed #ccc;
            background-color: #f8f9fa;
            height: 2.5em;
            margin-bottom: 0.5em;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $(".sortable").sortable({
                placeholder: "sortable-placeholder",
                update: function(event, ui) {
                    var sortedIDs = $(this).sortable("toArray");
                    $.ajax({
                        url: '{{ route("tasks.reorder") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            sortedIDs: sortedIDs
                        },
                        success: function(response) {
                            // Handle success
                        }
                    });
                }
            });
            $(".sortable").disableSelection();
        });
    </script>
</body>
</html>
