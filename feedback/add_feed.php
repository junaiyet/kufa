<?php
session_start();
require '../dashboard_parts/header.php';
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Add Feedback</a>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add Feedback</h3>
                        </div>
                        <div class="card-body">
                            <form action="feed_post.php" method="POST" enctype="multipart/form-data">
                                <div class="mt-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">designation</label>
                                    <input type="text" name="designation" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea name="desp" class="form-control"></textarea>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">image</label>
                                    <input type="file" name="image" class="form-control" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                    <img width="200" class="mt-2" src="" id="pic" alt="">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Add Feedback</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php
require '../dashboard_parts/footer.php';
?>