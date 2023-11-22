<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="">
        <div class="form-group row">
            <input type="email" name="email">
            <input type="password" name="password">
            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

            <div class="col-md-6">
                <select id="role" class="form-control" name="jabatan" required>
                    <option value="Organizer">Organizer</option>
                    <option value="Member">Member</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
        </div>
    </form>

</body>

</html>
