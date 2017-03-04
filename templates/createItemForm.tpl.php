<div class="actionBoxHL">
            <h1>Create Item</h1>
    <div class="actionBoxC">
        <form enctype="multipart/form-data" action="create_item.php" method="post">
            <br>
        <input type="text" id="title" name="title" placeholder="Title" required />
        <input type="text" id="description" name="description" placeholder="Description" required />
        <input type="text" id="summary" name="summary" placeholder="Summary" required />
        <input type="text" id="price" name="price" placeholder="5" required />
        <input type="text" id="text" name="submitted" value=1 style="display:none;" />
        <p>File: <input name="userUpload" type="file"/></p><br><br>
            <input type="submit" />
            <p>Already registered? <a href="login.php">Login Here</a></p>
        </form>
    </div>
</div>