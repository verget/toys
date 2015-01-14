<p></p><a class="btn btn-primary btn-lg" role="button" href="/admin/login/create">Create new user</a></p>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Users list</div>

    <!-- Table -->

    <table class="table">
        <thead>
            <th>#</th>
            <th>Username</th>
            <th>Role</th>
            <th>&nbsp;</th>
        </thead>

        <tbody>
        <?php foreach ($users_list as $user) : ?>
        <tr>
            <td><?php echo $user['id'];?></td>
            <td><?php echo $user['username'];?></td>
            <td><?php echo $user['role'];?></td>
            <td>
                <a title="" href="/admin/login/edit/<?php echo $user['id'];?>" data-original-title="">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a title="" href="/admin/login/delete/<?php echo $user['id'];?>" data-original-title="">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>