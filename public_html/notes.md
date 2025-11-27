This is where I'm going to document notes/brain dump on my refactor in order to deeply understand why things are done amongst the PHP community.

For example, why do some files start with capital and other don't. What is namespace? When should I use a static function. What is the difference between Static, private, protected, public etc.

### Refactor 1: Renaming the views files

I was using a convention like this.. fact.view.php and fact.create.php. You start to repeat yourself a lot using fact at the beginning. Instead it makes more sense to use a facts directory and then have a create.php and a show.php.

### Refactor 2: why you should use **DIR**

I was using require(partials/nav.php). When I moved the view into another directory all of a sudden require(./partials/nav.php) doesn't work. This is because of how php resolves paths. It wants the absolute path when going up a directory.

## What is namespace and why use it?
