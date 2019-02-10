<div class="container">
    <h1 class="py-4">Sign up</h1>
    <?= form_open('register', ['method' => 'POST', 'class' => 'mt-4 mb-4']) ?>
    <div class="form-group">
        <label for="exampleInputUsername">Username</label>
        <input name="username" type="text" class="form-control" id="exampleInputUsername"
               aria-describedby="usernameHelp"
               placeholder="example123">
        <small id="usernameHelp" class="form-text text-muted">Alphanumeric characters only
        </small>
    </div>
    <div class="form-group">
        <label for="exampleInputFullname">Full name</label>
        <input name="fullname" type="text" class="form-control" id="exampleInputFullname"
               aria-describedby="fullnameHelp"
               placeholder="John Doe">
        <small id="fullnameHelp" class="form-text text-muted">Alphanumeric characters only
        </small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="example@example.com">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else
        </small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="*******"
               aria-describedby="passwordHelp1">
        <small id="passwordHelp1" class="form-text text-muted">More than 5 characters, please
        </small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword2">Re-enter password</label>
        <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword2"
               placeholder="*******"
               aria-describedby="passwordHelp2">
        <small id="passwordHelp2" class="form-text text-muted">Passwords have to match
        </small>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Sign up</button>
    <?= form_close() ?>
</div>