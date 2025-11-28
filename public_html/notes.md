This is where I'm going to document notes/brain dump on my refactor in order to deeply understand why things are done amongst the PHP community.

For example, why do some files start with capital and other don't. What is namespace? When should I use a static function. What is the difference between Static, private, protected, public etc.

### Refactor 1: Renaming the views files

I was using a convention like this.. fact.view.php and fact.create.php. You start to repeat yourself a lot using fact at the beginning. Instead it makes more sense to use a facts directory and then have a create.php and a show.php.

### Refactor 2: why you should use **DIR**

I was using require(partials/nav.php). When I moved the view into another directory all of a sudden require(./partials/nav.php) doesn't work. Still not 100% why, but it seems is because of how php resolves paths. It wants the absolute path when going up a directory.

### Refactor 3: separating the controller functions into separate files under the facts controller

Right now I have factController.php, FactViewController.php, and IndexController.php. This is pretty hard to read, since there are multiple requests in each one. I will eventually put everything into one controller file, but to keep things simple I just separated it all into different files then updated the router for each route.Next, I'll need to update the route to include the request type.

### What is namespace and why use it?

### What is a service container?
