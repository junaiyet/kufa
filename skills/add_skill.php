<?php
session_start();
require '../dashboard_parts/header.php';
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Add Contact info</a>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add skill</h3>
                        </div>
                        <div class="card-body">
                            <form action="skill_post.php" method="POST">
                                <div class="mt-3">
                                    <label for="" class="form-label">Topic</label>
                                    <input type="text" name="topic" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Description</label>
                                    <input type="text" name="desp" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Skill Percentage</label>
                                    <input type="text" name="percentage" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Add skill</button>
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
<script>
    $('.social_icon').click(function() {
        var icon_class = $(this).attr('name');
        $('#icon_input').attr('value', icon_class);
        $('#icon2').attr('class', 'fa ' + icon_class);

    });
</script>