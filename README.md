# Model Notes
![Scrutinizer Score](https://scrutinizer-ci.com/g/akshaykhale1992/model-notes/badges/quality-score.png?b=master)
![Scrutinizer Build Status](https://scrutinizer-ci.com/g/akshaykhale1992/model-notes/badges/build.png?b=master)

## Introduction
Model Notes is a simple Laravel Package which can be used to add Notes or Comments against any Laravel Eloquent Model.

## Installation
You can pull the package using composer. You may use following command to do that.
```
composer require akshaykhale1992/model-note
```

## Usage
The Package contains two Traits `notable` and `creatable`.
`notable` should be used in the model against which you want to add Notes. E.g. Post, Article, Video etc. 
`creatable` should be used in the model which is able to create a Note. E.g. User, Admin, Employee etc.

Please Refer following example of simple User and Post Class

#### app/User.php
```
<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use AkshayKhale1992\ModelNote\Creatable;

class User extends Authenticatable
{
    use Notifiable;
    use Creatable; // Able to add Notes

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

```

#### App/Post.php
```
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use AkshayKhale1992\ModelNote\Notable;

class Post extends Model
{
    use Notable; // Can have Notes
}

```

#### Adding Note against a Post
```
$post = \App\Post::find(3); // Getting the Post to Add Note
$user = \App\User::find(1); // Getting the User who is adding the Note
$post->addNote($user, "This is a test Note"); // Adding the Note
```
Alternatively
```
$post = \App\Post::find(3); // Getting the Post to Add Note
$user = \App\User::find(1); // Getting the User who is adding the Note
$user->addingNoteTo($post, "This is a test Note"); // Adding the Note
```

#### Getting Notes from a Post
```
$post = \App\Post::find(3); // Selecting the Post
$user = \App\User::find(1); // Getting the User who has added the Notes
$notes = $post->getNotesBy($user); // Getting notes on a Post by User
```
Alternatively
```
$post = \App\Post::find(3); // Selecting the Post
$user = \App\User::find(1); // Getting the User who has added the Notes
$notes = $user->getNotesOn($post); // Getting notes on a Post by User
```

# License
open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Courtesy
 - [staudenmeir](https://github.com/staudenmeir)
