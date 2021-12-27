<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Crud</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="text-center my-5">
            <div class="btn btn-success" data-toggle="modal" data-target="#myModal">Create</div>
        </div>
    </div>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2</td>
                    <td>title</td>
                    <td>john@example.com</td>
                    <td><button class="btn btn-success" data-toggle="modal" data-target="#update-product">Edit</button></td>
                    <td><button class="btn btn-danger">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" placeholder="Enter Title" id="Title">
                        </div>
                        <div class="form-group">
                            <label for="file">Image:</label>
                            <input type="file" class="form-control-file border">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

      <!-- The update model -->
      <div class="modal" id="update-product">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" placeholder="Enter Title" id="Title">
                            <input type="text" class="form-control" placeholder="Enter Title" id="id">
                        </div>
                        <div class="form-group">
                            <label for="file">Image:</label>
                            <input type="file" class="form-control-file border" name="new_image" id="new_image">
                            <input type="text" class="form-control-file border" name="old_image" id="old_image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>