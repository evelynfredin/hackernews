# Hacker News

![Hacker News Mockups](https://evelynfredin.com/quickassets/hacker-news.jpg)

## Assignment

Create a Hacker News clone.

## Tech Stack

- PHP 8x
- Laravel 8x
- HTML
- CSS
- TailwindCSS
- JavaScript
- Alpine.js
- SQLite

## Features

- Dark mode
- Mobile friendly

---

- As a user I should be able to create an account.
- As a user I should be able to login.
- As a user I should be able to logout.
- As a user I should be able to edit my account email, password and biography.
- As a user I should be able to upload a profile avatar image.
- As a user I should be able to create new posts with title, link and description.
- As a user I should be able to edit my posts.
- As a user I should be able to delete my posts.
- As a user I'm able to view most upvoted posts.
- As a user I'm able to view new posts.
- As a user I should be able to upvote posts.
- As a user I should be able to remove upvote from posts.
- As a user I'm able to comment on a post.
- As a user I'm able to edit my comments.
- As a user I'm able to delete my comments.

### Extra Features

- As a user I'm able to delete my account along with all posts, upvotes and comments.

## To Run This Code On Your Machine

You need:

- [PHP](https://www.php.net/docs.php)
- [Laravel 8x](https://laravel.com/docs/8.x)
- [Composer](https://getcomposer.org/)
- [SQLite](https://sqlite.org/index.html)

When you're ready you can:

1. Clone this repo

```
  git clone https://github.com/evelynfredin/hackernews.git
```

2. Navigate to the right directory `$ cd /path/to/directory/`

3. Install dependencies

```
  composer install
```

4. Copy the `.env.example` file

```
cp .env.example .env
```

5. Set up an application key

```
php artisan key:generate
```

6. Create a Symlink for showing and storing avatars

```
php artisan storage:link
```

7. Get a server running

```
php artisan serve
```

## Code Review

1. Database cannot be found using the path defined in `.env.example`. Remove and update config/database.php with `database_path('database.sqlite')` → `('database.db')` instead.

2. It is possible to delete other users accounts by changing the form id to another users.

3. It would be good to regenerate session id on login as to prevent session fixation attacks. Auth:attempt does not do this by default.

4. Avatar upload does not handle PostTooLargeException.

5. Consider using resource controllers for your CRUD routes.

6. Passing in old values as shown on register would be good for post description as to not lose post content on invalid url/title.

7. Gorgeous design, dark mode looks stunning!

8. "No comments" redirect in /comments leads to /submit for posts instead of showing existing posts to comment on.

9. The use of tailwind component classes for styling is very clean!

10. Overall code and functionality is excellent, it looks like you really learned and utilized as much as you possibly could!

## Testing Done By

- [Martin Hansson](https://github.com/Alegherix)

## License

MIT License

## Made By

Evelyn Fredin
