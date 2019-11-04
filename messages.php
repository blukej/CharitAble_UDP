<?php return [

'USERNAME_MISSING'      => ['class' => 'error',   'message' => 'Username is required'],
'PASSWORD_MISSING'      => ['class' => 'error',   'message' => 'Password is required'],
'EMAIL_MISSING'         => ['class' => 'error',   'message' => 'Email is required'],
'PASSWORD_MISMATCH'     => ['class' => 'error',   'message' => 'Password and password confirmation do not match'],
'BAD_CREDENTIALS'       => ['class' => 'error',   'message' => 'Username or password is incorrect'],
'PASSWORD_INVALID'      => ['class' => 'error',   'message' => 'Error: Your password must contain atleast 8 letters or over, one number, one capital letter, and one lowercase letter'],
'INVALID_PDO'           => ['class' => 'error',   'message' => 'Invalid PDO object'],
'USERNAME_TAKEN'        => ['class' => 'message', 'message' => 'Sorry, that username has already been used by another user'],
'EMAIL_TAKEN'           => ['class' => 'message', 'message' => 'Sorry, that email has already been used by another user'],
'ACCOUNT_CREATED'       => ['class' => 'message', 'message' => 'Account successfully created. You can now log in'],
'UNKNOWN'               => ['class' => 'error',   'message' => 'Sorry, an unknown error occurred']

] ?>