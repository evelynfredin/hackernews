# Hacker News

## Assignment

Create a Hacker News clone.

## Tech Stack

- PHP using Laravel
- HTML
- CSS using TailwindCSS
- JavaScript using Alpine.js
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

1. Install PHP-SQLite3

   - On Windows (Ubuntu)

   ```
       sudo apt-get install php-sqlite3
   ```

   - On macOS (With Brew)

   ```
       $ brew install sqlite
   ```

2. Install Composer

   - On macOS

   ```
     brew install composer
   ```

   - On Windows (WSL)

   ```
   sudo apt install php-cli unzip
   curl -sS https://getcomposer.org/installer -o composer-setup.php
   HASH=`curl -sS https://composer.github.io/installer.sig`
   php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
   sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
   ```

3. Clone this repo

```
  git clone https://github.com/evelynfredin/hackernews.git
```

4. Navigate to the right directory `$ cd /path/to/directory/`

5. Install dependencies

```
  composer install
```

6. Copy the `.env.example` file

```
cp .env.example .env
```

7. Set up an application key

```
php artisan key:generate
```

8. Get a server running

```
php artisan serve
```

## Testing Done By

## -

## License

MIT License

## Made By

Evelyn Fredin

## Code Review
