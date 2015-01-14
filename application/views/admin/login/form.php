<form role="form" method="post" action="" class="bootstrap_validate_form">

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username?>"
               placeholder="Enter Username" required minlength="3" maxlength="16">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password"
               placeholder="Enter Password" required minlength="4" maxlength="16">
    </div>

    <div class="form-group">
        <label for="repeat_password">Repeat password</label>
        <input type="password" class="form-control" id="repeat_password" name="repeat_password"
               placeholder="Enter Password again"  minlength="4" maxlength="16">
    </div>

    <div class="form-group">
        <label for="repeat_password">Role</label>
        <select name="userrole" id="userrole" class="form-control" required="">
            <option value="">Not selected</option>
            <?php foreach($userroles as $key => $role) : ?>
                <option <?php echo $userrole == $key ? 'selected' : null?> value="<?php echo $key; ?>"><?php echo $role ?></option>
            <?php endforeach; ?>
        </select>
    </div>


    <button type="submit" class="btn btn-default">Submit</button>
</form>