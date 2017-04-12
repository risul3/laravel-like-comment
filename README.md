[![Latest Stable Version](https://poser.pugx.org/risul/laravel-like-comment/v/stable)](https://packagist.org/packages/risul/laravel-like-comment)
[![Total Downloads](https://poser.pugx.org/risul/laravel-like-comment/downloads)](https://packagist.org/packages/risul/laravel-like-comment)
[![License](https://poser.pugx.org/risul/laravel-like-comment/license)](https://packagist.org/packages/risul/laravel-like-comment)

Laravel like comment
=====================

laravel-like-comment is an ajax based like and commenting system for laravel. Which can be used with anything like page, image, post, video etc. User needs to be loged in to be able to like or comment.

## Features
* Like
* Dislike
* Comment
* Comment voting
* User avatar in comment

## Demo
[Try it](http://risul.herokuapp.com/laravel-like-comment)

[Watch](https://www.youtube.com/watch?v=06kcpsnN-bo)

## Installation

Run
```bash
composer require risul/laravel-like-comment
```

## Configuration
Add 
``` 
risul\LaravelLikeComment\LikeCommentServiceProvider::class
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

Add this style links to your view head
```html
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
    <link href="{{ asset('/vendor/laravelLikeComment/css/style.css') }}" rel="stylesheet">
```

Add jquery and script
```html
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{ asset('/vendor/laravelLikeComment/js/script.js') }}" type="text/javascript"></script>
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
