<?php
include 'header.php';
?>

<div class="wave"></div>
<div class="container text-white mt-4">
    <h1 class="text-center my-5">Contact Me</h1>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form method="post" action="send_contact.php">
                <div class="mb-3">
                    <label for="name" class="form-label text-white">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-white">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label text-white">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</div>

<!-- Inclure CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js"></script>
<script>
    // Initialiser CKEditor sur le textarea
    CKEDITOR.replace('message');
</script>

<?php include 'footer.php'; ?>
</html>