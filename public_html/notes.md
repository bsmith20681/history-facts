This is where I'm going to document notes/brain dump on my refactor in order to deeply understand why things are done amongst the PHP community.

For example, why do some files start with capital and other don't. What is namespace? When should I use a static function. What is the difference between Static, private, protected, public etc.

### Refactor 1: Renaming the views files

I was using a convention like this.. fact.view.php and fact.create.php. You start to repeat yourself a lot using fact at the beginning. Instead it makes more sense to use a facts directory and then have a create.php and a show.php.

### Refactor 2: why you should use **DIR**

I was using require(partials/nav.php). When I moved the view into another directory all of a sudden require(./partials/nav.php) doesn't work. Still not 100% why, but it seems is because of how php resolves paths. It wants the absolute path when going up a directory.

### Refactor 3: separating the controller functions into separate files under the facts controller

Right now I have factController.php, FactViewController.php, and IndexController.php. This is pretty hard to read, since there are multiple requests in each one. I will eventually put everything into one controller file, but to keep things simple I just separated it all into different files then updated the router for each route.Next, I'll need to update the route to include the request type.

### Refactor 4: Add method type to the router

Currently head route hits a file. In that file we have lots of checks to see if it's a post and what type of request it is etc. By creating a router with different methods for each post type it will benefit our code in two ways. One it drys up the code and two it makes the code more readible.

### What is namespace and why use it?

Namespace's are like folder. We use it to organize classes since you can't have two classes with the same names. As your codebase grows/works with other libraries, this becomes difficult. If you use a namespace you can avoid collisons. Historically, we use to prefix your classes, but not anymore with namespaces.

Typical naming convention is to use StudlyCaps. Avoid underscores.

To use a namespace, you should declare it at the top of your file. Example: namespace App.

Then when you want to use that class that has an name space assigned to it you must require the file where the class is in and then add the namespace name when you call the class.

Example below:

require 'Item.php';
$obj = new App\Item; // the App\ is required because of the name space.

You can do subname spaces such as namespace App\Models. Some hierarchy is good since you can help organize things more if needed.

require 'Item.php';
$obj = new App\Models\Item;

---

You can "descture this some more by using the "use" keyword. You still must require it though.

require 'Item.php';
use App\Models\Item;

$obj = new Item; // note that we are not using the full path here since we are using "use" at the top. This makes the code more readible.

You can combine multiple use statments, most people use one per line to keep things readable.

---

You should name the classes the same name as the file. This way you can use the spl_autoload_register to autoload your classes.

This allows you to get rid of the require line. That would turn it into just this.

use App\Models\Item;

$obj = new Item;

### What is a service container?
