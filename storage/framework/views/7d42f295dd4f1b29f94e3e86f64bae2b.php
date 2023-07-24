<?php $__env->startSection('main'); ?>
    <div class="container mt-3">
        <h1 class="mb-3">Ajax Data</h1>
        <p id="msg" style="color:dodgerblue; font-weight: 500; position:absolute;"></p>
        <a href="/ajax" class="btn btn-outline-success mb-3 float-end">Add Data</a>
        <table class="table table-striped" id="data-table">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Image</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "get",
                url: "<?php echo e(route('alldata')); ?>",
                success: function(data) {
                    if (data.alldata.length > 0) {
                        var i = 0;
                        for (i; i < data.alldata.length; i++) {
                            $('#data-table').append(`<tr>
                                <td>` + (i + 1) + `</td>
                                <td>` + (data.alldata[i]['name']) + `</td>
                                <td>` + (data.alldata[i]['email']) + `</td>
                                <td>` + (data.alldata[i]['password']) + `</td>
                                <td id="` + i + `"></td>
                                <td><a href="editdata/` + (data.alldata[i]['id']) + `" class="btn btn-sm btn-primary">Edit</a></td>
                                <td><a data-id="` + (data.alldata[i]['id']) + `" class="btn btn-sm btn-danger deleteData">Delete</a></td>
                            /tr>`);

                            function imgs() {
                                let img = data.alldata[i]['profile'];
                                let img_arr = img.split(",");

                                for (let j = 0; j < img_arr.length; j++) {
                                    let f = img_arr[j];
                                    $('#' + i).append(`<img data-img="` + data.alldata[i]['id'] + `" src="<?php echo e(asset('assets/ajax/`+f+`')); ?>" alt="image" class="mx-2" height="70px"
                                width="70px">`);
                                }
                            }
                            imgs();
                        }
                    } else {
                        $('#data-table').append("<td colspan='7'>No Data Found.</td>");
                    }
                },
                error: function(err) {
                    console.log(err.responseText);
                },
            });
            $('#data-table').on("click", ".deleteData", function() {
                var id = ($(this).attr("data-id"));
                var obj = $(this);
                $.ajax({
                    type: "get",
                    url: "delete-data/" + id,
                    success: function(data) {
                        $(obj).parent().parent().remove();
                        $("#msg").text(data.res);
                    },
                    error: function(err) {
                        $("#msg").text(err.responseText);
                    },
                })
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            var hideError = function() {
                $("#msg").hide();
            };

            $('#data-table').on("click", ".deleteData", function() {
                setTimeout(hideError, 3000);
                $('#msg').show();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\laravelDemo\resources\views/ajax/ajax-data.blade.php ENDPATH**/ ?>