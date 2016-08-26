#laravel-like-comment
laravel-like-comment is a laravel package. It's an ajax based like and commenting system. Which can be used with anything like page, image, post, video etc. User needs to be loged in to be able to like or comment.

## Features
* Like
* Dislike
* Comment
* Comment voting
* User avatar in comment

## Installation

Add `"risul/laravel-like-comment": "dev-master"` In your `composer.json` file.

Run ` composer update `

## Configuration
Add 
``` 
risul\LaravelLikeComment\LikeCommentServiceProvider::class in config/app.php
```
in your ```service providerr``` list.

To copy views and migrations run 
``` 
php artisan vendor:publish
```

Run
```
php artisan migrate
```
It will create like and comment table.

Add this semantic style links to your view head
```html
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
```


In `config/laravelLikeComment.php` add user model path
```php
'userModel' => 'App\User'
```

Add following code in your user model 
```php
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
            'avatar' => 'gravatar',  // Default avatar
            'admin'  => $user->role === 'admin', // bool
        ];
    }
```

## Usage
Add this line at where you want to integrate Like
```php
@include('laravelLikeComment::like', ['like_item_id' => 'image_31'])
```
`like_item_id:` This is the id of the item,page or model for which the like will be used

Add this line where you want to integrate Comment
```php
@include('laravelLikeComment::comment', ['comment_item_id' => 'video_12'])
```
```comment_item_id:``` This is the id of the item, page, or model for which the comment will be used
