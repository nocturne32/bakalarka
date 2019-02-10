<div class="container">
    <h1 class="py-4">Sign in</h1>
    <?= form_open('login', ['method' => 'POST', 'class' => 'mt-4 mb-4']) ?>
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input name="username" type="text" class="form-control" id="exampleInputName" placeholder="example123">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1"
               placeholder="*******">
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Sign in</button>
    <?= form_close() ?>
</div>