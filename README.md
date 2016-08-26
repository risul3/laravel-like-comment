# Installation
Add
```
"risul/laravel-like-comment": "dev-master"
```
In your ```composer.json``` file.

Run 
``` 
composer update
```

### Configuration

Add 
``` 
risul\LaravelLikeComment\LikeCommentServiceProvider::class in config/app.php
```
in your ```service providerr``` list.

Run 
``` 
php artisan vendor:publish
```

Run 
```
php artisan migrate
```

Run Add this semantic style links to your view head
```
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
```


In  ```config/laravelLikeComment.php``` add user model path
```
'userModel' => 'App\User'
```


Add following code in your user model 
```
    /**
     * Return the user attributes.

     * @return array
     */
    public static function getAuthor($id)
    {
        $user = self::find($id);
        return [
            'id'     => $user->id,
            'name'   => $user->name,
            'email'  => $user->email,
            'url'    => '',  // Optional
            'avatar' => 'gravatar',  // Default gravatar
            'admin'  => $user->role === 'admin', // bool
        ];
    }
```


### Usage
Add this line at where you want to integrate Like
```
@include('laravelLikeComment::like', ['like_item_id' => 'post_31'])
```
```like_item_id:``` This is the id of the item/page/model for which the like will be used

Add this line where you want to integrate Comment
```
@include('laravelLikeComment::comment', ['comment_item_id' => '12'])
```
```comment_item_id:``` This is the id of the item/page/model for which the comment will be used
