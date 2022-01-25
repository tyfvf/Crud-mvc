<div class="title">
    <h2><?php echo $arr['title']; ?></h2>
</div>

<div class="container">
    <div class="position-absolute top-50 start-50 translate-middle">
        <form method="post">
            <div class="mb-3">
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter your e-mail please" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="action">Submit</button>
        </form>
    </div>
</div>
